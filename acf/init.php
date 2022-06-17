<?php

function ct_css_margin_control( $version ) {
	include_once( 'field-types/padding-margin-control.php' );
}
add_action( 'acf/include_field_types', 'ct_css_margin_control' );

// If using ACF that supports block types
if ( function_exists( 'acf_register_block_type' ) ) :

	// Reuseable global variable of color.
	define( 'CT_COLOR', '#FFFFFF' );
	define( 'CT_BG_COLOR', '#076aab' );

	/**
	 * Function to register ACF block type
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 */
	function ct_register_acf_block_types() {
		$cache_banner = filemtime(assets_directory() . '/css/blocks/banner.css');
		$cache_icons_grid = filemtime(assets_directory() . '/css/blocks/icons-grid.css');
		$cache_slider = filemtime(assets_directory() . '/css/blocks/slider.css');
		$cache_button = filemtime(assets_directory() . '/css/blocks/button.css');
		$cache_expertise = filemtime(assets_directory() . '/css/blocks/expertise.css');
		$cache_card_block_01 = filemtime(assets_directory() . '/css/blocks/card-block-01.css');
		$cache_card_block_02 = filemtime(assets_directory() . '/css/blocks/card-block-02.css');
		$cache_cards_slider = filemtime(assets_directory() . '/css/blocks/cards-slider.css');
		$cache_solutions = filemtime(assets_directory() . '/css/blocks/solutions.css');
		$cache_product_slider = filemtime(assets_directory() . '/css/blocks/product-slider.css');
		$cache_product_details = filemtime(assets_directory() . '/css/blocks/product-details.css');
		$cache_brochure = filemtime(assets_directory() . '/css/blocks/brochure.css');
		$cache_contact_info = filemtime(assets_directory() . '/css/blocks/contact-info.css');

		// Banner Block
		acf_register_block_type(array(
			'name'				=> 'banner',
			'title'				=> 'Banner',
			'description'		=> 'Add an image or video in background with content overlay',
			'render_template'	=> 'acf/templates/banner.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'desktop',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('banner', 'home', 'cover'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/banner.css?ct-cache=' . $cache_banner,
		));

		// Icon Grid Block
		acf_register_block_type(array(
			'name'				=> 'icons-grid',
			'title'				=> 'Icons Grid',
			'description'		=> 'Add icons using grid layout',
			'render_template'	=> 'acf/templates/icons-grid.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'images-alt2',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('grid', 'icons', 'icon', 'certificate', 'certificates'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/icons-grid.css?ct-cache=' . $cache_icons_grid,
		));

		// Slider Block
		acf_register_block_type(array(
			'name'				=> 'slider',
			'title'				=> 'Slider',
			'description'		=> 'Add carousel to your website',
			'render_template'	=> 'acf/templates/slider.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'slides',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('slider', 'carousel', 'logo slider'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/slider.css?ct-cache=' . $cache_slider,
			'enqueue_script'    => assets_uri() . '/js/blocks/slider.js',
		));

		// Button Block
		acf_register_block_type(array(
			'name'				=> 'button',
			'title'				=> 'Button',
			'description'		=> 'Add CTA button to your website',
			'render_template'	=> 'acf/templates/button.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'button',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('button', 'link'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/button.css?ct-cache=' . $cache_button,
		));

		// Expertise Block
		acf_register_block_type(array(
			'name'				=> 'expertise',
			'title'				=> 'Expertise',
			'description'		=> 'Add content with icon, heading and text',
			'render_template'	=> 'acf/templates/expertise.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'saved',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('expertise', 'icon', 'list', 'sensoscientific diferrence', 'senso', 'ss', 'difference'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/expertise.css?ct-cache=' . $cache_expertise,
		));

		// Card Block 01
		acf_register_block_type(array(
			'name'				=> 'card-block-01',
			'title'				=> 'Card Block 01',
			'description'		=> 'Create blocks with icon, title and description. Block with white background and blue hover',
			'render_template'	=> 'acf/templates/card-block-01.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'index-card',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('card', 'cards', 'block'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/card-block-01.css?ct-cache=' . $cache_card_block_01,
		));

		// Card Block 02
		acf_register_block_type(array(
			'name'				=> 'card-block-02',
			'title'				=> 'Card Block 02',
			'description'		=> 'Create blocks with icon, title and description. Block with transparent background and no hover',
			'render_template'	=> 'acf/templates/card-block-02.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'index-card',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('card', 'cards', 'block'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/card-block-02.css?ct-cache=' . $cache_card_block_02,
		));

		// Card Slider Block
		acf_register_block_type(array(
			'name'				=> 'card-slider',
			'title'				=> 'Cards Slider',
			'description'		=> 'Custom block for cards slider',
			'render_template'	=> 'acf/templates/cards-slider.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'slides',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('slider', 'cards slider', 'card slider', 'cards', 'card'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/cards-slider.css?ct-cache=' . $cache_cards_slider,
			'enqueue_script'    => assets_uri() . '/js/blocks/cards-slider.js',
		));	

		// Solutions Block
		acf_register_block_type(array(
			'name'				=> 'solutions',
			'title'				=> 'Platform Solutions',
			'description'		=> 'Custom block for platform solutions section on your website',
			'render_template'	=> 'acf/templates/solutions.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'format-image',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('solution', 'platform', 'cover', 'solution platform'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/solutions.css?ct-cache=' . $cache_solutions,
		));

		// Product Slider Block
		acf_register_block_type(array(
			'name'				=> 'product-slider',
			'title'				=> 'Product Slider',
			'description'		=> 'Custom block for product slider on products page',
			'render_template'	=> 'acf/templates/product-slider.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'slides',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('product', 'products', 'slider', 'product slider'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/product-slider.css?ct-cache=' . $cache_product_slider,
			'enqueue_script'    => assets_uri() . '/js/blocks/product-slider.js',
		));

		// Product Details Block
		acf_register_block_type(array(
			'name'				=> 'product-details',
			'title'				=> 'Product Details',
			'description'		=> 'Custom block for adding your product details',
			'render_template'	=> 'acf/templates/product-details.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'text-page',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('product', 'products', 'product details', 'details'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/product-details.css?ct-cache=' . $cache_product_details,
		));

		// Service Brochure Block
		acf_register_block_type(array(
			'name'				=> 'brochure',
			'title'				=> 'Brochure',
			'description'		=> 'Custom block for services brochure',
			'render_template'	=> 'acf/templates/brochure.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'text-page',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('services', 'service', 'brochure'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/brochure.css?ct-cache=' . $cache_brochure,
		));

		// Contact Information Block
		acf_register_block_type(array(
			'name'				=> 'contact-information',
			'title'				=> 'Contact Information',
			'description'		=> 'Custom block for adding contact Information',
			'render_template'	=> 'acf/templates/contact-info.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'location-alt',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('contact', 'address', 'email', 'phone', 'information'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/contact-info.css?ct-cache=' . $cache_contact_info,
		));
	}
	add_action('acf/init', 'ct_register_acf_block_types' );

	/**
	 * Register gutenberg block and re-order it to make custom category first.
	 * 
	 * @param  array $categories contains all registered categories
	 * @return array             sorted categories
	 */
	function ct_block_category( $categories ) {

		$custom_block = array(
			'slug'	=> 'coalition',
			'icon'	=> 'wordpress',
			'title'	=> 'CT Custom Blocks',
		);

		$categories_sorted = array();
		$categories_sorted[0] = $custom_block;

		foreach ($categories as $category) {
			$categories_sorted[] = $category;
		}

		return $categories_sorted;

	}
	add_filter( 'block_categories', 'ct_block_category', 10, 1);

