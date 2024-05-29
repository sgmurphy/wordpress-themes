<?php function blogus_custom_style(){
  $blogus_theme_sidebar_width = get_theme_mod('blogus_theme_sidebar_width'); 
  if($blogus_theme_sidebar_width){ ?>
    <style>
      .sidebar-right, .sidebar-left
      {
        flex: 100;
        width:<?php echo esc_attr(get_theme_mod('blogus_theme_sidebar_width',280)).'px'; ?> !important;
      }

      .content-right
      {
        width: calc((1130px - <?php echo esc_attr(get_theme_mod('blogus_theme_sidebar_width',280)).'px'; ?>)) !important;
      }
    </style>
  <?php } 
} add_action('wp_head','blogus_custom_style',10,0); 
