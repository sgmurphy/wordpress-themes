<?php

/* ============PRO FEATURES============ */

$total_pro_features = '<ul>
	<li>' . esc_html__("5+ Demos that can be imported with one click", "total") . '</li>
        <li>' . esc_html__("Elementor compatible - Built your Home Page with Customizer or Elementor whichever you like", "total") . '</li>
        <li>' . esc_html__("18 Front Page Customizer sections with lots of variations", "total") . '</li>
	<li>' . esc_html__("30+ Elementor Elements", "total") . '</li>
        <li>' . esc_html__("26 custom widgets", "total") . '</li>
	<li>' . esc_html__("Video background, Image Motion background, Parallax background, Gradient background option for each section", "total") . '</li>
	<li>' . esc_html__("4 icon pack for icon picker (5000+ Icons)", "total") . '</li>
	<li>' . esc_html__("Unlimited slider with linkable button", "total") . '</li>
	<li>' . esc_html__("Add unlimited blocks(like slider, team, testimonial) for each Section", "total") . '</li>
	<li>' . esc_html__("Fully customizable options for Front Page blocks", "total") . '</li>
	<li>' . esc_html__("15+ Shape divider to choose from for each section", "total") . '</li>
	<li>' . esc_html__("Remove footer credit Text", "total") . '</li>
	<li>' . esc_html__("6 header layouts and advanced header settings", "total") . '</li>
	<li>' . esc_html__("4 blog layouts", "total") . '</li>
	<li>' . esc_html__("In-built MegaMenu", "total") . '</li>
	<li>' . esc_html__("Advanced Typography options", "total") . '</li>
	<li>' . esc_html__("Advanced color options", "total") . '</li>
	<li>' . esc_html__("Top header bar", "total") . '</li>
	<li>' . esc_html__("PreLoader option", "total") . '</li>
	<li>' . esc_html__("Sidebar layout options", "total") . '</li>
	<li>' . esc_html__("Advanced blog settings", "total") . '</li>
	<li>' . esc_html__("Advanced footer setting", "total") . '</li>
	<li>' . esc_html__("Front page sections with full window height", "total") . '</li>
	<li>' . esc_html__("Blog single page - Author Box, Social Share and Related Post", "total") . '</li>
	<li>' . esc_html__("Google map option", "total") . '</li>
	<li>' . esc_html__("WooCommerce Compatible", "total") . '</li>
	<li>' . esc_html__("Fully Multilingual and Translation ready", "total") . '</li>
	<li>' . esc_html__("Fully RTL(Right to left) languages compatible", "total") . '</li>
	</ul>
	<a class="ht-implink" href="http://localhost:8888/total/wp-admin/admin.php?page=total-welcome&section=free_vs_pro" target="_blank">' . esc_html__("Comparision - Free Vs Pro", "total") . '</a>';

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-pro-section', array(
    'priority' => 0,
    //'title' => esc_html__('Christmas & New Year Deal. Use Coupon Code: HOLIDAY', 'total'),
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-customizer-button&utm_campaign=total-upgrade',
)));

$wp_customize->add_section('total_pro_feature_section', array(
    'title' => esc_html__('Pro Theme Features', 'total'),
    'priority' => 0
));

$wp_customize->add_setting('total_hide_upgrade_notice', array(
    'sanitize_callback' => 'total_sanitize_checkbox',
    'default' => false,
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_hide_upgrade_notice', array(
    'section' => 'total_pro_feature_section',
    'label' => esc_html__('Hide all Upgrade Notices from Customizer', 'total'),
    'description' => esc_html__('If you don\'t want to upgrade to premium version then you can turn off all the upgrade notices. However you can turn it on anytime if you make mind to upgrade to premium version.', 'total')
)));

$wp_customize->add_setting('total_pro_features', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Text_Info_Control($wp_customize, 'total_pro_features', array(
    'settings' => 'total_pro_features',
    'section' => 'total_pro_feature_section',
    'description' => $total_pro_features,
    'active_callback' => 'total_is_upgrade_notice_active'
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-doc-section', array(
    'title' => esc_html__('Documentation', 'total'),
    'priority' => 1000,
    'class' => 'ht--single-row',
    'upgrade_text' => esc_html__('View', 'total'),
    'upgrade_url' => 'https://hashthemes.com/documentation/total-documentation/'
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-demo-import-section', array(
    'title' => esc_html__('Import Demo Content', 'total'),
    'priority' => 999,
    'class' => 'ht--single-row',
    'upgrade_text' => esc_html__('Import', 'total'),
    'upgrade_url' => admin_url('admin.php?page=total-welcome')
)));

/* ============HOMEPAGE SETTINGS PANEL============ */
$wp_customize->get_section('static_front_page')->priority = 1;

$wp_customize->add_setting('total_enable_frontpage', array(
    'sanitize_callback' => 'total_sanitize_checkbox'
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_enable_frontpage', array(
    'section' => 'static_front_page',
    'label' => esc_html__('Enable FrontPage', 'total'),
    'description' => sprintf(esc_html__('Overwrites the homepage displays setting and shows the frontpage for Customizer %s', 'total'), '<a href="javascript:wp.customize.panel(\'total_home_panel\').focus()">' . esc_html__('Front Page Sections', 'total') . '</a>') . '<br/><br/>' . esc_html__('Do not enable this option if you want to use Elementor in home page.', 'total')
)));

