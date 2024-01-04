<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_about_page_disable') != 'on') {
    ?>
    <section id="ht-about-us-section" class="ht-section">
        <div class="ht-container ht-clearfix">
            <div class="ht-about-sec">
                <?php
                $total_about_page_id = get_theme_mod('total_about_page');
                if ($total_about_page_id) {
                    $page_on_front = get_option('page_on_front');
                    $page_for_posts = get_option('page_for_posts');

                    if ($total_about_page_id == $page_on_front) {
                        esc_html_e('You can not choose the page that is set as the Homepage in Settings > Reading. Please choose another Page', 'total');
                    } else if ($total_about_page_id == $page_for_posts) {
                        esc_html_e('You can not choose the page that is set as the Posts page. Please choose another Page in Settings > Reading', 'total');
                    } else {
                        $args = array(
                            'page_id' => absint($total_about_page_id)
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            while ($query->have_posts()) : $query->the_post();
                                ?>
                                <h2 class="ht-section-title"><?php the_title(); ?></h2>
                                <div class="ht-content">
                                    <?php
                                    if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                        the_excerpt();
                                    } else {
                                        the_content();
                                    }
                                    ?>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    }
                }
                ?>

                <div class="ht-progress-bar-sec">
                    <?php
                    for ($i = 1; $i < 6; $i++) {
                        $total_about_progressbar_title = get_theme_mod('total_about_progressbar_title' . $i);
                        $total_about_progressbar_percentage = get_theme_mod('total_about_progressbar_percentage' . $i);
                        $total_about_progressbar_disable = get_theme_mod('total_about_progressbar_disable' . $i);
                        if (!$total_about_progressbar_disable) {
                            ?>
                            <div class="ht-progress">
                                <h6><?php echo esc_html($total_about_progressbar_title); ?></h6>
                                <div class="ht-progress-bar">
                                    <div class="ht-progress-bar-length" style="width:<?php echo absint($total_about_progressbar_percentage); ?>%">
                                        <span><?php echo absint($total_about_progressbar_percentage) . "%"; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="ht-about-image">
                <?php
                $total_about_widget = get_theme_mod('total_about_widget', 'none');
                if ($total_about_widget && $total_about_widget != 'none') {
                    dynamic_sidebar($total_about_widget);
                } else {
                    $total_about_image = get_theme_mod('total_about_image');
                    if ($total_about_image) {
                        echo '<img alt="' . esc_html(get_the_title()) . '" src="' . esc_url($total_about_image) . '"/>';
                    }
                }
                ?>
            </div>

        </div>
    </section>
    <?php
} 