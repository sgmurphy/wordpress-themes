<?php /*** Option Panel
 *
 * @package Blogus
 */

$blogus_default = blogus_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/ansar/customize/frontpage-options.php';

/**
     * Create a Radio-Image control
     * 
     * This class incorporates code from the Kirki Customizer Framework and from a tutorial
     * written by Otto Wood.
     * 
     * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
     * is licensed under the terms of the GNU GPL, Version 2 (or later).
     * 
     * @link https://github.com/reduxframework/kirki/
     * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
     */
    class Blogus_Custom_Radio_Default_Image_Control extends WP_Customize_Control {
        
        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'radio-image';
        
        /**
         * Enqueue scripts and styles for the custom control.
         * 
         * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
         * 
         * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
         * at 'customize_controls_print_styles'.
         *
         * @access public
         */
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-button' );
        }
        
        /**
         * Render the control to be displayed in the Customizer.
         */
        public function render_content() {
            if ( empty( $this->choices ) ) {
                return;
            }           
            
            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title">
                <?php echo esc_attr( $this->label ); ?>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
            </span>
            <div id="input_<?php echo esc_attr($this->id); ?>" class="image">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr($this->id . $value); ?>" name="<?php echo esc_attr( $name ); ?>" <?php esc_attr($this->link()); checked( esc_attr($this->value(), $value )); ?>>
                        <label for="<?php echo esc_attr($this->id . $value); ?>">
                            <img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                        </label>
                    </input>
                <?php endforeach; ?>
            </div>
            <script>jQuery(document).ready(function($) { $( '[id="input_<?php echo esc_attr($this->id); ?>"]' ).buttonset(); });</script>
            <?php
        }
    }

  

   function blogus_header_info_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

    }
    
    if ( ! function_exists( 'blogus_sanitize_text_content' ) ) :

    /**
     * Sanitize text content.
     *
     * @since 1.0.0
     *
     * @param string               $input Content to be sanitized.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return string Sanitized content.
     */
    function blogus_sanitize_text_content( $input, $setting ) {

        return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

    }
