<?php
/**
 * Select control.
 *
 * @package Wpbf
 */

namespace Mapsteps\Wpbf\Customizer\Controls\Select;

use Mapsteps\Wpbf\Customizer\Controls\Base\BaseControl;

/**
 * Class to add Wpbf customizer select control.
 */
class SelectControl extends BaseControl {

	/**
	 * Control's type.
	 *
	 * @var string
	 */
	public $type = 'wpbf-select';

	/**
	 * Whether to allow multiple selection.
	 *
	 * @var bool
	 */
	public $multiple = false;

	/**
	 * Maximum number of selections allowed.
	 *
	 * @var int
	 */
	public $max_selections = 999;

	/**
	 * Placeholder text.
	 *
	 * @var string
	 */
	public $placeholder = '';

	/**
	 * Whether the select is clearable.
	 *
	 * @var bool
	 */
	public $clearable = false;

	/**
	 * Constructor.
	 *
	 * Supplied `$args` override class property defaults.
	 *
	 * If `$args['settings']` is not defined, use the `$id` as the setting ID.
	 *
	 * @param WP_Customize_Manager $wp_customize_manager Customizer bootstrap instance.
	 * @param string               $id                   Control ID.
	 * @param array                $args                 Optional. Array of properties for the new Control object.
	 *                                                   Default empty array.
	 */
	public function __construct( $wp_customize_manager, $id, $args = array() ) {

		parent::__construct( $wp_customize_manager, $id, $args );

		$this->choices = ( new SelectChoices() )->format( $this->choices );

	}

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {

		parent::enqueue();

		// Enqueue the styles.
		wp_enqueue_style( 'wpbf-select-control', WPBF_THEME_URI . '/Customizer/Controls/Select/dist/select-control-min.css', array(), WPBF_VERSION );

		// Enqueue the scripts.
		wp_enqueue_script(
			'wpbf-select-control',
			WPBF_THEME_URI . '/Customizer/Controls/Select/dist/select-control-min.js',
			array(
				'customize-controls',
				'react-dom',
			),
			WPBF_VERSION,
			false
		);

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 */
	public function to_json() {

		parent::to_json();

		if ( isset( $this->json['label'] ) ) {
			$this->json['label'] = html_entity_decode( $this->json['label'] );
		}

		if ( isset( $this->json['description'] ) ) {
			$this->json['description'] = html_entity_decode( $this->json['description'] );
		}

		// @link https://react-select.com/props
		$this->json['isClearable'] = $this->clearable;
		$this->json['isMulti']     = $this->multiple;
		$this->json['placeholder'] = ( $this->placeholder ) ? $this->placeholder : esc_html__( 'Select...', 'page-builder-framework' );

		// Will be a custom implementation, couldn't find an official prop to set this in react-select.
		$this->json['maxSelections'] = $this->max_selections;

		$this->json['messages'] = array(
			// translators: %s is the limit of selection number.
			'maxLimitReached' => sprintf( esc_html__( 'You can only select %s items', 'page-builder-framework' ), $this->max_selections ),
		);

	}

}
