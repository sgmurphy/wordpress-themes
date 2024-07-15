<?php


namespace ColibriWP\Theme\Customizer\Controls;

class IconControl extends VueControl {

	public $type = 'colibri-icon';

	public static function sanitize( $value, $control_data, $default = '' ) {
		return array(
			'content' => '',
			'name'    => '',
		);
	}

	protected function printVueContent() {
		?>
		<icon-picker :value="value" :icons="icons"></icon-picker>
		<?php
	}
}