endif;
    
    function blogus_header_sanitize_checkbox( $input ) {
        // Boolean check 
    return ( ( isset( $input ) && true == $input ) ? true : false );
    
    }

    //Theme Option Panel
    $wp_customize->add_panel('theme_option_panel',
        array(
            'title' => esc_html__('Theme Options', 'blogus'),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );

    //Theme Option Section

    // Typography Section.
    $wp_customize->add_section( 'blogus_typography_section' , array(
            'title'      => __('Typography Settings', 'blogus'),
            'panel' => 'theme_option_panel',
            'priority'       => 10,
        ) );


    //Blog Page Settings
    $wp_customize->add_section('site_post_date_author_settings',
        array(
            'title' => esc_html__('Blog Page', 'blogus'),
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );

    //Single Page Settings
    $wp_customize->add_section('site_single_posts_settings',
        array(
            'title' => esc_html__('Single Page', 'blogus'),
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );

    //Breadcrumb Settings
    $wp_customize->add_section('blogus_breadcrumb_settings',
        array(
            'title' => esc_html__('Breadcrumb Settings', 'blogus'),
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );

    //Sidebar Settings
    $wp_customize->add_section('sidebar_settings',
        array(
            'title' => esc_html__('Sidebar Settings', 'blogus'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );


    //You Missed seciton
    $wp_customize->add_section('you_missed_section',
        array(
            'title' => esc_html__('You Missed Section', 'blogus'),
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );

    // Footer Options.
    $wp_customize->add_section('footer_options', array(
        'title' => __('Footer Options','blogus'),
        'priority' => 70,
        'panel' => 'theme_option_panel',
    ) );
 
    //Footer Copyright
    $wp_customize->add_section('footer_copyright', array(
        'title' => __('Footer Copyright','blogus'),
        'priority' => 80,
        'panel' => 'theme_option_panel',
    ) );
    
    //Scroll Bar Section
    $wp_customize->add_section( 'general_options' , array(
        'title' => __('Scroller', 'blogus'),
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
        'priority' => 90,
    ) );

//========== Typography ===============//

$wp_customize->add_setting( 'enable_custom_typography',
    array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'blogus_sanitize_checkbox'
    )
); 
$wp_customize->add_control( new Blogus_Toggle_Control( $wp_customize, 'enable_custom_typography',
    array(
        'label' => esc_html__( 'Typography Enable/Disable','blogus'),
        'section' => 'blogus_typography_section'
    )
) );

    $wp_customize->add_setting('blogus_site_title_font',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_site_title_font',
            array(
                'label'             => esc_html__( 'Site Title Font', 'blogus' ),
                'section'           => 'blogus_typography_section',
            )
        )
    );

        $font_family = array(
        'Josefin Sans'=> 'Josefin Sans', 
        'Open Sans'=>'Open Sans', 
        'Kalam'=>'Kalam', 
        'Rokkitt'=>'Rokkitt', 
        'Jost, sans-serif' => 'Jost', 
        'Poppins' => 'Poppins', 
        'Lato' => 'Lato', 
        'Noto Serif'=>'Noto Serif', 
        'Raleway'=>'Raleway', 
        'Roboto' => 'Roboto');

        $font_weight = array('300' => '300', '500' => '500', '600' => '600', '700' => '700');

        $wp_customize->add_setting(
            'site_title_fontfamily',
            array(
                'default'           =>  'Josefin Sans',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'sanitize_text_field',
            )   
        );
        $wp_customize->add_control('site_title_fontfamily', array(
                'label' => __('Font family','blogus'),
                'section' => 'blogus_typography_section',
                'setting' => 'site_title_fontfamily',
                'type'    =>  'select',
                'choices'=>$font_family,
        ));

        $wp_customize->add_setting(
            'site_title_fontweight',
            array(
                'default'           =>  '700',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'sanitize_text_field',
            )   
        );
        $wp_customize->add_control('site_title_fontweight', array(
                'label' => __('Font Weight','blogus'),
                'section' => 'blogus_typography_section',
                'setting' => 'site_title_fontweight',
                'type'    =>  'select',
                'choices'=>$font_weight,
        ));
    

        $wp_customize->add_setting('blogus_menu_font',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_menu_font',
            array(
                'label'             => esc_html__( 'Menu Font', 'blogus' ),
                'section'           => 'blogus_typography_section',
            )
        )
    );

    $wp_customize->add_setting(
            'blogus_menu_fontfamily',
            array(
                'default'           =>  'Josefin Sans',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'sanitize_text_field',
            )   
        );
        $wp_customize->add_control('blogus_menu_fontfamily', array(
                'label' => __('Font family','blogus'),
                'section' => 'blogus_typography_section',
                'setting' => 'blogus_menu_fontfamily',
                'type'    =>  'select',
                'choices'=>$font_family,
        ));

 //========== Blog Page ===============//

 $wp_customize->add_setting('blogus_post_meta_heading',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_post_meta_heading',
            array(
                'label'             => esc_html__( 'Post Meta', 'blogus' ),
                'section'           => 'site_post_date_author_settings',
            )
        )
    );


// Settings = Drop Caps

$wp_customize->add_setting('blogus_drop_caps_enable',
    array(
        'default' => false,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_drop_caps_enable', 
    array(
        'label' => esc_html__('Drop Caps (First Big Letter)', 'blogus'),
        'type' => 'toggle',
        'section' => 'site_post_date_author_settings',
    )
));

// Setting - global content alignment of news.

$wp_customize->add_setting('blogus_global_category_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_global_category_enable', 
    array(
        'label' => esc_html__('Category', 'blogus'),
        'type' => 'toggle',
        'section' => 'site_post_date_author_settings',
    )
));



$wp_customize->add_setting('global_post_date_author_setting',
    array(
        'default' => $blogus_default['global_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_select',
    )
);


$wp_customize->add_control('global_post_date_author_setting',
    array(
        'label' => esc_html__('Date and Author', 'blogus'),
        'section' => 'site_post_date_author_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => esc_html__('Show Date and Author', 'blogus'),
            'show-date-only' => esc_html__('Show Date Only', 'blogus'),
            'show-author-only' => esc_html__('Show Author Only', 'blogus'),
            'hide-date-author' => esc_html__('Hide All', 'blogus'),
        ),
    ));


$wp_customize->add_setting('blogus_global_comment_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_global_comment_enable', 
    array(
        'label' => esc_html__('Comments', 'blogus'),
        'type' => 'toggle',
        'section' => 'site_post_date_author_settings',
    )
));

 $wp_customize->add_setting('blogus_blog_content_settings',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_blog_content_settings',
            array(
                'label'             => esc_html__( 'Choose Content Option', 'blogus' ),
                'section'           => 'site_post_date_author_settings',
            )
        )
    );


$wp_customize->add_setting('blogus_blog_content', 
    array(
        'default'           =>'excerpt',
        'sanitize_callback' => 'blogus_sanitize_select',
        )
    );

