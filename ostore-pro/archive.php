<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package oStore-pro
 */
get_header(); 
do_action( 'breadcrumb-normal' ); ?>
<!-- Main Container -->
<section class="blog_post bounceInUp animated"><!-- Edted file -->
	<div class="container"> 	
		<!-- row -->
		<div class="row">
		<!-- Center colunm-->
			<?php get_sidebar('left'); 
				$layout = get_theme_mod( 'archive_page_layout_option', 'right-sidebar' );
				if($layout == 'full-width'){ ?>
					<div class="center_column col-xs-12 col-sm-12 col-md-12" id="center_column">
				<?php }else{ ?>
					<div class="center_column col-xs-12 col-sm-12 col-md-9" id="center_column">
			<?php } ?>
			<div class="page-title">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>
			<?php
			if ( have_posts() ) : ?>
			
			<ul class="blog-posts">
					<?php 
						$blog_layout = get_theme_mod('blog_layout_option','blog-list-view');
						if($blog_layout=='blog-list-view'){
							while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/content', get_post_format() ); 
							endwhile;
						}elseif($blog_layout=='blog-grid-view'){
							get_template_part( 'template-parts/blog-layout/blog','gridview'); 
						}elseif($blog_layout=='blog-alternative'){
							get_template_part( 'template-parts/blog-layout/blog','alternative'); 
						}elseif($blog_layout=='blog-full-width'){
							get_template_part( 'template-parts/blog-layout/blog','fullwidth'); 
						}
					?>
				</ul>
				<div class="">
				<?php the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( '<', 'ostore-pro' ),
						'next_text' => __( '>', 'ostore-pro' ),
					) ); ?>
				</div>
			<?php else: ?>
				<?php get_template_part( 'template-parts/content','none'); ?>
			<?php endif; ?>
		</div>
			<?php get_sidebar(); ?>	
		</div>
		<!-- ./row--> 
	</div>
	</section>
	<!-- Main Container End -->		
<?php
get_footer(); 