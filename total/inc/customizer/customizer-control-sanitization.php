<?php

//SANITIZATION FUNCTIONS
function total_sanitize_text($input) {
    return wp_kses_post($input);
}

function total_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

function total_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

function total_sanitize_choices($input, $setting) {
    global $wp_customize;

    $control = $wp_customize->get_control($setting->id);

    if (array_key_exists($input, $control->choices)) {
        return $input;
    } else {
        return $setting->default;
    }
}

function total_sanitize_choices_array($input, $setting) {
    global $wp_customize;

    if (!empty($input)) {
        $input = array_map('absint', $input);
    }

    return $input;
}

function total_sanitize_color_alpha($color) {
    $mode = (false === strpos($color, 'rgba')) ? 'hex' : 'rgba';
    if ('rgba' === $mode) {
        $color = str_replace(' ', '', $color);
        sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
    } else {
        return sanitize_hex_color($color);
    }
}

function total_sanitize_color($color) {
    // Is this an rgba color or a hex?
    $mode = (false === strpos($color, 'rgba')) ? 'hex' : 'rgba';
    if ('rgba' === $mode) {
        $color = str_replace(' ', '', $color);
        sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
    } else {
        return sanitize_hex_color($color);
    }
}

/**
 * Sanitize GPS Latitude and Longitude
 */
function total_sanitize_lat_long($coords) {
    if (preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $coords)) {
        return $coords;
    } else {
        return 'error';
    }
}

function total_sanitize_image($image, $setting) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'bmp' => 'image/bmp',
        'tif|tiff' => 'image/tiff',
        'ico' => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype($image, $mimes);
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ($file['ext'] ? $image : $setting->default);
}

function total_sanitize_number_range($number, $setting) {
    // Ensure input is an absolute integer.
    $number = absint($number);

    // Get the input attributes associated with the setting.
    $atts = $setting->manager->get_control($setting->id)->input_attrs;

    // Get minimum number in the range.
    $min = (isset($atts['min']) ? $atts['min'] : $number);

    // Get maximum number in the range.
    $max = (isset($atts['max']) ? $atts['max'] : $number);

    // Get step.
    $step = (isset($atts['step']) ? $atts['step'] : 1);

    // If the number is within the valid range, return it; otherwise, return the default
    return ($min <= $number && $number <= $max && is_int($number / $step) ? $number : $setting->default);
}

function total_sanitize_dropdown_pages($page_id, $setting) {
    // Ensure $input is an absolute integer.
    $page_id = absint($page_id);

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ('publish' == get_post_status($page_id) ? $page_id : $setting->default);
}

function total_sanitize_hex_color($hex_color, $setting) {
    // Sanitize $input as a hex value without the hash prefix.
    $hex_color = sanitize_hex_color($hex_color);

    // If $input is a valid hex value, return it; otherwise, return the default.
    return (!is_null($hex_color) ? $hex_color : $setting->default);
}

function total_sanitize_html($html) {
    return wp_filter_post_kses($html);
}

function total_sanitize_number_absint($number, $setting) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint($number);

    // If the input is an absolute integer, return it; otherwise, return the default
    return ($number ? $number : $setting->default);
}

function total_sanitize_select($input, $setting) {

    // Ensure input is a slug.
    $input = sanitize_key($input);

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($setting->id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function total_sanitize_url($url) {
    return esc_url_raw($url);
}

function total_sanitize_repeater($input) {

    $input_decoded = json_decode($input, true);

    if (!empty($input_decoded)) {
        foreach ($input_decoded as $boxes => $box) {
            foreach ($box as $key => $value) {
                $input_decoded[$boxes][$key] = wp_kses_post($value);
            }
        }

        return json_encode($input_decoded);
    }

    //return $input;
}

/**
 * Number with blank value sanitization callback
 *
 */
function total_sanitize_number_blank($val) {
    return is_numeric($val) ? $val : '';
}

function total_sanitize_multi_choices($input, $setting) {
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($setting->id)->choices;
    $input_keys = $input;

    foreach ($input_keys as $key => $value) {
        if (!array_key_exists($value, $choices)) {
            unset($input[$key]);
        }
    }

    // If the input is a valid key, return it;
    // otherwise, return the default.
    return (is_array($input) ? $input : $setting->default);
}

/** Sanitize Boolean */
function total_sanitize_boolean($input) {
    return ((isset($input) && true == $input) ? true : false);
}
