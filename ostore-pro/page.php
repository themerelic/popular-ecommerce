<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package oStore-pro
 */
get_header(); ?>	

<?php do_action( 'breadcrumb-normal' ); ?>
<!-- Main Container -->
<section class="blog_post bounceInUp animated main-container">
    <div class="container">
      <div class="row">
      <?php get_sidebar('left'); 
				$layout = get_theme_mod( 'ostore_pro_page_layout_option', 'right-sidebar' );
				if($layout == 'full-width'){?>
					<div class="center_column col-xs-12 col-sm-12 col-md-12" id="center_column">
				<?php }else{ ?>
					<div class="center_column col-xs-12 col-sm-12 col-md-9" id="center_column">
			<?php } ?>
      <?php 
        if(have_posts()): 
        while ( have_posts() ) : the_post(); 
            get_template_part( 'template-parts/content', 'page');
            // If comments are open or we have at least one comment, load up the comment template. 
            if ( comments_open() || get_comments_number() ) : 
    	        comments_template(); 
    	      endif; 

          endwhile; 
        else: 
            get_template_part( 'template-parts/content','none'); 
        endif; 
      ?> 
        </div>
			<?php get_sidebar(); ?>
      </div>
    </div>
  </section>
  <!-- Main Container End -->
<?php
get_footer();