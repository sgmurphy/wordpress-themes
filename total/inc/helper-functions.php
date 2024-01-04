<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Total
 */
if (!function_exists('total_excerpt')) {

    function total_excerpt($content, $letter_count) {
        $new_content = strip_shortcodes($content);
        $new_content = strip_tags($new_content);
        $content = mb_substr($new_content, 0, $letter_count);

        if (($letter_count !== 0) && (strlen($new_content) > $letter_count)) {
            $content .= "...";
        }
        return $content;
    }

}

if (!function_exists('total_comment')) {

    function total_comment($comment, $args, $depth) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
        <<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? 'parent' : '', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                    <?php echo sprintf('<b class="fn">%s</b>', get_comment_author_link($comment)); ?>
                </div><!-- .comment-author -->

                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'total'); ?></p>
                <?php endif; ?>
                <?php edit_comment_link(esc_html__('Edit', 'total'), '<span class="edit-link">', '</span>'); ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <div class="comment-metadata ht-clearfix">
                <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                    <time datetime="<?php comment_time('c'); ?>">
                        <?php
                        /* translators: 1: comment date, 2: comment time */
                        printf(esc_html__('%1$s at %2$s', 'total'), get_comment_date('', $comment), get_comment_time());
                        ?>
                    </time>
                </a>

                <?php
                comment_reply_link(array_merge($args, array(
                    'add_below' => 'div-comment',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '<div class="reply">',
                    'after' => '</div>'
                )));
                ?>
            </div><!-- .comment-metadata -->
        </article><!-- .comment-body -->
        <?php
    }

}

