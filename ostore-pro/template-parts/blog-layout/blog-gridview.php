<?php while ( have_posts() ) : the_post();  ?>
<li class="post-item  col-md-6 col-sm-12">
<article class="entry"> 
    <div class="row">
        <?php if(has_post_thumbnail()): ?>
        <div class="col-md-12 col-sm-6">
            <div class="entry-thumb image-hover2"> <a href="<?php echo esc_url(get_the_permalink()); ?>"> <figure><?php echo esc_url(the_post_thumbnail('blog-image')); ?> </figure> </a> </div>
        </div>
        <?php endif; ?>
        <div class="col-md-12 col-sm-6">
            <div class="content-meta ostore-home-blog-meta">
                <h3 class="entry-title">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo wp_kses_post(get_the_title()); ?></a>
                </h3>
                <div class="entry-meta-data ">
                    <span class="author"> <i class="fa fa-user"></i>&nbsp; <?php esc_attr_e('By:', 'ostore-pro'); ?>
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo  esc_html(get_the_author()); ?></a>
                    </span>  
                    <span class="comment-count"> 
                        <a href="javascript:void()"><i class="fa fa-comment"></i>&nbsp;
                        <?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?>
                        </a> 
                        </span> 
                        <span class="date">
                            <i class="fa fa-calendar"></i>&nbsp; <?php the_date(get_option('date_format')); ?>
                        </span> 
                    </div>

                <div class="entry-excerpt"><?php echo esc_html(substr(get_the_excerpt(),0,120)); ?></div>
                <div class="entry-more"> <a href="<?php echo esc_url(get_the_permalink()); ?>" class="readMore"><?php esc_html_e('Read more','ostore-pro'); ?>&nbsp; <i class="fa fa-angle-double-right"></i></a> </div>
            </div>
        </div>
</article>
</li>
<?php endwhile; ?>