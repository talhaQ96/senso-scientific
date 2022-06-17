<?php

if ( !is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php' ) {
	function generateRandomString() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen( $characters );
		$randomString = '';
		for ( $i = 0; $i < 10; $i++ ) {
			$randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
		}
		return $randomString;
	}


	function ct_custom_nitro( $buffer ) {

		$scripts = [];

		$buffer = preg_replace_callback( '/<script(.*?)>([\s\S]*?)<\/script>/', function( $matches ) use ( &$scripts ) {

			$html = '<script' . $matches[1] . '>' . $matches[2] . '</script>';
			
			$attrs = [];
			$inline = trim( $matches[2] );
			
			$dom = new DOMDocument();
			$dom->loadHTML( $html );

			foreach ( $dom->getElementsByTagName( 'script' ) as $s ) {
				if ( $s->hasAttributes() ) {
					foreach ( $s->attributes as $attr ) {
						$attrs[$attr->nodeName] = $attr->nodeValue;
					}
				}
			}

			if ( $inline === '' ) { // JS file script

				if ( strpos( $attrs['src'], 'lazyload.min.js' ) !== false ) {
					$attrs['ct-exclude'] = '';
				}

				if ( isset( $attrs['ct-exclude'] ) ) {
					return $html;
				} else {
					if ( !isset( $attrs['id'] ) ) {
						$attrs['id'] = generateRandomString();
					}

					$id = $attrs['id'];

					$scripts[$id] = [
						'type'	=> 'file',
						'src'	=> $attrs['src'],
						'info'	=> base64_encode( json_encode( [ 'delay' => false, 'attributes' => $attrs ] ) )
					];

					return '<template data-ct-marker-id="' . $id . '"></template>';
				}

			} else { // Inline script
				
				if ( strpos( $matches[2], 'window.lazyLoadOptions' ) !== false ) {
					$attrs['ct-exclude'] = '';
				}

				if ( isset( $attrs['type'] ) && ( $attrs['type'] === 'application/ld+json' || $attrs['type'] === 'text/worker' ) ) {
					return $html;
				} elseif ( isset( $attrs['ct-exclude'] ) ) {
					return $html;
				} else {
					if ( !isset( $attrs['id'] ) ) {
						$attrs['id'] = generateRandomString();
					}

					$id = $attrs['id'];

					$scripts[$id] = [
						'type'	=> 'inline',
						'info'	=> base64_encode( json_encode( [ 'delay' => false, 'attributes' => $attrs ] ) )
					];

					return '<script id="' . $id . '" type="ct/inlinescript" class="ct-inline-script">' . $matches[2] . '</script><template data-ct-marker-id="' . $id . '"></template>';
				}

			}

		}, $buffer );

		$newScripts = '<script>';

		foreach ( $scripts as $key => $val ) {
			if ( $val['type'] === 'inline' ) {
				$newScripts .= 'CTRL.registerInlineScript("' . $key . '","' . $val['info'] . '");';
			} else {
				$newScripts .= 'CTRL.registerScript("' . $val['src'] . '","' . $key . '","' . $val['info'] . '");';
			}
		}

		$newScripts .= 'CTRL.boot();(function(){let d=Math.max(document.documentElement.clientHeight||0,window.innerHeight||0);let o=[];function f(t){if(t===null)return;let e=null;let n=t.children.length;let i;let l=["SCRIPT","STYLE","LINK","TEMPLATE"];for(let e=0;e<n;e++){i=t.children[e];if(l.indexOf(i.tagName)==-1){let e=i.getBoundingClientRect();if(e.width*e.height>0){if(e.y>d){o.push(i)}else{f(i)}}}}}if(typeof CTRL!=="undefined"){f(document.body);let t=o.length;let n;for(let e=0;e<t;e++){n=o[e];n.classList.add("ct-offscreen")}let e=false;function i(){if(!e){e=true}}window.addEventListener("CtStylesLoaded",i);setTimeout(i,3e3)}})();</script>';

		$buffer = str_replace( '</body>', $newScripts . '</body>', $buffer );

		return $buffer;
	}

	function buffer_start() { 
		ob_start( 'ct_custom_nitro' );
	}
	function buffer_end() {
		if ( ob_get_length() ) {
			ob_end_clean();
		}
	}
	add_action( 'wp_loaded', 'buffer_start' );
	add_action( 'shutdown', 'buffer_end' );
}