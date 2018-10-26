<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package oStore-pro
 */
get_header(); ?>
<!--Container -->
<div class="error-page">
    <div class="container">
		<div class="ostore_pro_error_pagenotfound col-md-9"> 
			<strong>4<span id="ostore-animate-arrow">0</span>4 </strong> <br />
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ostore-pro' ); ?></h1>
			<p><?php esc_html_e('Try using the button below to go to main page of the site', 'ostore-pro'); ?></p>
			<br />
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button-back"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; <?php esc_html_e('Go to Back', 'ostore-pro'); ?></a>
		</div>
      	<!-- end error page notfound --> 
			<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();


