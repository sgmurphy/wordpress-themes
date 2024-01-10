<div class="welcome-header clearfix">
    <!--<a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-newyear&utm_campaign=total-upgrade'); ?>" target="_blank"><img style="width:100%;margin-bottom:40px;display:block;" src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/christmas-sale.jpg'); ?>"></a>-->
    <div class="welcome-intro">
        <h2>
            <?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name, 2-theme version */
                    esc_html__('Welcome to %1$s - Version %2$s', 'total'), $this->theme_name, $this->theme_version);
            ?>
        </h2>
        <div class="welcome-text">
            <?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name */
                    esc_html__('Welcome and thank you for installing %1$s. Getting started with %1$s is very easy. Here you will find all the necessary information required to get started with the theme. And of course, the premium version if you require more features.', 'total'), $this->theme_name);
            ?>
        </div>

        <div class="free-pro-demos">
            <a class="button button-primary" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome&utm_campaign=total-demo" target="_blank"><span class="dashicons dashicons-visibility"></span><?php esc_html_e('Free Demos', 'total'); ?></a>
            <a class="button button-primary" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome&utm_campaign=total-demo" target="_blank"><span class="dashicons dashicons-cart"></span><?php esc_html_e('Premium Demos', 'total'); ?></a>
        </div>
    </div>

    <div class="welcome-promo-banner">
        <div class="welcome-logo">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/total.svg'); ?>"/>
        </div>
        <a class="welcome-promo-offer" href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome&utm_campaign=total-upgrade'); ?>" target="_blank"><?php echo esc_html__('Unlock all the possibilities with Total Plus.', 'total'); ?></a>
        <a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome&utm_campaign=total-upgrade'); ?>" target="_blank" class="button button-primary upgrade-btn"><?php echo esc_html__('UPGRADE TO PRO', 'total'); ?></a>
    </div>
</div>

<div class="welcome-nav-wrapper clearfix">
    <?php foreach ($tabs as $section_id => $label) : ?>
        <?php
        $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started';
        $nav_class = 'welcome-nav-tab';
        if ($section_id == $section) {
            $nav_class .= ' welcome-nav-tab-active';
        }
        ?>
        <a href="<?php echo esc_url(admin_url('admin.php?page=total-welcome&section=' . $section_id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
            <?php echo esc_html($label); ?>
        </a>
    <?php endforeach; ?>
</div>