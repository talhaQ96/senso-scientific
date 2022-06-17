<?php

// Only allow this shortcode to be an option if Yoast is installed and active
if ( function_exists( 'is_plugin_active' ) ) {
	if ( is_plugin_active('wordpress-seo/wp-seo.php')) {

		/**
		 * Shortcode for HTML Sitemap
		 * Does not unindex blog posts
		 *
		 * @return string of HTML sitemap
		 */
		function ct_sitemap( $atts ) {

			$output = '';
			foreach ( get_post_types( array( 'public' => 1 ), 'names', 'and' ) as $type ) {
				if ( $type !== 'attachment' && WPSEO_Post_Type::is_post_type_indexable( $type ) ) {

					$query = new WP_Query(
						array(
							'posts_per_page'    => -1,
							'post_type'         => $type,
							'meta_query'        => array(
								'relation'      => 'OR',
								array(
									'compare'   => 'NOT EXISTS',
									'key'       => '_yoast_wpseo_meta-robots-noindex',
								),
								array(
									'value'     => 1,
									'compare'   => '!=',
									'key'       => '_yoast_wpseo_meta-robots-noindex',
								),
							),
						)
					);
					if ( $query->have_posts() ) {
						$output .= '<h3>' . get_post_type_object( $type )->labels->name . '</h3>';

						$output .= '<ul>';
						if ( get_post_type_object( $type )->hierarchical ) {
							$output .= wp_list_pages(
								array(
									'echo'      => 0,
									'title_li'  => null,
									'post_type' => $type,
									'include'   => wp_list_pluck( $query->posts, 'ID' ),
								)
							);
						} else {
							while ( $query->have_posts() ) {
								$query->the_post();
								$output .= '<li><a href="' . get_the_permalink( get_the_ID() ) . '">' . get_the_title() . '</a></li>';
							}
						}
						$output .= '</ul>';
					}
					wp_reset_postdata();

				}
			}

			return $output;
		}
		add_shortcode( 'ct-sitemap', 'ct_sitemap' );

	}
}


/**
 * Shortcode for lost password form
 *
 * @return string of HTML sitemap
 */
function ct_lostpassword( $atts ) {

	if ( is_user_logged_in() ) {

	} else {

	}

	if ( isset( $_REQUEST['login'] ) && isset( $_REQUEST['key'] ) ) {
		$attributes['login'] = $_REQUEST['login'];
		$attributes['key'] = $_REQUEST['key'];

		// Error messages
		$errors = array();
		if ( isset( $_REQUEST['error'] ) ) {
			$error_codes = explode( ',', $_REQUEST['error'] );

			foreach ( $error_codes as $code ) {
				$errors[] = ct_get_error_message( $code );
			}
		}
		$attributes['errors'] = $errors;

		$output = '	<div id="password-reset-form" class="bc-account-lost-password">
				 
					<form class="bc-form bc-account-form--lost-password" name="resetpassform" id="resetpassform" action="' . site_url( 'wp-login.php?action=resetpass' ) . '" method="post" autocomplete="off">
						<input type="hidden" id="user_login" name="rp_login" value="' . esc_attr( $attributes['login'] ) . '" autocomplete="off" />
						<input type="hidden" name="rp_key" value="' . esc_attr( $attributes['key'] ) . '" />

						<p class="description">' . wp_get_password_hint() . '</p>

						<label class="bc-form__control bc-form-account__control" for="pass1">
							<span class="bc-form__label bc-account-lost-password__form-label bc-form-control-required">New password</span>
							<input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" />
						</label>

						<label class="bc-form__control bc-form-account__control" for="pass2">
							<span class="bc-form__label bc-account-lost-password__form-label bc-form-control-required">Repeat new password</span>
							<input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" />
						</label>

						<span id="password-strength-meter"></span>

						';
						 
						if ( count( $attributes['errors'] ) > 0 ) :
							foreach ( $attributes['errors'] as $error ) :
								$output .= '<p>' . $error . '</p>';
							endforeach;
						endif;
						 
						$output .= '
						<div class="bc-form__actions bc-account-lost-password__actions">
							<button class="bc-btn bc-btn--lost-password" aria-label="" type="submit" name="wp-submit">Reset Password</button>
						</div>
					</form>
				</div>';

		return $output;
	} else {
		return 'Invalid password reset link.';
	}

}
add_shortcode( 'ct-lostpass', 'ct_lostpassword' );

