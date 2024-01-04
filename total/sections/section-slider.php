<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_slider_section_disable') != 'on') {
    ?>
    <div id="ht-home-slider-section">
        <div id="ht-bx-slider" class="owl-carousel">
            <?php
            for ($i = 1; $i < 4; $i++) {
                $total_slider_page_id = get_theme_mod('total_slider_page' . $i);

                if ($total_slider_page_id) {
                    $args = array(
                        'page_id' => absint($total_slider_page_id)
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <div class="ht-slide">
                                <div class="ht-slide-overlay"></div>

                                <?php
                                if (has_post_thumbnail()) {
                                    $total_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                    if (isset($total_slider_image[0])) {
                                        echo '<img class="no-lazyload" alt="' . esc_html(get_the_title()) . '" src="' . esc_url($total_slider_image[0]) . '">';
                                    }
                                }
                                ?>

                                <div class="ht-slide-caption">
                                    <div class="ht-slide-cap-title">
                                        <span><?php echo esc_html(get_the_title()); ?></span>
                                    </div>

                                    <div class="ht-slide-cap-desc">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                }
            }
            ?>
        </div>
    </div>    
    <?php
}