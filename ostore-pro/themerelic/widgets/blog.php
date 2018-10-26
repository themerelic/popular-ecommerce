<?php
 /**
** Adds Blog widget.
**/
add_action('widgets_init', 'blog_widget');
function blog_widget() {
	register_widget('blog_widget_area');
}
class blog_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
    	parent::__construct(
    		'blog_widget_area', 'OS: Home Blog Slider', array(
    			'description' => esc_html__('Blog Description', 'ostore-pro')
    		));

    	$this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
    	return array( 
    		'ostore_pro_home_blog_title' => array(
    			'name' => 'ostore_pro_home_blog_title',
    			'title' => __('Title', 'ostore-pro'),
    			'type' => 'text',
    			'desc' => ""
    		),
    		'ostore_pro_home_blog_desc' => array(
    			'name' => 'ostore_pro_home_blog_desc',
    			'title' => __('Very Short Description', 'ostore-pro'),
    			'type' => 'textarea',
    			'rows'  => 4
    		),
            'ostore_pro_header_layout' => array(
              'name' => 'ostore_pro_header_layout',
              'title' => __('Header Layout', 'ostore-pro'),
              'type' => 'select',
              'options' => array(
                  'header-layout-1' => __("Header Layout 1", 'ostore-pro'),
                  'header-layout-2' => __("Header Layout 2", 'ostore-pro'),
              )
            ),  
    		'category_home_blog' => array(
    			'name' => 'category_home_blog',
    			'title' => __('Select Lists Collection Category', 'ostore-pro'),
    			'type' => 'category',
    			'desc' => 'for multiple category chose pro version'
    		),
    		'ostore_pro_home_blog_number' => array(
    			'name' => 'ostore_pro_home_blog_number',
    			'title' => __('Number of post', 'ostore-pro'),
    			'type' => 'number',
    			"default" => 4

    		),
    		'ostore_pro_home_select_view' => array(
    			'name' => 'ostore_pro_home_select_view',
    			'title' => __('Select View', 'ostore-pro'),
    			'type' => 'select',
    			'options'=> array(
    				'grid'=> __('Grid View', 'ostore-pro'),
					'list'=> __('List View', 'ostore-pro'),
					'alternative'=> __('Alternative View', 'ostore-pro')
    			)
    		)

    	);
    } 
    /**
    * Update Form Vlaue 
    */
    public function update($new_instance, $old_instance) {
    	$instance = $old_instance;
    	$widget_fields = $this->widget_fields();
    	foreach ($widget_fields as $widget_field) {
    		extract($widget_field);
    		$instance[$name] = $this->kwidget->update($widget_field, $new_instance[$name]);
    	}
    	return $instance;
    }

    /**
    * Backend Form 
    **/
    public function form($instance) {
		$widget_fields = $this->widget_fields();
		
		/*********************************************
		 * Default Value Set on Widget Section
		 *******************************************/
		$defaults = array(
			'ostore_pro_home_blog_title' 	=> __('Latest News','ostore-pro'),
			'ostore_pro_home_blog_desc'  	=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','ostore-pro'),
			'ostore_pro_header_layout'   	=> 'header-layout-2',
			'ostore_pro_home_blog_number'   => 3,
			'ostore_pro_home_select_view'   => 'grid',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
    	foreach ($widget_fields as $widget_field) {
    		extract($widget_field);
    		$widgets_field_value = !empty($instance[$name]) ? $instance[$name] : '';
    		$this->kwidget->prepare($this, $widget_field, $widgets_field_value);
    	}
    }

    /**
    * Display section(frontend)
    */
    public function widget($args, $instance) {

    	extract($args);
    	extract($instance);

        /**
        * wp query for first block
		**/
		$home_blog_title = ( ! empty( $instance['ostore_pro_home_blog_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_home_blog_title'] ) : '';
      	$home_blog_short_desc = ( ! empty( $instance['ostore_pro_home_blog_desc'] ) ) ? wp_kses_post( $instance['ostore_pro_home_blog_desc'] ) : '';
		$home_blog_category_id = $instance['category_home_blog'] ;
		$home_blog_product_count = ( ! empty( $instance['ostore_pro_home_blog_number'] ) ) ? absint( $instance['ostore_pro_home_blog_number'] ) : 3;
		$home_ostore_pro_home_select_view = ( ! empty( $instance['ostore_pro_home_select_view'] ) ) ? sanitize_text_field( $instance['ostore_pro_home_select_view'] ) : 'grid';
		$ostore_pro_header_layout = ( ! empty( $instance['ostore_pro_header_layout'] ) ) ? sanitize_text_field( $instance['ostore_pro_header_layout'] ) : 'header-layout-2';
      
        echo $before_widget; 
        ?>
        <?php if($home_ostore_pro_home_select_view=='grid'){ ?>
        <section class="blog_post bounceInUp animated">
        	<div class="container"> 
        		<!-- row -->
                <?php if( !empty($home_blog_title) ): ostore_pro_title($home_blog_title,$home_blog_short_desc,$ostore_pro_header_layout); endif;  ?>
        		<div class="row item wow zoomIn"> 
        			<!-- Center colunm-->
        			<div class="col-xs-12 col-sm-12">
                        
        				<ul class="blog-posts blog-wrapper row">
        					<?php 
        					$args = array('post_type'=>'post','posts_per_page'=>$home_blog_product_count,'cat'=>$home_blog_category_id);
        					$query = new WP_Query( $args ); 
        					
                             while($query->have_posts()): $query->the_post(); ?>
        						<li class="post-item  col-md-4 col-sm-12">
        							<article class="entry"> 
        								<div class="row">
        									<div class="col-md-12 col-sm-6">
        										<div class="entry-thumb image-hover2"> <a href="<?php echo esc_url(get_the_permalink()); ?>"> <figure><?php if(has_post_thumbnail()){the_post_thumbnail('blog-image');}else{ echo '<img src="http://via.placeholder.com/350x135&text=No%20Image%20">'; } ?> </figure> </a> </div>
        									</div>
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
        											        <a href="<?php echo get_comments_link(); ?>"><i class="fa fa-comment"></i>&nbsp;
        											        <?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?>
        											        </a> 
        											     </span> 
        											     <span class="date">
        											         <i class="fa fa-calendar"></i>&nbsp; <?php the_date('M j ,Y'); ?>
        											     </span> 
        											 </div>

        											<div class="entry-excerpt"><?php echo esc_html(substr(get_the_excerpt(),0,120)); ?></div>
        											<div class="entry-more"> <a href="<?php echo esc_url(get_the_permalink()); ?>" class="readMore"><?php esc_html_e('Read more','ostore-pro'); ?>&nbsp; <i class="fa fa-angle-double-right"></i></a> </div>
        										</div>
        									</div>
        								</article>

        							</li>
        						<?php endwhile; ?>

        					</ul>
        				</div>
        			</div>       <!-- ./ Center colunm --> 
        		</div>
        		<!-- ./row--> 
        	<!-- </div> -->
        </section>
        <?php }elseif($home_ostore_pro_home_select_view=='list'){ ?>
        <!-- Main Container -->
        <section class="blog_post bounceInUp animated">
        	<div class="container">
        		<!-- row -->
        		<div class="row"> 
        			<!-- Center colunm-->
        			<div class="center_column col-xs-12 col-sm-12" id="center_column">
				        <!-- row -->
                        <?php if( !empty($home_blog_title) ): ostore_pro_title($home_blog_title,$home_blog_short_desc,$ostore_pro_header_layout); endif;  ?>
        				<ul class="blog-posts">
        					<?php 
        					$args = array('post_type'=>'post','posts_per_page'=>$home_blog_product_count,'cat'=>$home_blog_category_id);
        					$query = new WP_Query( $args ); 
        					while($query->have_posts()): $query->the_post(); ?>
        					<li class="post-item wow fadeInUp">
        						<article class="entry">
        							<div class="row">
        								<div class="col-sm-12 col-md-4">
        									<div class="entry-thumb image-hover2"> <a href="<?php the_permalink(); ?>">
        										<figure class="ostore-img"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_html(get_the_title());?>"></figure>
        									</a> </div>
        								</div>
        								<div class="col-sm-12 col-md-8">
        									<div class="list-blog-post">
        										<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        										<div class="entry-meta-data"> <span class="author"> <i class="fa fa-user"></i>&nbsp; <?php esc_attr_e('By:', 'ostore-pro');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></span> <span class="cat">  <span class="comment-count"> <a href="<?php echo get_comments_link(); ?>"><i class="fa fa-comment"></i>&nbsp;<?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?></span></a> <span class="date"><i class="fa fa-calendar"></i>&nbsp; <?php the_date(get_option('date_format')); ?></span> </div>
        										<div class="entry-excerpt"><?php echo wp_kses_post(get_the_excerpt()); ?></div>
        										<div class="entry-more"> <a href="<?php echo esc_url(get_the_permalink()); ?>" class="button"> <?php esc_html_e('Continus reading','ostore-pro'); ?> &nbsp; <i class="fa fa-angle-double-right"></i></a> </div>
        									</div>
        								</div>
        							</div>
        						</article>
        					</li> 
        				<?php endwhile; ?>

        			</ul>  
        		</div>
        		<!-- ./ Center colunm --> 
        	</div>
        	<!-- ./row--> 
			</div>
		</section>
		<!-- Main Container End -->
		<?php }else{  ?>
			 <section class="blog_post bounceInUp animated">
        	<div class="container">
        		<!-- row -->
        		<div class="row"> 
        			<!-- Center colunm-->
        			<div class="center_column col-xs-12 col-sm-12" id="center_column">
        				<!-- row -->
                        <?php if( !empty($home_blog_title) ): ostore_pro_title($home_blog_title,$home_blog_short_desc,$ostore_pro_header_layout); endif; ?>
        				<ul class="blog-posts">
        					<?php 
        					$args = array('post_type'=>'post','posts_per_page'=>$home_blog_product_count,'cat'=>$home_blog_category_id);
							$query = new WP_Query( $args );
							$count = 1; 
        					while($query->have_posts()): $query->the_post(); ?>
        					<li class="post-item wow fadeInUp">
        						<article class="entry">
        							<div class="row">
									<?php 
										$count_1 = $count % 2;
										if(has_post_thumbnail() && $count_1==0): ?>
											<div class="col-sm-12 col-md-5">
												<div class="entry-thumb image-hover2"> <a href="<?php the_permalink(); ?>">
													<figure class="ostore-img"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_html(get_the_title());?>"></figure>
												</a> </div>
											</div>
										<?php endif; ?>
										
        								<div class="col-sm-12 col-md-7">
        									<div class="list-blog-post">
        										<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        										<div class="entry-meta-data"> <span class="author"> <i class="fa fa-user"></i>&nbsp; <?php esc_attr_e('By:', 'ostore-pro');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></span> <span class="cat">  <span class="comment-count"> <a href="<?php echo get_comments_link(); ?>"><i class="fa fa-comment"></i>&nbsp;<?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?></span></a> <span class="date"><i class="fa fa-calendar"></i>&nbsp; <?php the_date(get_option('date_format')); ?></span> </div>
        										<div class="entry-excerpt"><?php echo wp_kses_post(get_the_excerpt()); ?></div>
        										<div class="entry-more"> <a href="<?php echo esc_url(get_the_permalink()); ?>" class="button"> <?php esc_html_e('Continus reading','ostore-pro'); ?> &nbsp; <i class="fa fa-angle-double-right"></i></a> </div>
        									</div>
										</div>

										<?php 
										$count_1 = $count % 2;
										if(has_post_thumbnail() && $count_1==1): ?>
											<div class="col-sm-12 col-md-5">
												<div class="entry-thumb image-hover2"> <a href="<?php the_permalink(); ?>">
													<figure class="ostore-img"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_html(get_the_title());?>"></figure>
												</a> </div>
											</div>
										<?php endif; ?>
										
        							</div>
        						</article>
        					</li> 
        				<?php $count++;  endwhile; ?>

        			</ul>  
        		</div>
        		<!-- ./ Center colunm --> 
        	</div>
        	<!-- ./row--> 
			</div>
		</section>
    <?php }        
    echo $after_widget;
}
}