$wp_customize->add_control('blogus_blog_content', 
    array(            
        'section'   => 'site_post_date_author_settings',
        'type'      => 'radio',
        'choices'   =>  array(
            'excerpt'   => __('Excerpt', 'blogus'),
            'content'   => __('Full Content', 'blogus'),
            )
        )
    );

    $wp_customize->add_setting('blogus_post_pagination_heading',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_post_pagination_heading',
            array(
                'label'             => esc_html__( 'Pagination', 'blogus' ),
                'section'           => 'site_post_date_author_settings',
                'active_callback'   => 'content_layout_status',
            )
        )
    );

    // Setting - Single posts.
    $wp_customize->add_setting('blogus_pagination_remove',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_pagination_remove', 
        array(
            'label' => esc_html__('Hide/Show Next Pagination', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_post_date_author_settings',
            'active_callback'   => 'content_layout_status',
        )
    ));

 
    //Page Hedding
    $wp_customize->add_setting('blogus_single_page_heading',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_single_page_heading',
            array(
                'label'             => esc_html__( 'Featured Post', 'blogus' ),
                'section'           => 'site_single_posts_settings',
                'priority' => 10,
            )
        )
    );

    // Setting - Single posts.
    $wp_customize->add_setting('blogus_single_post_category',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_single_post_category', 
        array(
            'label' => esc_html__('Hide/Show Categories', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 20,
        )
    ));


    $wp_customize->add_setting('blogus_single_post_admin_details',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_single_post_admin_details', 
        array(
            'label' => esc_html__('Hide/Show Author Details', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 30,
        )
    ));


    $wp_customize->add_setting('blogus_single_post_date',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_single_post_date', 
        array(
            'label' => esc_html__('Hide/Show Date', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 40,
        )
    ));


    $wp_customize->add_setting('blogus_single_post_tag',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_single_post_tag', 
        array(
            'label' => esc_html__('Hide/Show Tag', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 50,
        )
    ));


    // Setting - related posts.
    $wp_customize->add_setting('single_show_featured_image',
    array(
        'default' => $blogus_default['single_show_featured_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'single_show_featured_image', 
        array(
            'label' => __('Hide/Show Featured Image', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 60,
        )
    ));


    $wp_customize->add_setting('single_show_share_icon',
    array(
        'default' => $blogus_default['single_show_share_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'single_show_share_icon', 
        array(
            'label' => __('Hide/Show Sharing Icons', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 70,
        )
    ));

    //Page Hedding
    $wp_customize->add_setting('blogus_single_post_author_heading',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_single_post_author_heading',
            array(
                'label'             => esc_html__( 'Author', 'blogus' ),
                'section'           => 'site_single_posts_settings',
                 'priority' => 80,
            )
        )
    );


    $wp_customize->add_setting('blogus_enable_single_admin_details',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );

    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_enable_single_admin_details', 
        array(
            'label' => esc_html__('Hide/Show Author Details', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 90,
        )
    ));


    //Page Hedding
    $wp_customize->add_setting('blogus_single_related_post_heading',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'blogus_single_related_post_heading',
            array(
                'label'             => esc_html__( 'Related Post', 'blogus' ),
                'section'           => 'site_single_posts_settings',
                 'priority' => 95,
            )
        )
    );

    $wp_customize->add_setting('blogus_enable_related_post',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_enable_related_post', 
        array(
            'label' => esc_html__('Enable Related Posts', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 100,
        )
    ));

    $wp_customize->add_setting('blogus_related_post_title', 
        array(
            'default' => esc_html__('Related Posts', 'blogus'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        )
    );
    $wp_customize->add_control('blogus_related_post_title', 
        array(
            'label' => esc_html__('Title', 'blogus'),
            'type' => 'text',
            'section' => 'site_single_posts_settings',
            'priority' => 110,
        )
    );

    /************************* Meta Hide Show *********************************/
    $wp_customize->add_setting('blogus_enable_single_post_category',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_enable_single_post_category', 
        array(
            'label' => esc_html__('Hide/Show Categories', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 120,
        )
    ));

    $wp_customize->add_setting('blogus_enable_single_post_date',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_enable_single_post_date', 
        array(
            'label' => esc_html__('Hide/Show Date', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 130,
        )
    ));

    $wp_customize->add_setting('blogus_enable_single_post_admin_details',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_enable_single_post_admin_details', 
        array(
            'label' => esc_html__('Hide/Show Author Details', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 140,
        )
    ));

    $wp_customize->add_setting('blogus_enable_single_post_comments',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_enable_single_post_comments', 
        array(
            'label' => esc_html__('Hide/Show Comments', 'blogus'),
            'type' => 'toggle',
            'section' => 'site_single_posts_settings',
            'priority' => 150,
        )
    )); 
    


    //========== Bredcrumb Settings ===============//
    $wp_customize->add_setting('breadcrumb_settings',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'breadcrumb_settings', 
        array(
            'label' => esc_html__('Hide/Show Breadcrumb', 'blogus'),
            'type' => 'toggle',
            'section' => 'blogus_breadcrumb_settings',
        )
    ));

    //Type Of Bredcrumb 
    $wp_customize->add_setting( 'blogus_site_breadcrumb_type', array(
       'sanitize_callback' => 'blogus_sanitize_select',
        'default'   => 'default',
    ));
    $wp_customize->add_control( 'blogus_site_breadcrumb_type', array(
        'type'      => 'select',
        'section'   => 'blogus_breadcrumb_settings',
        'label'     => esc_html__( 'Breadcrumb type', 'blogus' ),
        'description' => esc_html__( 'If you use other than "default" one you will need to install and activate respective plugins Breadcrumb NavXT, Yoast SEO and Rank Math SEO', 'blogus' ),
        'choices'   => array(
            'default' => __( 'Default', 'blogus' ),
            'navxt'  => __( 'NavXT', 'blogus' ),
            'yoast'  => __( 'Yoast SEO', 'blogus' ),
            'rankmath'  => __( 'Rank Math', 'blogus' )
        )
    ));
    
    //========== Sidebar Stickey Settings ===============//

    $wp_customize->add_setting('blogus_sidebar_stickey',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_sidebar_stickey', 
        array(
            'label' => esc_html__('Sidebar Sticky', 'blogus'),
            'type' => 'toggle',
            'section' => 'sidebar_settings',
        )
    ));

    //========== You Missed Section ===============//

    $wp_customize->add_setting('you_missed_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'you_missed_enable', 
        array(
            'label' => esc_html__('Hide / Show', 'blogus'),
            'type' => 'toggle',
            'section' => 'you_missed_section',
        )
    ));


    // Title
    $wp_customize->add_setting(
    'you_missed_title',
    array(
        'default' => esc_html__('You Missed','blogus'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    )
    
    );
    $wp_customize->add_control(
    'you_missed_title',
    array(
        'label' => __('Title','blogus'),
        'section' => 'you_missed_section',
        'type' => 'text',
    )
    );

    //========== Scroller ===============//

    $wp_customize->add_setting('blogus_scrollup_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_scrollup_enable', 
        array(
            'label' => esc_html__('Hide / Show Scroller', 'blogus'),
            'type' => 'toggle',
            'section' => 'general_options',
        )
    ));

    $wp_customize->add_setting(
        'scrollup_layout', array(
        'default' => 'fa fa-angle-up',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_select'
    ) );
    
    
    $wp_customize->add_control(
        new blogus_Custom_Radio_Default_Image_Control( 
            // $wp_customize object
            $wp_customize,
            // $id
            'scrollup_layout',
            // $args
            array(
                'settings'      => 'scrollup_layout',
                'section'       => 'general_options',
                'choices'       => array(
                    'fa fa-angle-up' => get_template_directory_uri() . '/images/fu1.svg',
                    'fas fa-angle-double-up'    => get_template_directory_uri() . '/images/fu2.svg',
                    'fa fas fa-arrow-up'    => get_template_directory_uri() . '/images/fu3.svg',
                    'fas fa-long-arrow-alt-up'    => get_template_directory_uri() . '/images/fu4.svg',
                )
            )
        )
    );

    //========== Footer Options ===============//
    
    $wp_customize->add_setting('blogus_footer_logo_width',
        array(
            'default'           => 210,
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('blogus_footer_logo_width',
        array(
            'label'    => esc_html__('Logo Width', 'blogus'),
            'section'  => 'footer_options',
            'type'     => 'number',
        )
    );

    $wp_customize->add_setting('blogus_footer_logo_height',
        array(
            'default'           => 70,
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('blogus_footer_logo_height',
        array(
            'label'    => esc_html__('Logo Height', 'blogus'),
            'section'  => 'footer_options',
            'type'     => 'number',
        )
    );
    

    //Footer Background image
    $wp_customize->add_setting( 
        'blogus_footer_widget_background', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blogus_footer_widget_background', array(
        'label'    => __( 'Background Image', 'blogus' ),
        'section'  => 'footer_options',
        'settings' => 'blogus_footer_widget_background',
    ) ) );


    //Bqckground Overlay 
   $wp_customize->add_setting(
        'blogus_footer_overlay_color', array( 'sanitize_callback' => 'blogus_sanitize_alpha_color',
        
    ) );
    
    $wp_customize->add_control(new blogus_Customize_Alpha_Color_Control( $wp_customize,'blogus_footer_overlay_color', array(
       'label'      => __('Overlay Color', 'blogus' ),
        'palette' => true,
        'section' => 'footer_options')
    ) );

    $wp_customize->add_setting(
        'blogus_footer_text_color',
        array( 
            'sanitize_callback' => 'blogus_sanitize_alpha_color',
            'default' => $blogus_default['blogus_footer_text_color'],
        ) 
    );
    
    $wp_customize->add_control( new blogus_Customize_Alpha_Color_Control( $wp_customize, 'blogus_footer_text_color', array(
       'label'      => __('Text Color', 'blogus' ),
       'palette' => true,
        'section' => 'footer_options')
    ));

    
    $wp_customize->add_setting(
        'blogus_footer_column_layout', array(
        'default' => 3,
        'transport' => 'postMessage',
        'sanitize_callback' => 'blogus_sanitize_select',
    ) );

    $wp_customize->add_control(
        'blogus_footer_column_layout', array(
        'type' => 'select',
        'label' => __('Select Column Layout','blogus'),
        'section' => 'footer_options',
        'choices' => array(1=>1, 2=>2,3=>3,4=>4),
    ) );
   
    //Enable and disable social icon
    $wp_customize->add_setting('footer_social_icon_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'footer_social_icon_enable', 
        array(
            'label' => esc_html__('Hide / Show Social Icon', 'blogus'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));


    $wp_customize->add_setting(
        'blogus_footer_social_icons',
        array(
            'default'           => blogus_get_social_icon_default(),
            'sanitize_callback' => 'blogus_repeater_sanitize',
        )
    );

    $wp_customize->add_control(
        new Blogus_Repeater_Control(
            $wp_customize,
            'blogus_footer_social_icons',
            array(
                'label'                            => esc_html__( 'Social Icons', 'blogus' ),
                'section'                          => 'footer_options',
                'add_field_label'                  => esc_html__( 'Add New Social', 'blogus' ),
                'item_name'                        => esc_html__( 'Social', 'blogus' ),
                'customizer_repeater_icon_control' => true,
                'customizer_repeater_link_control' => true,
                'customizer_repeater_checkbox_control' => true,
            )
        )
    );

    $wp_customize->add_setting( 'blogus_social_footer_upgrade_to_pro', array(
        'capability'            => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control(
        new Blogus_social_section_upgrade(
        $wp_customize,
        'blogus_social_footer_upgrade_to_pro',
            array(
                'section'               => 'footer_options',
                'settings'              => 'blogus_social_footer_upgrade_to_pro',
            )
        )
    );

    //========== Footer Copyright ===============//
    //Enable and disable social icon
    $wp_customize->add_setting('hide_copyright',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'hide_copyright', 
        array(
            'label' => esc_html__('Hide / Show Copyright', 'blogus'),
            'type' => 'toggle',
            'section' => 'footer_copyright',
        )
    ));

    $wp_customize->add_setting('blogus_footer_copyright', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => __('Copyright &copy; All rights reserved','blogus'),
        'transport'=> 'postMessage',
        
    ) );
    $wp_customize->add_control('blogus_footer_copyright', array(
        'label' => __('Copyright Text','blogus'),
        'section' => 'footer_copyright',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'blogus_footer_copy_bg', 
        array( 
            'sanitize_callback' => 'sanitize_hex_color',
            'default' => $blogus_default['blogus_footer_copy_bg'],
            
        ) 
    ); 
    $wp_customize->add_control( 'blogus_footer_copy_bg', array(
       'label'      => __('Background Color', 'blogus' ),
        'type' => 'color',
        'section' => 'footer_copyright')
    );

    $wp_customize->add_setting(
        'blogus_footer_copy_text', 
        array( 
            'sanitize_callback' => 'sanitize_hex_color',
            'default' => $blogus_default['blogus_footer_copy_text'],
        ) 
    ); 
    $wp_customize->add_control( 'blogus_footer_copy_text', array(
       'label'      => __('Text Color', 'blogus' ),
        'type' => 'color',
        'section' => 'footer_copyright')
    );


    function blogus_social_sanitize_checkbox( $input ) {
        // Boolean check 
        return ( ( isset( $input ) && true == $input ) ? true : false );
    }
    
    function blogus_template_page_sanitize_text( $input ) {

        return wp_kses_post( force_balance_tags( $input ) );

    }