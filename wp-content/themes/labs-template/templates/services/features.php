<?php
$title1 = get_theme_mod('labs-proj-title1');
$title2 = get_theme_mod('labs-proj-title2');
$title3 = get_theme_mod('labs-proj-title3');
?>

<!-- features section -->
<div class="team-section spad">
  <!-- <div class="overlay"></div> -->
  <div class="container">
    <div class="section-title">
      <h2><?= $title1; ?> <span><?= $title2; ?></span> <?= $title3; ?></h2>
    </div>
    <div class="row">
      <!-- feature item -->
      <div class="col-md-4 col-sm-4 features">
        <?php
        $args = [
          'post_type' => 'projets',
          'orderby' => 'rand',
          'posts_per_page' => 3,
        ];
        $query = new WP_Query($args);
        ?>
        <?php while ($query->have_posts()) :
          $query->the_post();
          $icon = get_post_meta(get_the_ID(), 'choix_icone', true);
          ?>
          <div class="icon-box light left">
            <div class="service-text">
              <h2><?php the_title(); ?></h2>
              <p><?php the_content(); ?></p>
            </div>
            <div class="icon">
              <i class="<?= $icon ?>"></i>
            </div>
          </div>
        <?php
      endwhile;
      wp_reset_postdata();
      ?>
      </div>


      <!-- PHOTO DU GSM -->
      <!-- Devices -->
      <div class="col-md-4 col-sm-4 devices">
        <div class="text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/img/device.png" alt="">
        </div>
      </div>


      <!-- feature item -->
      <div class="col-md-4 col-sm-4 features">
        <?php
        $args = [
          'post_type' => 'projets',
          'orderby' => 'rand',
          'posts_per_page' => 3,
        ];
        $query = new WP_Query($args);
        ?>
        <?php while ($query->have_posts()) :
          $query->the_post();
          $icon = get_post_meta(get_the_ID(), 'choix_icone', true);
          ?>
          <div class="icon-box light">
            <div class="icon">
              <i class="<?= $icon ?>"></i>
            </div>
            <div class="service-text">
              <h2><?php the_title(); ?></h2>
              <p><?php the_content(); ?></p>
            </div>
          </div>
        <?php
      endwhile;
      wp_reset_postdata();
      ?>
      </div>
    </div>
  </div>

  <div class="text-center mt100">
    <a href="#cards" class="site-btn">Browse</a>
  </div>
</div>
  <!-- features section end-->