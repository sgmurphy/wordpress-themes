<?php

/** Gradient Control */
class Total_Gradient_Control extends WP_Customize_Control {

    public $type = 'ht--gradient';
    public $params = array();

    public function __construct($manager, $id, $args = array()) {
        if (isset($args['params'])) {
            $this->params = $args['params'];
        }
        parent::__construct($manager, $id, $args);
    }

    public function enqueue() {
        wp_enqueue_script('color-picker', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/colorpicker.js', array('jquery'), TOTAL_VERSION, true);
        wp_enqueue_script('jquery-classygradient', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/jquery.classygradient.js', array('jquery'), TOTAL_VERSION, true);
        wp_enqueue_script('custom-gradient', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/custom-gradient.js', array('jquery', 'jquery-ui-slider'), TOTAL_VERSION, true);

        wp_enqueue_style('color-picker', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/css/colorpicker.css');
        wp_enqueue_style('jquery-classygradient', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/css/jquery.classygradient.css');
    }

    public function render_content() {

        if (!empty($this->label)) :
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php
        endif;

        if (!empty($this->description)) :
            ?>
            <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php
        endif;

        $type = $this->type;
        $params = $this->params;
        $class = isset($params['class']) ? $params['class'] : '';
        $default_color = isset($params['default_color']) ? $params['default_color'] : '0% #0051FF, 100% #00C5FF';
        $picker_label = isset($params['picker_label']) ? $params['picker_label'] : esc_html__("Define Gradient Colors", 'total');
        $picker_description = isset($params['picker_description']) ? $params['picker_description'] : esc_html__("For a gradient, at least one starting and one end color should be defined.", 'total');
        $angle_label = isset($params['angle_label']) ? $params['angle_label'] : esc_html__("Define Gradient Direction", 'total');
        $preview_label = isset($params['preview_label']) ? $params['preview_label'] : esc_html__("Gradient Preview", 'total');
        ?>
        <div class="ht--gradient-box" data-default-color="<?php echo esc_attr($default_color); ?>">

            <div class="ht--gradient-row">
                <div class="ht--gradient-label"><?php echo esc_html($picker_label); ?></div>
                <div class="ht--gradient-picker"></div>
                <div class="ht--gradient-description"><?php echo esc_html($picker_description); ?></div>
            </div>

            <div class="ht--gradient-row">
                <div class="ht--gradient-label"><?php echo esc_html($angle_label); ?></div>
                <select class="ht--gradient-direction">
                    <option value="vertical"><?php echo esc_html__('Vertical Spread (Top to Bottom)', 'total'); ?></option>
                    <option value="horizontal"><?php echo esc_html__('Horizontal Spread (Left To Right)', 'total'); ?></option>
                    <option value="custom"><?php echo esc_html__('Custom Angle Spread', 'total'); ?></option>
                </select>
            </div>

            <div class="ht--gradient-row">
                <div class="ht--gradient-custom" style="display: none;">
                    <div class="ht--gradient-label"><?php echo esc_html__('Define Custom Angle', 'total'); ?></div>
                    <div class="ht--gradient-angle-slider">
                        <div class="ht--gradient-range"></div>
                    </div>
                </div>
            </div>
            <!--
              <div class="ht--gradient-row">
              <div class="ht--gradient-label"><?php echo esc_html($preview_label); ?></div>
              <div class="ht--gradient-preview"></div>
              </div>
            -->
            <input type="hidden" class="<?php echo esc_attr($type); ?> <?php echo esc_attr($class) ?> ht--gradient-val"  value="<?php echo esc_attr($this->value()) ?>" <?php $this->link(); ?> />
        </div>
        <?php
    }

}
