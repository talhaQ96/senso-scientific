<?php
/**
 * Coalition Technologies functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Coalition_Technologies
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function ct_setup() {
// Add theme support for
	add_theme_support(
		'html5',
		array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script')
	);

	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );

// Add post type support
add_post_type_support( 'page', 'excerpt' );

// Gutenberg presets
	// Font Sizes	
	add_theme_support(
		'editor-font-sizes', 
		array(
			array(
				'name'      => 'Extra Large',
				'shortName' => 'XL',
				'size'      => 20,
				'slug'      => 'extra-large'
			),
			array(
				'name'      => 'Large',
				'shortName' => 'L',
				'size'      => 18,
				'slug'      => 'large'
			),
		)
	);

	// Background Gradients
	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name'     => 'White to light gray',
				'gradient' => 'linear-gradient(0deg, rgba(242,242,242,1) 0%, rgba(255,255,255,1) 100%)',
				'slug'     => 'white-to-light-gray'
			),
			array(
				'name'     => 'Black to transparent',
				'gradient' => 'linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%)',
				'slug'     => 'black-to-transparent',
			),
			array(
				'name'     => 'Low alpha black to transparent',
				'gradient' => 'linear-gradient(0deg, rgba(0,0,0,0.65) 0%, rgba(255,255,255,0) 100%)',
				'slug'     => 'low-alpha-black-to-transparent',
			),
		)
	);

	// Background Colors
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'	=> 'White',
				'slug'	=> 'white',
				'color'	=> '#FFFFFF',
			),
			array(
				'name'	=> 'Black',
				'slug'	=> 'black',
				'color'	=> '#000000',
			),
		)
	);

// Register custom image sizes
	add_image_size('ct-thumb', 105, 63, true);
	add_image_size('ct-thumb-large',555, 288, true);

	add_image_size( 'ct-gallery', 330, 220, array( 'center', 'center' ) );
	add_image_size( 'ct-section-header', 1146, 380, array( 'center', 'center' ) );
	add_image_size( 'ct-small', 280, 280, false );
	add_image_size( 'ct-medium', 370, 370, false );
	add_image_size( 'ct-xmedium', 960, 960, false );
	add_image_size( 'ct-large', 1280, 1280, false );

// Register main navigation area
	register_nav_menus( array(
		'primary' => 'Primary',
	) );	
}
add_action('after_setup_theme', 'ct_setup');

// Add Pagination to Archive Pages
function my_post_queries($query){
  if (!is_admin() && $query->is_main_query()){

    if(is_home() || is_archive() && !is_tax('application_category')){

    	if(is_tax('product_category') || is_post_type_archive('products')):
    		$query->set('posts_per_page', 12);

      else:
      	$query->set('posts_per_page', 10);

      endif;
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );

/**
 * Register Widget Areas.
 */
