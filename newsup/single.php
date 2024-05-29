<?php get_header(); ?>
<!-- =========================
     Page Content Section      
============================== -->
<main id="content" class="single-class content">
  <!--container-->
    <div class="container-fluid">
      <!--row-->
        <div class="row">
          <?php get_template_part('template-parts/content', 'single'); ?>
        </div>
      <!--row-->
    </div>
  <!--container-->
</main>
<?php get_footer();