<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package oStore-pro
 */
get_header(); ?>	
<!-- Main Container -->
<section class="blog_post bounceInUp animated">
	<div class="container"> 	
		<!-- row -->
		<div class="row">
		<!-- Center colunm-->
		<div class="center_column col-xs-12 col-sm-12 col-md-9" id="center_column">
		<header class="page-header">
			<h2 class="page-title">
			<?php printf( esc_html__( 'Search Results for: %s', 'ostore-pro' ), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h2>
		</header><!-- .page-header -->
			<?php
			if ( have_posts() ) : ?>
				<?php 
						$blog_layout = get_theme_mod('blog_layout_option','blog-list-view');
						if($blog_layout=='blog-list-view'){
							while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/content', 'search' ); 
							endwhile;
						}elseif($blog_layout=='blog-grid-view'){
							get_template_part( 'template-parts/blog-layout/blog','gridview'); 
						}elseif($blog_layout=='blog-alternative'){
							get_template_part( 'template-parts/blog-layout/blog','alternative'); 
						}elseif($blog_layout=='blog-full-width'){
							get_template_part( 'template-parts/blog-layout/blog','fullwidth'); 
						}
					?>
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