if (!function_exists('total_hex2rgba')) {

    function total_hex2rgba($color, $opacity = false) {

        $default = 'rgb(0,0,0)';

        //Return default if no color provided
        if (empty($color))
            return $default;

        //Sanitize $color if "#" is provided 
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif (strlen($color) == 3) {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb = array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if ($opacity) {
            if (abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }

        //Return rgb(a) color string
        return $output;
    }

}

if (!function_exists('total_color_brightness')) {

    function total_color_brightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
        //// CALCULATE 
        for ($i = 0; $i < 3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash . $hex;
    }

}

if (!function_exists('total_css_strip_whitespace')) {

    function total_css_strip_whitespace($css) {
        $replace = array(
            "#/\*.*?\*/#s" => "", // Strip C style comments.
            "#\s\s+#" => " ", // Strip excess whitespace.
        );
        $search = array_keys($replace);
        $css = preg_replace($search, $replace, $css);

        $replace = array(
            ": " => ":",
            "; " => ";",
            " {" => "{",
            " }" => "}",
            ", " => ",",
            "{ " => "{",
            ";}" => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            //"} " => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys($replace);
        $css = str_replace($search, $replace, $css);

        return trim($css);
    }

}

if (!function_exists('total_dimension_css')) {

    function total_dimension_css($key = '', $params = array()) {
        if (!$key)
            return;

        $default_params = array(
            'position' => array('left', 'top', 'bottom', 'right'),
            'selector' => '',
            'type' => 'margin',
            'unit' => 'px',
            'responsive' => true
        );

        $params = wp_parse_args($params, $default_params);

        $devices = array('desktop');
        if ($params['responsive']) {
            $devices = array('desktop', 'tablet', 'mobile');
        }
        $type = $params['type'] . '-';
        $positions = $params['position'];
        $unit = $params['unit'];
        $selector = $params['selector'];

        $css = '';
        foreach ($devices as $device) {
            $style = array();
            foreach ($positions as $position) {
                $val = get_theme_mod($key . '_' . $position . '_' . $device);
                if ($val === '0' || $val) {
                    $style[] = $type . $position . ':' . $val . $unit;
                }
            }
            if ($style) {
                if ($device == 'tablet') {
                    $css .= '@media screen and (max-width:768px){';
                } elseif ($device == 'mobile') {
                    $css .= '@media screen and (max-width:580px){';
                }
                $css .= $selector . '{' . implode(';', $style) . '}';
                if ($device == 'tablet' || $device == 'mobile') {
                    $css .= '}';
                }
            }
        }

        return $css;
    }

}

if (!function_exists('total_background_css')) {

    function total_background_css($key, $selector, $default = array()) {
        if (!$key || !$selector) {
            return;
        }

        $css = array();
        $css_overlay = '';
        $image_url = false;
        $default = wp_parse_args($default, array(
            'url' => '',
            'repeat' => 'repeat',
            'size' => 'auto',
            'position' => 'center-center',
            'attachment' => 'scroll',
            'color' => '',
            'overlay' => ''
        ));
        $params = array('url', 'repeat', 'size', 'position', 'attachment', 'overlay');
        $param_color = get_theme_mod($key . '_color', $default['color']);
        $style = '';

        foreach ($params as $param) {
            $param_val = get_theme_mod($key . '_' . $param, $default[$param]);

            if ($param_val) {
                if ($param == 'url') {
                    $css[] = "background-image:url({$param_val})";
                    $image_url = true;
                } else if ($param == 'position') {
                    $param_val = str_replace('-', ' ', $param_val);
                    $css[] = "background-{$param}:{$param_val}";
                } else if ($param == 'overlay') {
                    $css_overlay = "background-color:{$param_val}";
                } else {
                    $css[] = "background-{$param}:{$param_val}";
                }
            }
        }

        if ($css && $image_url) {
            $style = implode(';', $css);
            $style = $selector . '{' . $style . '}';
        }

        if ($css_overlay && $image_url) {
            $style .= $selector . ':before{' . $css_overlay . '}';
        }

        if ($param_color) {
            $style .= $selector . '{background-color:' . $param_color . '}';
        }

        return $style;
    }

}

if (!function_exists('total_typography_css')) {

    function total_typography_css($key, $selector, $default = array()) {
        if (!$key || !$selector) {
            return;
        }
        $css = array();
        $default = wp_parse_args($default, array(
            'family' => 'Default',
            'style' => '400',
            'text_decoration' => 'none',
            'text_transform' => 'none',
            'size' => '',
            'line_height' => '1',
            'letter_spacing' => '0',
            'color' => ''
        ));

        $family = get_theme_mod($key . '_family', $default['family']);
        $style = get_theme_mod($key . '_style', $default['style']);
        $text_decoration = get_theme_mod($key . '_text_decoration', $default['text_decoration']);
        $text_transform = get_theme_mod($key . '_text_transform', $default['text_transform']);
        $size = get_theme_mod($key . '_size', $default['size']);
        $line_height = get_theme_mod($key . '_line_height', $default['line_height']);
        $letter_spacing = get_theme_mod($key . '_letter_spacing', $default['letter_spacing']);
        $color = get_theme_mod($key . '_color', $default['color']);

        if (strpos($style, 'italic')) {
            $italic = 'italic';
        }

        $weight = absint($style);

        $css[] = (!empty($family) && $family != 'Default') ? "font-family: '{$family}', serif" : NULL;
        $css[] = !empty($weight) ? "font-weight: {$weight}" : NULL;
        $css[] = !empty($italic) ? "font-style: {$italic}" : NULL;
        $css[] = !empty($text_transform) ? "text-transform: {$text_transform}" : NULL;
        $css[] = !empty($text_decoration) ? "text-decoration: {$text_decoration}" : NULL;
        $css[] = !empty($size) ? "font-size: {$size}px" : NULL;
        $css[] = !empty($line_height) ? "line-height: {$line_height}" : NULL;
        $css[] = !empty($letter_spacing) ? "letter-spacing: {$letter_spacing}px" : NULL;
        $css[] = !empty($color) ? "color: {$color}" : NULL;

        $css = array_filter($css);

        return $selector . '{' . implode(';', $css) . '}';
    }

}

if (!function_exists('total_meta_dimension_css')) {

    function total_meta_dimension_css($key, $params = array()) {
        if (!$key) {
            return;
        }

        global $post;
        $dimensions = get_post_meta($post->ID, $key, true);

        $default_params = array(
            'selector' => '',
            'type' => 'margin',
            'unit' => 'px'
        );

        $params = wp_parse_args($params, $default_params);
        $selector = $params['selector'];
        $type = $params['type'];
        $unit = $params['unit'];

        if ($dimensions) {
            $css = array();
            foreach ($dimensions as $position => $value) {
                if ($value || $value === '0') {
                    $css[] = "{$type}-{$position}:{$value}{$unit}";
                }
            }

            if ($css) {
                $style = implode(';', $css);
                return $selector . '{' . $style . '}';
            }
        }
    }

}

if (!function_exists('total_home_section')) {

    function total_home_section() {
        $defaults = apply_filters('total_home_section', array(
            'total_about_section',
            'total_featured_section',
            'total_portfolio_section',
            'total_service_section',
            'total_team_section',
            'total_counter_section',
            'total_testimonial_section',
            'total_blog_section',
            'total_logo_section',
            'total_cta_section'
                )
        );
        $sections = get_theme_mod('total_frontpage_sections', $defaults);

        foreach ($sections as $section) {
            if ($section == 'total_client_logo_section') {
                $section_array[] = 'total_logo_section';
            } else {
                $section_array[] = $section;
            }
        }
        return $section_array;
    }

}

if (!function_exists('total_check_active_footer')) {

    function total_check_active_footer() {
        $total_footer_col = get_theme_mod('total_footer_col', 'col-3-1-1-1');
        $total_footer_array = explode('-', $total_footer_col);
        $count = count($total_footer_array);
        $footer_col = $count - 2;
        $status = false;

        for ($i = 1; $i <= $footer_col; $i++) {
            if (is_active_sidebar('total-footer' . $i)) {
                $status = true;
            }
        }

        return $status;
    }

}

if (!function_exists('total_is_woocommerce_activated')) {

    function total_is_woocommerce_activated() {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }

}