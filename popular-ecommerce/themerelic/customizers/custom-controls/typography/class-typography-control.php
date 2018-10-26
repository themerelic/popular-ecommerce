<?php

/**
 * Customizer Typography Control
 *
 * Taken from Kirki.
 *
 * @package   theme-slug
 * @copyright Copyright (c) 2016, Nose Graze Ltd.
 * @license   GPL2+
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

class Popular_ecommerce_ extends WP_Customize_Control {

	public $tooltip = '';
	public $js_vars = array();
	public $output = array();
	public $option_type = 'theme_mod';
	public $type = 'relic-typography';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		} else {
			$this->json['default'] = $this->setting->default;
		}
		$this->json['js_vars'] = $this->js_vars;
		$this->json['output']  = $this->output;
		$this->json['value']   = $this->value();
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['tooltip'] = $this->tooltip;
		$this->json['id']      = $this->id;
		$this->json['l10n']    = apply_filters( 'relic-typography-control/il8n/strings', array(
			'on'                 => esc_attr__( 'ON', 'popular-ecommerce' ),
			'off'                => esc_attr__( 'OFF', 'popular-ecommerce' ),
			'all'                => esc_attr__( 'All', 'popular-ecommerce' ),
			'cyrillic'           => esc_attr__( 'Cyrillic', 'popular-ecommerce' ),
			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'popular-ecommerce' ),
			'devanagari'         => esc_attr__( 'Devanagari', 'popular-ecommerce' ),
			'greek'              => esc_attr__( 'Greek', 'popular-ecommerce' ),
			'greek-ext'          => esc_attr__( 'Greek Extended', 'popular-ecommerce' ),
			'khmer'              => esc_attr__( 'Khmer', 'popular-ecommerce' ),
			'latin'              => esc_attr__( 'Latin', 'popular-ecommerce' ),
			'latin-ext'          => esc_attr__( 'Latin Extended', 'popular-ecommerce' ),
			'vietnamese'         => esc_attr__( 'Vietnamese', 'popular-ecommerce' ),
			'hebrew'             => esc_attr__( 'Hebrew', 'popular-ecommerce' ),
			'arabic'             => esc_attr__( 'Arabic', 'popular-ecommerce' ),
			'bengali'            => esc_attr__( 'Bengali', 'popular-ecommerce' ),
			'gujarati'           => esc_attr__( 'Gujarati', 'popular-ecommerce' ),
			'tamil'              => esc_attr__( 'Tamil', 'popular-ecommerce' ),
			'telugu'             => esc_attr__( 'Telugu', 'popular-ecommerce' ),
			'thai'               => esc_attr__( 'Thai', 'popular-ecommerce' ),
			'serif'              => _x( 'Serif', 'font style', 'popular-ecommerce' ),
			'sans-serif'         => _x( 'Sans Serif', 'font style', 'popular-ecommerce' ),
			'monospace'          => _x( 'Monospace', 'font style', 'popular-ecommerce' ),
			'font-family'        => esc_attr__( 'Font Family', 'popular-ecommerce' ),
			'font-size'          => esc_attr__( 'Font Size', 'popular-ecommerce' ),
			'font-weight'        => esc_attr__( 'Font Weight', 'popular-ecommerce' ),
			'line-height'        => esc_attr__( 'Line Height', 'popular-ecommerce' ),
			'font-style'         => esc_attr__( 'Font Style', 'popular-ecommerce' ),
			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'popular-ecommerce' ),
			'text-align'         => esc_attr__( 'Text Align', 'popular-ecommerce' ),
			'text-transform'     => esc_attr__( 'Text Transform', 'popular-ecommerce' ),
			'none'               => esc_attr__( 'None', 'popular-ecommerce' ),
			'uppercase'          => esc_attr__( 'Uppercase', 'popular-ecommerce' ),
			'lowercase'          => esc_attr__( 'Lowercase', 'popular-ecommerce' ),
			'top'                => esc_attr__( 'Top', 'popular-ecommerce' ),
			'bottom'             => esc_attr__( 'Bottom', 'popular-ecommerce' ),
			'left'               => esc_attr__( 'Left', 'popular-ecommerce' ),
			'right'              => esc_attr__( 'Right', 'popular-ecommerce' ),
			'center'             => esc_attr__( 'Center', 'popular-ecommerce' ),
			'justify'            => esc_attr__( 'Justify', 'popular-ecommerce' ),
			'color'              => esc_attr__( 'Color', 'popular-ecommerce' ),
			'select-font-family' => esc_attr__( 'Select a font-family', 'popular-ecommerce' ),
			'variant'            => esc_attr__( 'Variant', 'popular-ecommerce' ),
			'style'              => esc_attr__( 'Style', 'popular-ecommerce' ),
			'size'               => esc_attr__( 'Size', 'popular-ecommerce' ),
			'height'             => esc_attr__( 'Height', 'popular-ecommerce' ),
			'spacing'            => esc_attr__( 'Spacing', 'popular-ecommerce' ),
			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'popular-ecommerce' ),
			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'popular-ecommerce' ),
			'light'              => esc_attr__( 'Light 200', 'popular-ecommerce' ),
			'light-italic'       => esc_attr__( 'Light 200 Italic', 'popular-ecommerce' ),
			'book'               => esc_attr__( 'Book 300', 'popular-ecommerce' ),
			'book-italic'        => esc_attr__( 'Book 300 Italic', 'popular-ecommerce' ),
			'regular'            => esc_attr__( 'Normal 400', 'popular-ecommerce' ),
			'italic'             => esc_attr__( 'Normal 400 Italic', 'popular-ecommerce' ),
			'medium'             => esc_attr__( 'Medium 500', 'popular-ecommerce' ),
			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'popular-ecommerce' ),
			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'popular-ecommerce' ),
			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'popular-ecommerce' ),
			'bold'               => esc_attr__( 'Bold 700', 'popular-ecommerce' ),
			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'popular-ecommerce' ),
			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'popular-ecommerce' ),
			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'popular-ecommerce' ),
			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'popular-ecommerce' ),
			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'popular-ecommerce' ),
			'invalid-value'      => esc_attr__( 'Invalid Value', 'popular-ecommerce' ),
		) );

		$defaults = array( 'font-family'=> false );

		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'relic-typography-css', get_theme_file_uri() . '/themerelic/customizers/custom-controls/typography/typography.css', null );
        /*
		 * JavaScript
		 */
        wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
		wp_enqueue_script( 'jquery-stepper-min-js' );
		
		// Selectize
		wp_enqueue_script( 'selectize', get_theme_file_uri() . '/themerelic/customizers/custom-controls/select/selectize.js', array( 'jquery' ), false, true );

		// Typography
		wp_enqueue_script( 'relic-typography-control', get_theme_file_uri() . '/themerelic/customizers/custom-controls/typography/typography.js', array(
			'jquery',
			'selectize'
		), false, true );

		$google_fonts   = Popular_ecommerce_Fonts::get_google_fonts();
		$standard_fonts = Popular_ecommerce_Fonts::get_standard_fonts();
		$all_variants   = Popular_ecommerce_Fonts::get_all_variants();

		$standard_fonts_final = array();
		foreach ( $standard_fonts as $key => $value ) {
			$standard_fonts_final[] = array(
				'family'      => $value['stack'],
				'label'       => $value['label'],
				'is_standard' => true,
				'variants'    => array(
					array(
						'id'    => 'regular',
						'label' => $all_variants['regular'],
					),
					array(
						'id'    => 'italic',
						'label' => $all_variants['italic'],
					),
					array(
						'id'    => '700',
						'label' => $all_variants['700'],
					),
					array(
						'id'    => '700italic',
						'label' => $all_variants['700italic'],
					),
				),
			);
		}

		$google_fonts_final = array();

		if ( is_array( $google_fonts ) ) {
			foreach ( $google_fonts as $family => $args ) {
				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );

				$available_variants = array();
				foreach ( $variants as $variant ) {
					if ( array_key_exists( $variant, $all_variants ) ) {
						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
					}
				}

				$google_fonts_final[] = array(
					'family'   => $family,
					'label'    => $label,
					'variants' => $available_variants
				);
			}
		}

		$final = array_merge( $standard_fonts_final, $google_fonts_final );
		wp_localize_script( 'relic-typography-control', 'RaraAllFonts', $final );
	}

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
	 *
	 * Supports basic input types `text`, `checkbox`, `textarea`, `radio`, `select` and `dropdown-pages`.
	 * Additional input types such as `email`, `url`, `number`, `hidden` and `date` are supported implicitly.
	 *
	 * Control content can alternately be rendered in JS. See {@see WP_Customize_Control::print_template()}.
	 *
	 * @access public
	 * @return void
	 */
	public function render_content() {

		// intentionally empty
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @return void
	 */
	protected function content_template() { ?>
		<# if ( data.tooltip ) { #>
            <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
        <# } #>
        
        <label class="customizer-text">
            <# if ( data.label ) { #>
                <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
        </label>
        
        <div class="wrapper">
            <# if ( data.default['font-family'] ) { #>
                <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                <div class="font-family">
                    <h5>{{ data.l10n['font-family'] }}</h5>
                    <select id="relic-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                </div>
                <div class="variant relic-variant-wrapper">
                    <h5>{{ data.l10n['style'] }}</h5>
                    <select class="variant" id="relic-typography-variant-{{{ data.id }}}"></select>
                </div>
            <# } #>   
            
        </div>
        <?php
	}

}