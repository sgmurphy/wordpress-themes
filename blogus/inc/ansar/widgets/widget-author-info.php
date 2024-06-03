<?php add_action('admin_enqueue_scripts', 'blogus_author_widget_scripts');

function blogus_author_widget_scripts() {    

    wp_enqueue_media();

    wp_enqueue_script('news_author_widget_script', get_template_directory_uri() . '/js/widget-image.js', false, '1.0', true);

}
class blogus_author_info extends WP_Widget {  

    public function __construct() {
        parent::__construct(
            'blogus-author-widget',
            __( 'AR: Author Info', 'blogus' )
        );
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
        
        $blogus_btnone_target = '_self';
        if( !empty($instance['open_btnone_new_window']) ):
            $blogus_btnone_target = '_blank';
        endif;
        if (!empty($instance['title'])){
        echo $args['before_title'] . $instance['title'] . $args['after_title']; }
        ?>      
            <div class="bs-author text-center">
                <?php if( !empty($instance['image_uri']) ){ ?> 
                    <img class="rounded-circle" src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo apply_filters('widget_title', $instance['name']); ?>" />
                <?php } ?>
                    <h4><?php echo esc_html($instance['name']); ?></h4>
                    <p><?php echo esc_html($instance['desc']); ?></p>
                    <ul class="bs-social justify-content-center">
                        <?php if($instance['facebook'] !=''){?>
                        <li>
                            <a class="" <?php if($instance['open_btnone_new_window']) { ?> target="_blank" <?php } ?>href="<?php echo esc_url($instance['facebook']); ?>">
                                <i class="fab  fa-facebook"></i>
                            </a>
                        </li>
                        <?php } if($instance['twt'] !=''){ ?>
                        <li>
                            <a class="" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?>href="<?php echo esc_url($instance['twt']);?>">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </li>
                        <?php } if($instance['insta'] !=''){ ?>
                        <li>
                            <a class="" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($instance['insta']); ?>">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <?php } if($instance['youtube'] !=''){ ?>
                        <li>
                            <a class="" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($instance['youtube']); ?>">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>  
            </div>

        <?php echo $after_widget;

    }
    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['facebook'] = stripslashes(wp_filter_post_kses($new_instance['facebook']));
        $instance['open_btnone_new_window'] = strip_tags($new_instance['open_btnone_new_window']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['name'] = strip_tags($new_instance['name']);
        $instance['desc'] = strip_tags($new_instance['desc']);
        $instance['twt'] = stripslashes(wp_filter_post_kses($new_instance['twt']));
        $instance['insta'] = stripslashes(wp_filter_post_kses($new_instance['insta']));
        $instance['youtube'] = stripslashes(wp_filter_post_kses($new_instance['youtube']));

        $businessup_btnone_target = '_self';
        if( !empty($instance['open_btnone_new_window']) ):
            $businessup_btnone_target = '_blank';
        endif;

        return $instance;

    }

    function form($instance) {
        $instance['title'] = (isset($instance['title'])?$instance['title']:'');
        $instance['name'] = (isset($instance['name'])?$instance['name']:'');
        $instance['desc'] = (isset($instance['desc'])?$instance['desc']:'');

        ?>
           <p>
          <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title','blogus' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
          </p>
            <p>
            <label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php esc_html_e('Author Image', 'blogus'); ?></label><br/>

            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'blogus' ).'" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_team" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_team" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php esc_attr_e('Upload Image','blogus'); ?>" style="margin-top:5px;">
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id( 'name' )); ?>"><?php esc_html_e( 'Name','blogus' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'name' )); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
          </p>

          <p>
          <label for="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>"><?php esc_html_e( 'Description','blogus' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'desc' )); ?>" type="textarea" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
          </p>
      
            
        <table>
      <tr>
                <td>
                    <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook Link', 'blogus'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" value="<?php if( !empty($instance['facebook']) ): echo esc_attr($instance['facebook']); endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo esc_attr($this->get_field_id('twt')); ?>"><?php esc_html_e('Twitter Link', 'blogus'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('twt')); ?>" id="<?php echo esc_attr($this->get_field_id('twt')); ?>" value="<?php if( !empty($instance['twt']) ): echo esc_attr($instance['twt']); endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo esc_attr($this->get_field_id('insta')); ?>"><?php esc_html_e('Instagram Link', 'blogus'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('insta')); ?>" id="<?php echo esc_attr($this->get_field_id('insta')); ?>" value="<?php if( !empty($instance['insta']) ): echo esc_attr($instance['insta']); endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('YouTube Link', 'blogus'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" value="<?php if( !empty($instance['youtube']) ): echo esc_attr($instance['youtube']); endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="checkbox" name="<?php echo esc_attr($this->get_field_name('open_btnone_new_window')); ?>" id="<?php echo esc_attr($this->get_field_id('open_btnone_new_window')); ?>" <?php if( !empty($instance['open_btnone_new_window']) ): checked( (bool) $instance['open_btnone_new_window'], true ); endif; ?> ><?php esc_html_e( 'Open link in new tab','blogus' ); ?>
                </td>
            </tr>
        </table>
    <?php

    }
}