function ct_register_sidebars(){
	register_sidebar(
		array(
			'name'          => 'Sidebar',
			'id'            => 'sidebar',
			'description'   => 'Add widgets here.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="sidebar-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Top Navigation Bar',
			'id'            => 'top-nav-bar',
			'description'   => 'Add widgets here.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<a>',
			'after_title'   => '</a>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 1',
			'id'            => 'footer-1',
			'description'   => 'Add widgets here.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 2',
			'id'            => 'footer-2',
			'description'   => 'Add widgets here.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 3',
			'id'            => 'footer-3',
			'description'   => 'Add widgets here.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 4',
			'id'            => 'footer-4',
			'description'   => 'Add widgets here',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 5',
			'id'            => 'footer-5',
			'description'   => 'Add widgets here',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="footer-title">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'ct_register_sidebars' );

/**
 * Enqueue scripts and styles.
 */
function ct_scripts(){
	/**
	 * Custom enqueuing for scripts
	 *
	 *  Handle => array (
	 *      path (/ct-theme/assets/js/ is the path used),
	 *      version (if empty will use filemtime),
	 *      require all prior scripts (true, false (only require jQuery), define script handles that are required)
	 *  )
	 */
	$scripts = array('main' => array('main.js', '', false),);
	ct_enqueue_scripts($scripts);

// For all pages.
	$cache = filemtime(assets_directory() . '/css/core.css');

	wp_enqueue_style('ct-slick', assets_uri() . '/css/slick.css', false, '', 'all');
	wp_enqueue_style('ct-bootstrap', assets_uri() . '/css/bootstrap.css', false, '', 'all');
	wp_enqueue_style('ct-fontawesome', assets_uri() . '/css/fontawesome.css', false, '', 'all');
	wp_enqueue_style('ct-fonts', assets_uri() . '/css/fonts.css', false, '', 'all');
	wp_enqueue_style('ct-main', assets_uri() . '/css/core.css', false, $cache, 'all');

// Assets for front page.
	if (is_front_page()){
		$cache = filemtime(assets_directory() . '/css/templates/home.css');
		wp_enqueue_style('ct-home', assets_uri() . '/css/templates/home.css', false, $cache, 'all');
		wp_enqueue_script('ct-casestudy-slider', assets_uri() . '/js/casestudy-slider.js', '', '', true);		
	}

// Assets for default page template.
	if(is_page() && !is_front_page()){
		$cache = filemtime(assets_directory() . '/css/templates/page.css');
		wp_enqueue_style('ct-page', assets_uri() . '/css/templates/page.css', false, $cache, 'all');
	}

// Assets for application category template
	if(is_tax('application_category')){
		$cache = filemtime(assets_directory() . '/css/templates/application-category.css');
		wp_enqueue_style('ct-application-category', assets_uri() . '/css/templates/application-category.css', false, $cache, 'all');
		wp_enqueue_script('ct-application-category', assets_uri() . '/js/templates/application-category.js', '', '', true);		
	}

// Assets for single post templates.
	if(is_singular('post')){
		$cache = filemtime(assets_directory() . '/css/templates/single.css');
		$cache_sidebar = filemtime(assets_directory() . '/css/templates/sidebar.css');
		wp_enqueue_style('ct-single', assets_uri() . '/css/templates/single.css', false, $cache, 'all');
		wp_enqueue_style('ct-sidebar', assets_uri() . '/css/templates/sidebar.css', false, $cache_sidebar, 'all');
		wp_enqueue_style('ct-comments', assets_uri() . '/css/templates/comments.css', false, $cache_sidebar, 'all');
		wp_enqueue_script('ct-single', assets_uri() . '/js/templates/single.js', '', '', true);
	}

// Assets for single product template
	if(is_singular('products')){
		$cache = filemtime(assets_directory() . '/css/templates/product-single.css');
		wp_enqueue_style('ct-product-single' , assets_uri() . '/css/templates/product-single.css', false, $cache, 'all');
		wp_enqueue_script('ct-product-single', assets_uri() . '/js/templates/product-single.js', '', '', true);
		wp_enqueue_script('ct-slider', assets_uri() . '/js/slider.js', '', '', true);
	}

// Assets for single application template
	if(is_singular('applications')){
		$cache = filemtime(assets_directory() . '/css/templates/application-single.css');
		wp_enqueue_style('ct-application-single', assets_uri() . '/css/templates/application-single.css', false, $cache, 'all');
		wp_enqueue_script('ct-slider', assets_uri() . '/js/slider.js', '', '', true);	
	}

// Assets for archive templates.
	if (is_post_type_archive() || is_archive() || is_home() || is_search()){
		$cache = filemtime(assets_directory() . '/css/templates/archive.css');
		wp_enqueue_style('ct-archive', assets_uri() . '/css/templates/archive.css', false, $cache, 'all');
		wp_enqueue_script('ct-archive', assets_uri() . '/js/templates/archive.js', '', '', true);	
	}

	// Assets for 404 template.
	if (is_404()){
		$cache = filemtime(assets_directory() . '/css/templates/404.css');
		wp_enqueue_style('ct-404', assets_uri() . '/css/templates/404.css', false, $cache, 'all');
	}


// Assets for any WooCommerce page template
	if ( is_realy_woocommerce_page() ) {
	}
}
add_action('wp_enqueue_scripts', 'ct_scripts');

/**
 * File for ACF theme settings
 */
require get_template_directory() . '/acf/init.php';

/**
 * File for Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom Functions for the theme
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom shortcodes for the theme.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * File for filter and action hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Cleaning up the site.
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * WooCommerce integration.
 */
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

$plugin_path = ABSPATH . '/wp-content/plugins/ct-init/ct-init.php';
if ( file_exists( $plugin_path ) ) {

	if ( isset( get_option( 'active_plugins' )[ $plugin_path ] ) ) {
		return;
	}

	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	activate_plugin( $plugin_path );

}
define( 'GF_LICENSE_KEY', '7135d6ae668c5358e40bfdc7e97e1b22' );

// Prefetch fonts that are hosted inside the theme

function CT_preloadFonts() {

    $folder = '/assets/fonts/'; // Directory to scan in for fonts
    $typeChild = false; // Set this to true if it's supposed to be for the child theme or leave as false if it's for the parent theme

    if ( $typeChild ) {
        $path = get_stylesheet_directory();
        $uri = get_stylesheet_directory_uri();
    } else {
        $path = get_template_directory();
        $uri = get_template_directory_uri();
    }

    echo "\n<!-- Prefetching All The Fonts For Speed Improvements -->";
    $files = preg_grep( '~\.(woff|woff2)$~', scandir( $path . $folder ) );

    foreach ( $files as $file ) {
        $url = $uri . $folder . $file;

        echo "\n";
        echo '<link rel="preload" href="' . $url . '" type="font/' . pathinfo( $file, PATHINFO_EXTENSION ) . '" as="font" crossorigin />';
    }

}
add_action( 'wp_head', 'CT_preloadFonts' );


//Adding Display swap and combining the Google Fonts without Autoptimize

if ( !is_admin() ) {

	function filter_optimize_google_fonts( $in ) {

		$markup = preg_replace( '/<!--(.*)-->/Uis', '', $in );
		preg_match_all( '#<link(?:\s+(?:(?!href\s*=\s*)[^>])+)?(?:\s+href\s*=\s*([\'"])((?:https?:)?\/\/fonts\.googleapis\.com\/css(?:(?!\1).)+)\1)(?:\s+[^>]*)?>#iU', $markup, $matches );

		$fonts_collection = array();
		if ( ! $matches[2] ) {
			return $in;
		}

		// Store them in $fonts array.
		$i = 0;
		foreach ( $matches[2] as $font ) {
			if ( ! preg_match( '/rel=["\']dns-prefetch["\']/', $matches[0][ $i ] ) ) {
			// Get fonts name.
				$font = str_replace( array( '%7C', '%7c' ), '|', $font );
				if ( strpos( $font, 'fonts.googleapis.com/css2' ) !== false ) {
					// (Somewhat) change Google Fonts APIv2 syntax back to v1.
					$font = str_replace( array( 'wght@', 'wght%40', ';', '%3B' ), array( '', '', ',', ',' ), $font );
				}
				$font = explode( 'family=', $font );
				$font = ( isset( $font[1] ) ) ? explode( '&', $font[1] ) : array();
				// Add font to $fonts[$i] but make sure not to pollute with an empty family!
				$_thisfont = array_values( array_filter( explode( '|', reset( $font ) ) ) );
				if ( ! empty( $_thisfont ) ) {
					$fonts_collection[ $i ]['fonts'] = $_thisfont;
					// And add subset if any!
					$subset = ( is_array( $font ) ) ? end( $font ) : '';
					if ( false !== strpos( $subset, 'subset=' ) ) {
						$subset                            = str_replace( array( '%2C', '%2c' ), ',', $subset );
						$subset                            = explode( 'subset=', $subset );
						$fonts_collection[ $i ]['subsets'] = explode( ',', $subset[1] );
					}
				}
				// And remove Google Fonts.
				$in = str_replace( $matches[0][ $i ], '', $in );
			}
			$i++;
		}

		$fonts_markup = '';
		// Aggregate & link!
		$fonts_string  = '';
		$subset_string = '';
		foreach ( $fonts_collection as $font ) {
			$fonts_string .= '|' . trim( implode( '|', $font['fonts'] ), '|' );
			if ( ! empty( $font['subsets'] ) ) {
				$subset_string .= ',' . trim( implode( ',', $font['subsets'] ), ',' );
			}
		}

		if ( ! empty( $subset_string ) ) {
			$subset_string = str_replace( ',', '%2C', ltrim( $subset_string, ',' ) );
			$fonts_string  = $fonts_string . '&#038;subset=' . $subset_string;
		}

		$fonts_string = str_replace( '|', '%7C', ltrim( $fonts_string, '|' ) );
		if ( strpos( $fonts_string, 'display=' ) === false ) {
			$fonts_string .= '&amp;display=swap';
		}

		if ( ! empty( $fonts_string ) ) {
			$rel_string = 'rel="stylesheet" media="print" onload=""this.onload=null;this.media=\'all\';"';
			$fonts_markup = '<link ' . $rel_string . ' id="ct_optimized_gfonts" href="https://fonts.googleapis.com/css?family=' . $fonts_string . '" />';
		}

		// Replace back in markup.
		$inject_point = '<link';
		$out          = substr_replace( $in, $fonts_markup . $inject_point, strpos( $in, 

		$inject_point ), strlen( $inject_point ) );
				unset( $fonts_collection );
		
				return $out;
			}
		
			function ct_html_start() { 
				ob_start( 'filter_optimize_google_fonts' );
			}
			function ct_html_end() {
				if ( ob_get_length() ) ob_end_clean();
			}
			add_action( 'wp_loaded', 'ct_html_start' );
			add_action( 'shutdown', 'ct_html_end' );
		}