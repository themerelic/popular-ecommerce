<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package oStore-pro
 */
$breadcrumb_normal = get_theme_mod('ostore_pro_normal_page_enable_disable_section', '');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="page-title">
<?php if($breadcrumb_normal == 'disable'): ?>
<div class="page-title <?php echo $breadcrumb_normal; ?>">
	<h1 class="recent-single-heading"><?php echo wp_kses_post(get_the_title()); ?></h1>
</div> 
<?php endif; ?>
<div class="entry-detail">
	<?php if(has_post_thumbnail()): ?>
      <div class="entry-photo">
        <figure><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title());?>"></figure>
      </div>
    <?php endif; ?>
		<div class="content-text slingle-page-content clearfix">
		<?php the_content(); ?>
		</div>
		<div class="entry-tags"> <span></span> <?php the_tags( 'Tags: ', ', ', '<br />' ); ?></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ostore-pro' ),
				'after'  => '</div>',
			) );
		?>
</div>
</div>