endif;

/**
	  ________                                     __  __  _
	 /_  __/ /_  ___  ____ ___  ___     ________  / /_/ /_(_)___  ____ ______
	  / / / __ \/ _ \/ __ `__ \/ _ \   / ___/ _ \/ __/ __/ / __ \/ __ `/ ___/
	 / / / / / /  __/ / / / / /  __/  (__  )  __/ /_/ /_/ / / / / /_/ (__  )
	/_/ /_/ /_/\___/_/ /_/ /_/\___/  /____/\___/\__/\__/_/_/ /_/\__, /____/
															   /____/
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	/**
	 * Add quick link to site settings to the admin nav bar
	 *
	 * @param  object $wp_admin_bar contains the admin bar object.
	 */
	function ct_add_site_settings( $wp_admin_bar ) {
		$args = array(
			'id'    => 'ct-settings',
			'title' => '<i class="dashicons-before dashicons-sos" style="line-height: 20px;display: inline-block;"></i> CT Settings',
			'href'  => admin_url( 'admin.php?page=ct-settings' ),
			'meta'  => array(
				'html'     => '<style>#wp-admin-bar-ct-settings a{color:#FFFFFF!important;background:#006AAC!important}</style>',
			),
		);

		$wp_admin_bar->add_node( $args );
		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'comments' );
		$wp_admin_bar->remove_node( 'customize' );
	}
	add_action( 'admin_bar_menu', 'ct_add_site_settings', 99 );

	/**
	 * Registering ACF options page
	 */
	function ct_settings() {

		// Check function exists.
		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page(
				array(
					'position'      => 1,
					'page_title'    => 'CT Settings',
					'menu_title'    => 'CT Settings',
					'menu_slug'     => 'ct-settings',
					'icon_url'      => 'dashicons-sos',
				)
			);
		}
	}
	add_action( 'acf/init', 'ct_settings' );


	/**
	 * Fixing admin area with CSS
	 */
	function ct_fix_admin_stuff() {
		echo '
		<style>
			.wp-block {
				max-width: 1170px;
			}
			.editor-post-title textarea {
				text-align: center;
			}
		</style>
		';
	}
	add_action( 'admin_head', 'ct_fix_admin_stuff' );

endif;
