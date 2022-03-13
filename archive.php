<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
      if(get_post_type() == 'products'):
         $class = "products-grid";

      else:
         $class = "post-grid";

      endif;

      if(have_posts()):
   ?>
		   <section class="<?php echo $class ?> content pt-0">
		      <div class="container">
		   	   <?php the_breadcrumb(); ?>

               <div class="mt-4">
                  <?php
                       if(get_post_type() == 'products'):
                          get_template_part('partials/archives/content', 'products');
                       else:

                          get_template_part('partials/archives/content');
                       endif;
                  ?>
               </div>
            </div>
		      </div>
		   </section>
   <?php
      else:
         get_template_part('partials/content', 'none');

      endif;
   ?>
</main>	

<?php get_footer(); ?>
