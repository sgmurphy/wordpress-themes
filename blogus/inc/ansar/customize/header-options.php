<?php // Add Header Options Panel.

$wp_customize->add_panel('header_option_panel',
    array(
        'title' => esc_html__('Header Options', 'blogus'),
        'priority' => 30,
        'capability' => 'edit_theme_options',
    )
);


$wp_customize->add_section( 'social_options' , array(
        'title' => __('Social icons', 'blogus'),
        'capability' => 'edit_theme_options',
        'panel' => 'header_option_panel',
        'priority' => 10,
    ) );


    $wp_customize->add_setting(
        'social_settings'
            ,array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'blogus_sanitize_text',
            'priority' => 1,
        )
    );

    $wp_customize->add_control(
    'social_settings',
        array(
            'type' => 'hidden',
            'label' => __('Social icons','blogus'),
            'section' => 'social_options',
        )
    );

    $wp_customize->add_setting('header_social_icon_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'header_social_icon_enable', 
        array(
            'label' => esc_html__('Hide / Show Social icons', 'blogus'),
            'type' => 'toggle',
            'section' => 'social_options',
        )
    ));

    $wp_customize->add_setting(
            'blogus_header_social_icons',
            array(
                'default'           => blogus_get_social_icon_default(),
                'sanitize_callback' => 'blogus_repeater_sanitize'
            )
        );

        $wp_customize->add_control(
            new Blogus_Repeater_Control(
                $wp_customize,
                'blogus_header_social_icons',
                array(
                    'label'                            => esc_html__( 'Social icons', 'blogus' ),
                    'section'                          => 'social_options',
                    'add_field_label'                  => esc_html__( 'Add New', 'blogus' ),
                    'item_name'                        => esc_html__( 'Social', 'blogus' ),
                    'customizer_repeater_icon_control' => true,
                    'customizer_repeater_link_control' => true,
                    'customizer_repeater_checkbox_control' => true,
                )
            )
        );

        //Pro Button
        class Blogus_social_section_upgrade extends WP_Customize_Control {
            public function render_content() { ?>
                <h3 class="customizer_blogus_social_upgrade_to_pro" style="display: none;">
        <?php esc_html_e('To add More Social Icon? Then','blogus'); ?><a href="<?php echo esc_url( 'https://themeansar.com/blogus-pro' ); ?>" target="_blank">
                    <?php esc_html_e('Upgrade to Pro','blogus'); ?> </a>  
                </h3>
            <?php
            }
        }
        
        $wp_customize->add_setting( 'blogus_social_upgrade_to_pro', array(
            'capability'            => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        ));
        $wp_customize->add_control(
            new Blogus_social_section_upgrade(
            $wp_customize,
            'blogus_social_upgrade_to_pro',
                array(
                    'section'               => 'social_options',
                    'settings'              => 'blogus_social_upgrade_to_pro',
                )
            )
        );
    

    //Menu Settings
    $wp_customize->add_section( 'menu_options' , array(
            'title' => __('Menu', 'blogus'),
            'capability' => 'edit_theme_options',
            'panel' => 'header_option_panel',
            'priority' => 10,
        ) );


    $wp_customize->add_setting(
                'menu_settings'
                    ,array(
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'blogus_sanitize_text',
                    'priority' => 1,
                )
            );

        $wp_customize->add_control(
        'menu_settings',
            array(
                'type' => 'hidden',
                'label' => __('Menu','blogus'),
                'section' => 'menu_options',
            )
        );

    $wp_customize->add_setting('blogus_menu_search',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_menu_search', 
        array(
            'label' => esc_html__('Hide / Show Search', 'blogus'),
            'type' => 'toggle',
            'section' => 'menu_options',
        )
    ));

    $wp_customize->add_setting('blogus_menu_subscriber',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_menu_subscriber', 
        array(
            'label' => esc_html__('Hide / Show Subscribe Button', 'blogus'),
            'type' => 'toggle',
            'section' => 'menu_options',
        )
    ));

    $wp_customize->add_setting('blogus_subsc_link',
        array(
            'default' => '#',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('blogus_subsc_link',
        array(
            'label' => esc_html__('Button Link', 'blogus'),
            'section' => 'menu_options',
            'type' => 'url',
        )
    );

    $wp_customize->add_setting('blogus_subsc_open_in_new',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_subsc_open_in_new', 
        array(
            'label' => esc_html__('Open link in new tab', 'blogus'),
            'type' => 'toggle',
            'section' => 'menu_options',
        )
    ));

    $wp_customize->add_setting('blogus_lite_dark_switcher',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_lite_dark_switcher', 
        array(
            'label' => esc_html__('Hide / Show Dark and Lite Mode Switcher', 'blogus'),
            'type' => 'toggle',
            'section' => 'menu_options',
        )
    ));  