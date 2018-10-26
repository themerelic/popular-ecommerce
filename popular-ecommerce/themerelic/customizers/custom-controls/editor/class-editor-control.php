<?php
/**
 * Customizer Control: Text Editor.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Popular_ecommerce_Editor_Control' ) ) {

	/**
	 * Adds a multicheck control.
	 */
    class Popular_ecommerce_Editor_Control extends WP_Customize_Control {
			
        public $type = 'text-editor';
        /**
        ** Render the content on the theme customizer page
        */
        public function render_content(){ ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php
                    $settings = array(
                        'media_buttons' => true,
                        'quicktags' => true
                    );
                    $this->filter_editor_setting_link();
                    wp_editor( $this->value(), $this->id, $settings );
                ?>
            </label>
            
            <?php
            do_action('admin_footer');
            do_action('admin_print_footer_scripts');
        }
        
        public function enqueue() {            
            wp_enqueue_script( 'text-editor', get_theme_file_uri() . '/inc/custom-controls/editor/editor.js', array( 'jquery', 'customize-controls' ), false, true );      
        }
        
        private function filter_editor_setting_link(){
            add_filter( 'the_editor', function( $output ) { return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); } );
        }
    }
}