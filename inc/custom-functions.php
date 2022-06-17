<?php
/**
 * Function for Breadcrumbs Menu
 */
function the_breadcrumb($optional = ""){
	$seprator = '&rsaquo;';
	$output = '<nav class="breadcrumbs">';
		$output .= '<ul>';

			// Breadcrumbs starts with homepage
			$output .= '<li>';
				$output .= '<a href="'. get_home_url() .'">Home</a>';
				$output .= '<span>'. $seprator .'</span>';
			$output .= '</li>';

			//if current page is single page of post type page
			if(is_page()){
				// get page title
				$output .= '<li>';
					$output .= '<a href="'. get_the_permalink() .'">'. get_the_title() .'</a>';
					$output .= '<span>'. $seprator .'</span>';
				$output .= '</li>';					
			}

			//if current page is blog listing page (index.php)
			if(is_home() && !is_front_page()){
				// get page title
				$output .= '<li>';
					$output .= '<a href="'. get_post_type_archive_link(get_post_type()) .'">'. get_the_title(get_option('page_for_posts', true)) .'</a>';
					$output .= '<span>'. $seprator .'</span>';
				$output .= '</li>';	
			}

			//if current page is archive page
			if(is_archive() && !is_category() && !is_tag() && !is_tax()){
				// get post type title
				$output .= '<li>';
					$output .= '<a href="'. get_post_type_archive_link(get_post_type()) .'">'. get_post_type() .'</a>';
					$output .= '<span>'. $seprator .'</span>';
				$output .= '</li>';		
			}

			//if current page is category, tage or custom taxonomy page
			if(is_category() || is_tag() || is_tax()){
				// get category title
				$output .= '<li>';
					$output .= '<a href="'. get_category_link($category) .'">'. single_cat_title($prefix = '', $display = false) .'</a>';
					$output .= '<span>'. $seprator .'</span>';
				$output .= '</li>';	
			}

			//if current page is single page of CPT or post type post
			if(is_single()){
				// if current page is single blog post page
				if(get_post_type() == "post"):
					$output .= '<li>';
						$output .= '<a href="'. get_post_type_archive_link(get_post_type()) .'">Blog</a>';
						$output .= '<span>'. $seprator .'</span>';
					$output .= '</li>';

				// if current page is single CPT page
				else:
					// get post type title
					$output .= '<li>';
						$output .= '<a href="'. get_post_type_archive_link(get_post_type()) .'">'. get_post_type() .'</a>';
						$output .= '<span>'. $seprator .'</span>';
					$output .= '</li>';							
				endif;

				// get post title
				$output .= '<li>';
					$output .= '<a href="'. get_the_permalink() .'">'. get_the_title() .'</a>';
					$output .= '<span>'. $seprator .'</span>';
				$output .= '</li>';	
			}

			//if current page is search results page
			if(is_search()){
				$output .= '<li>';
					$output .= 'You searched for ' . $optional;
					$output .= '<span>'. $seprator .'</span>';
				$output .= '</li>';	
			}
		$output .= '</ul>';
	$output .= "</nav>";

	echo $output;
}

/**
 * Function for Adding CPT Support for Category & Tag Archives
 */

function cpt_add_archives($query) {
	if (is_admin() || !$query->is_main_query()){
		return;    
	}

	if(is_category() || is_tag() && empty($query->query_vars['suppress_filters'])){
		$query->set('post_type', array('post', 'products'));
		return $query;
	}
}
add_filter('pre_get_posts', 'cpt_add_archives');

/**
 * Function for Enabling Thumbnail for WordPress Default Recent Post Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

    function widget($args, $instance) {

        if (!isset( $args['widget_id'])){
        	$args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) ) );

        if ($r->have_posts()) :
        ?>
        <?php echo $args['before_widget']; ?>
        <?php if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        } ?>
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>
                <?php the_post_thumbnail('ct-thumb'); ?>
                <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
            <?php if ( $show_date ) : ?>
                <span class="post-date"><?php echo get_the_date(); ?></span>
            <?php endif; ?>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo $args['after_widget']; ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;
    }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

/**
 * Function for displaying listed post types only on search results page
 * Exclude everything else from search results page
 */

function searchfilter($query) {
    if ($query->is_search && !is_admin()){
        $query->set('post_type',array('post','products', 'applications'));
    }

	return $query;
}
add_filter('pre_get_posts','searchfilter');

/**
 * Function for Custom Comment Template
 */

if(!function_exists('custom_comments_template')):
	function custom_comments_template($comment, $args, $depth) {
?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   		<div>
   			<div class="avatar">
   				<?php echo get_avatar($comment, $size='80', $default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
   			</div>

   			<div class="comment-block">
   				<div class="comment-meta">
   					<div>
   						<p><strong><?php comment_author(); ?></strong></p>
   						<p class="date"><?php printf(esc_html__('%1$s at %2$s' , 'ct'), get_comment_date(),  get_comment_time()); ?></p>
   					</div>

   					<div>
   						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => 2))); ?>
   					</div>
   				</div>

   				<div class="comment-text">
   					<?php comment_text(); ?>
   				</div>
   			</div>
   		</div>
   </li>
<?php }
endif;

/**
 * Function for Adding Placeholders to Comment Form Fields
 */

// Placeholder Name, Email, URL

 function placeholder_author_email_url_form_fields($fields) {
    $replace_author = __('Your Name', 'yourdomain');
    $replace_email =  __('Your Email', 'yourdomain');
    $replace_url =    __('Your Website', 'yourdomain');
    
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'yourdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="'.$replace_author.'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Email', 'yourdomain' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" name="email" type="text" placeholder="'.$replace_email.'" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Website', 'yourdomain' ) . '</label>' .
    '<input id="url" name="url" type="text" placeholder="'.$replace_url.'" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>';
    
    return $fields;
}
add_filter('comment_form_default_fields','placeholder_author_email_url_form_fields');

// Comment Field

 function placeholder_comment_form_field($fields) {
    $replace_comment = __('Your Comment', 'yourdomain');
     
    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.$replace_comment.'" aria-required="true"></textarea></p>';
    
    return $fields;
 }
add_filter( 'comment_form_defaults', 'placeholder_comment_form_field' );