/**
 * Shortcode for Case Study CPT
 **/

function shortcode_casestudy(){
    $case = array('post_type' => 'case-study', 'posts_per_page' => -1);
    $caseQuery = new WP_Query($case);
    if($caseQuery->have_posts()):
		$output  = '<div class="case-slider slider">';
			while($caseQuery->have_posts()):$caseQuery->the_post();
				if(get_field('featured')):
				 	$output .= '<div class="case-study d-flex">';
				 		$output .= get_the_post_thumbnail();
				 		$output .= '<div>';
				 			$output .= '<h4>'. get_field('case-category') .'</h4>';
				 			$output .= '<h2>'. get_the_title() .'</h2>';
				 			$output .= '<div class="content">' .get_the_content(). '</div>';
	
				 			if(get_field('file-link')):
								$output .= '<div>';
									$output .= '<a href="#" rel="'. get_field('file-link') .'" class="button button-download hover-white">Read More</a>';
								$output .= '</div>';
							endif;
	
				 		$output .= '</div>';
				 	$output .= '</div>';
				 endif;
			endwhile;
		$output .= '</div>';

		$output .= '<div class="logo-slider-wrap">';
			$output .= '<ul class="logo-slider slider">';
				while($caseQuery->have_posts()):$caseQuery->the_post();
					if(get_field('featured')):
        		  		$logo = get_field('case-logo');
        		  		$output .= '<li>'. wp_get_attachment_image($logo) .'</li>';
        		  	endif;
        		endwhile;
        		wp_reset_postdata();
			$output .=	'</ul>';
		$output .= '</div>';
	endif;
	return $output;
}
add_shortcode('case-studies', 'shortcode_casestudy');

/**
 * Shortcode for Displaying Child Products
 **/

function shortcode_childproducts(){
	global $post;
	$child_product = get_field('child-product');
	if($child_product):
		$output  = '<div class="child-product-slider slick-carousel">';
			foreach($child_product as $post):
				setup_postdata($post);
				$output .= '<div>';
					$output .= get_the_post_thumbnail();
					$output .= '<h4 class="mt-4">'. get_the_title() .'</h4>';
					$output .= '<a href="'. get_the_permalink() .'" class="button hover-white-with-border">Buy Now</a>';
				$output .= '</div>';
			endforeach;
			wp_reset_postdata();
		$output .= '</div>';
	endif;
	return $output;
}
add_shortcode('child-products', 'shortcode_childproducts');


/**
 * Shortcode for Displaying Products on Application Single Page
 **/

function shortcode_relatedproducts(){
	global $post;
	$products = get_field('product');
	if($products):
		$output  = '<div class="application-product-slider slick-carousel">';
			foreach($products as $post):
				setup_postdata($post);
				$output .= '<div>';
					$output .= get_the_post_thumbnail();
					$output .= '<h4 class="mt-4">'. get_the_title() .'</h4>';
					$output .= '<a href="'. get_the_permalink() .'" class="button hover-white-with-border">Buy Now</a>';
				$output .= '</div>';
			endforeach;
			wp_reset_postdata();
		$output .= '</div>';
	endif;
	return $output;
}
add_shortcode('related-products', 'shortcode_relatedproducts');

/**
 * Shortcode for Displaying Applications on Product Single Page
 **/

function shortcode_relatedapplications(){
	global $post;
	$applications = get_field('application');
	if($applications):
		$output  = '<div class="product-application-slider slick-carousel">';
			foreach($applications as $post):
				setup_postdata($post);
				$image = get_field('thumbnail-image');
				$output .= '<div>';
					$output .= '<a href="'. get_the_permalink() .'">';
						$output .= wp_get_attachment_image($image, 'full');
						$output .= '<h4>'. get_the_title() .'</h4>';
					$output .= '</a>';
				$output .= '</div>';
			endforeach;
			wp_reset_postdata();
		$output .= '</div>';
	endif;
	return $output;
}
add_shortcode('related-applications', 'shortcode_relatedapplications');





