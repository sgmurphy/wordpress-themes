<?php
if (!function_exists('total_custom_logo')) {

    function total_custom_logo() {
        $hide_title = get_theme_mod('total_hide_title', true);
        $hide_tagline = get_theme_mod('total_hide_tagline', true);

        if (function_exists('has_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        }

        if (!$hide_title || !$hide_tagline) {
            ?>
            <div class="ht-site-title-tagline">
                <?php
                if (!$hide_title) {
                    if (is_front_page()) {
                        ?>
                        <h1 class="ht-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php } else { ?>
                        <p class="ht-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                    }
                }
                ?>

                <?php if (!$hide_tagline) { ?>
                    <p class="ht-site-description"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('description'); ?></a></p>
                <?php }
                ?>
            </div> 
            <?php
        }
    }

}


if (!function_exists('total_main_navigation')) {

    function total_main_navigation() {
        ?>
        <a href="#" class="toggle-bar"><span></span></a>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container_class' => 'ht-menu ht-clearfix',
            'menu_class' => 'ht-clearfix',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ));
    }

}

if (!function_exists('total_display_header')) {

    function total_display_header() {
        ?>
        <header id="ht-masthead" class="ht-site-header">
            <div class="ht-header">
                <div class="ht-container">
                    <div id="ht-site-branding">
                        <?php total_custom_logo(); ?>
                    </div>

                    <nav id="ht-site-navigation" class="ht-main-navigation">
                        <?php total_main_navigation(); ?>
                    </nav>
                </div>
            </div>
        </header>
        <?php
    }

}

if (!function_exists('total_main_wrap_open')) {

    function total_main_wrap_open() {

        echo '<div id="ht-page">';
        echo '<a class="skip-link screen-reader-text" href="#ht-content">' . esc_html('Skip to content', 'total') . '</a>';
        do_action('total_header');
        echo '<div id="ht-content" class="ht-site-content">';
    }

}

add_action('total_body_open', 'total_main_wrap_open', 10);
add_action('total_header', 'total_display_header');
