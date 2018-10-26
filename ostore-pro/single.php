<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
        $layout = get_post_meta($post->ID, 'layout', true);
        if(empty($layout)) {
          $layout = get_theme_mod( 'ostore_pro_single_page_layout_option', 'right-sidebar' );
        }
	
        if($layout == 'full-width'){?>
          <div class=" col-xs-12 col-sm-12 col-md-12 <?php echo $layout; ?>" id="center_column">
        <?php }else{ ?>
          <div class=" col-xs-12 col-sm-12 col-md-9 <?php echo $layout; ?>" id="center_column">
        <?php } ?>
          <?php while ( have_posts() ) : the_post(); ?>
                <div class="page-title">
                  <h1 ><?php echo wp_kses_post( get_the_title() ); ?></h1>
                </div> 
                <div class="entry-detail">
                  <?php if(has_post_thumbnail()): ?>
                  <div class="entry-photo">
                    <figure><a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" ><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr(get_the_title());?>"></a></figure>
                  </div>
                  <?php endif; ?>
                  <div class="ostore-entry-meta-data"> 
                      <span class="author"> 
                        <i class="fa fa-user"></i>&nbsp; <?php esc_attr_e('By:', 'ostore-pro'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'name' ) )); ?>"><?php echo get_the_author(); ?></a>
                      </span> 
                      <span class="cat"> 
                        <i class="fa fa-folder"></i>&nbsp;  <?php  the_category(',',false); ?> 
                      </span> 
                      <span class="comment-count">
                        <a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>">
                        <i class="fa fa-comment"></i>&nbsp;
                        <?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?>
                        </a>
                      </span> 
                      <span class="date">
                        <i class="fa fa-calendar">&nbsp;</i>&nbsp;<?php the_date(get_option('date_format' ));  ?>
                      </span>
                  </div>
                  <div class="content-text slingle-blog-content clearfix">
                    <?php the_content(); ?>

                    <?php  $layout = get_post_meta( get_the_ID(),'layout',true);
                echo $layout ;
            ?>
            
                  </div>
                  <div class="entry-tags"> <span></span> <?php the_tags( 'Tags: ', ', ', '<br />' ); ?></div>
            </div>
          <?php endwhile; ?>

          <!-- Related Posts -->
          <div class="single-box">
            <h2><?php esc_html_e('Releated Post','ostore-pro'); ?></h2>
            <div class="slider-items-products">
              <div id="related-posts" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 fadeInUp">
				<?php 
					$args = array( 'post_status'=>'publish', 'numberposts' => '5', 'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => 'post-format-aside',
								'operator' => 'NOT IN'
							), 
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => 'post-format-image',
								'operator' => 'NOT IN'
							)
					) );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
				?>
				<div class="product-item">
            <article class="entry">
              <?php if( has_post_thumbnail($recent["ID"],'recent-post') ): ?>
                  <div class="entry-thumb image-hover2"> <a href="<?php the_permalink(intval($recent['ID'])); ?>"> <img src="<?php echo esc_url(get_the_post_thumbnail_url($recent["ID"],'recent-post')); ?>" > </a> </div>
              <?php endif; ?>
              <div class="entry-info">
                <h3 class="entry-title"><a href="<?php the_permalink(intval($recent['ID'])); ?>"><?php echo esc_html($recent["post_title"]); ?></a></h3>
                <div class="entry-meta-data"> <span class="comment-count"><a href="<?php echo esc_url(get_comments_link(intval($recent['ID'])) ); ?>"> <i class="fa fa-comment-o">&nbsp;</i><?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number($recent["ID"],'recent-post')))); ?></a></span> <span class="date"> <i class="fa fa-calendar">&nbsp;</i><?php  $cpost=get_post($recent["ID"]); echo esc_html(date(get_option('date_format'), strtotime($cpost->post_date)));  ?> </span> </div>
                <div class="ostore-recent-entry-more"> <a href="<?php the_permalink(intval($recent['ID'])); ?>" class="ostore-recent-btn"><?php esc_html_e('Read more','ostore-pro'); ?></a> </div>
              </div>
            </article>
          </div>
					<?php } 
						wp_reset_query();
					?>
				  
                </div>
              </div>
            </div>
          </div>
          <!-- ./Related Posts --> 
          <!-- Comment -->
          <?php 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
          <!-- ./Comment --> 
        </div>
			<?php get_sidebar(); ?>
      </div>
    </div>
  </section>
  <!-- Main Container End -->

<?php
get_footer();