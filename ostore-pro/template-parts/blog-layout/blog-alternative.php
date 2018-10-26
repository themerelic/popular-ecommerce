
<?php $count = 1;
 while ( have_posts() ) : the_post();  ?>
<li class="post-item wow fadeInUp">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="entry">
	<div class="row">
	<?php 
	$count_1 = $count % 2;
	if(has_post_thumbnail() && $count_1==0): ?>
		<div class="col-sm-6">
			<div class="entry-thumb image-hover2"> <a href="<?php the_permalink(); ?>">
			<figure><?php the_post_thumbnail('blog'); ?></figure>
			</a> </div>
		</div>	
	<?php endif; ?>
	<?php if(has_post_thumbnail()): ?>
		<div class="col-md-6 ">
	<?php else: ?>
		<div class="col-md-12 ">
	<?php endif; ?>
	<?php  
		if ( is_singular() ) :
			the_title( '<h3 class="entry-title">', '</h3>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;
	?>

		<div class="entry-meta-data"> <span class="author"> <i class="fa fa-user"></i>&nbsp; <?php esc_attr_e('By:', 'ostore-pro');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></span> <span class="cat">  
			<span class="comment-count"> 
				<a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>">
					<i class="fa fa-comment"></i>&nbsp;
					<?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?>
				</a> 
			</span>
			<span class="date"><i class="fa fa-calendar"></i>&nbsp; <?php the_date(get_option('date_format')); ?></span>
		</div>
		<div class="entry-excerpt"><?php echo wp_kses_post(get_the_excerpt()); ?></div>
		<div class="entry-more"> <a href="<?php echo esc_url(get_the_permalink()); ?>" class="button"><?php esc_html_e('Continus reading','ostore-pro'); ?> &nbsp; <i class="fa fa-angle-double-right"></i></a> </div>
		</div>
		<?php if(has_post_thumbnail() && $count_1==1): ?>
		<div class="col-sm-6">
			<div class="entry-thumb image-hover2"> <a href="<?php the_permalink(); ?>">
			<figure><?php the_post_thumbnail('blog'); ?></figure>
			</a> </div>
		</div>	
	<?php endif; ?>
	</div>
	</article>
</li>
<?php $count++; endwhile; ?>					