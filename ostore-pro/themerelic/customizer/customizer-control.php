<?php

/**
 * Custom Control for Customizer Category Dropdown
*/
if( class_exists( 'WP_Customize_control') ) {
    class Ostore_Preloader_Control extends WP_Customize_Control {
            public function render_content() {
                $preloaders = array( 'preloader-1', 'preloader-2', 'preloader-3', 'preloader-4', 'preloader-5', 'preloader-6', 'preloader-7', 'preloader-8', 'preloader-9' );
                if ( empty( $preloaders ) )
                return;
            ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
                    <?php endif; ?>
                    <div class="ostore-pro-preloader-container">
                        <?php foreach($preloaders as $preloader) : ?>
                            <span class="ostore-pro-preloader <?php if($preloader == $this->value()){ echo esc_html("active","ostore-pro-pro"); } ?>" preloader="<?php echo esc_attr( $preloader ); ?>">
                                <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/preloader/'.$preloader.'.gif'); ?>" />
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                </label>
            <?php
            }
        }


    class Ostore_Info_Text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }

    /**
     * Demo Import
    */
    class Osotre_WP_Customize_Demo_Control extends WP_Customize_Control{            
        public function render_content() { ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="">
                    <a href="#" id="demo_import"><?php esc_html_e('Import Demo','ostore-pro-pro'); ?></a>
                    <div class=""></div>
                    <div class="import-message"><?php echo wp_kses_post('Are you sure to reset your store with demo data? All your theme settings will be overwritten <br/>
                    Click on Import Demo button to import demo contents.','ostore-pro-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }



    class OstorePro_Repeater_Controler extends WP_Customize_Control {

        public function enqueue() {
            wp_enqueue_style('ostore-pro-repeator-style', get_template_directory_uri().'/themerelic/customizer/repeator.css');
            wp_enqueue_script('ostore-pro-repeator-script', get_template_directory_uri().'/themerelic/customizer/repeator.js', array( 'jquery', 'customize-controls' ), rand(), true);
        }

        /**
         * The control type.
         *
         * @access public
         * @var string
        */
        public $type = 'repeater';

        public $ostore_pro_box_label = '';

        public $ostore_pro_box_add_control = '';

        private $cats = '';

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
        */
        public $fields = array();

        /**
         * Repeater drag and drop controler
         *
         * @since  1.0.0
        */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            $this->fields = $fields;
            $this->ostore_pro_box_label = $args['ostore_pro_box_label'] ;
            $this->ostore_pro_box_add_control = $args['ostore_pro_box_add_control'];
            $this->cats = get_categories(array( 'hide_empty' => false ));
            parent::__construct( $manager, $id, $args );


            // var_dump($this->value()); exit;
        }

        public function render_content() {
            $values = json_decode($this->value());
            // var_dump($values); exit;
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if($this->description){ ?>
            <span class="description customize-control-description">
            <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php } ?>

            <ul class="ostore-pro-repeater-field-control-wrap">
            <?php $this->ostore_pro_get_fields(); ?>
            </ul>
            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="ostore-pro-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <button type="button" class="button ostore-pro-add-control-field"><?php echo esc_html( $this->ostore_pro_box_add_control ); ?></button>
            <?php
        }

        private function ostore_pro_get_fields(){
            $fields = $this->fields;
            $values = json_decode($this->value());
            if(is_array($values)){
            foreach($values as $value){    ?>
            <li class="ostore-pro-repeater-field-control">
                <h3 class="ostore-pro-repeater-field-title accordion-section-title"><?php echo esc_html( $this->ostore_pro_box_label ); ?></h3>
                <div class="ostore-pro-repeater-fields">
                <?php
                    foreach ($fields as $key => $field) {
                    $class = isset($field['class']) ? $field['class'] : '';
                ?>
                    <div class="ostore-pro-fields ostore-pro-type-<?php echo esc_attr($field['type']).' '.$class; ?>">
                    <?php 
                        $label = isset($field['label']) ? $field['label'] : '';
                        $description = isset($field['description']) ? $field['description'] : '';
                        if($field['type'] != 'checkbox'){ ?>
                        <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                        <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                    <?php }

                        $new_value = isset($value->$key) ? $value->$key : '';
                        $default = isset($field['default']) ? $field['default'] : '';

                        switch ($field['type']) {
                        case 'text':
                            echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="text" value="'.esc_attr($new_value).'"/>';
                            break;

                        case 'textarea':
                            echo '<textarea data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">'.esc_textarea($new_value).'</textarea>';
                            break;

                        case 'select':
                            $options = $field['options'];
                            echo '<select  data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
                                foreach ( $options as $option => $val )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_attr($option), selected($new_value, $option, false), esc_html($val));
                                }
                            echo '</select>';
                            break;

                            case 'upload':
                            $image = $image_class= "";
                            if($new_value){ 
                                $image = '<img src="'.esc_url($new_value).'" style="max-width:100%;"/>';  
                                $image_class = ' hidden';
                            }
                            echo '<div class="ostore-pro-fields-wrap">';
                            echo '<div class="attachment-media-view">';
                            echo '<div class="placeholder'.$image_class.'">';
                            _e('No image selected', 'ostore-pro-pro');
                            echo '</div>';
                            echo '<div class="thumbnail thumbnail-image">';
                            echo $image;
                            echo '</div>';
                            echo '<div class="actions clearfix">';
                            echo '<button type="button" class="button ostore-pro-delete-button align-left">'.__('Remove', 'ostore-pro-pro').'</button>';
                            echo '<button type="button" class="button ostore-pro-upload-button alignright">'.__('Select Image', 'ostore-pro-pro').'</button>';
                            echo '<input data-default="'.esc_attr($default).'" class="upload-id" data-name="'.esc_attr($key).'" type="hidden" value="'.esc_attr($new_value).'"/>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';              
                            break;

                        default:
                            break;
                        }
                    ?>
                    </div>
                <?php } ?>
                <div class="clearfix ostore-pro-repeater-footer">
                    <div class="alignright">
                    <a class="ostore-pro-repeater-field-remove" href="#remove"><?php _e('Delete', 'ostore-pro-pro') ?></a> |
                    <a class="ostore-pro-repeater-field-close" href="#close"><?php _e('Close', 'ostore-pro-pro') ?></a>
                    </div>
                </div>
                </div>
            </li>
            <?php }
            }
        }
        }
}

