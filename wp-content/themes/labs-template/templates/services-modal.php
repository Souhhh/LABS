<!-- Partie des 9 services aléatoires -->
<?php
$args = [
  'post_type' => 'services',
  'posts_per_page' => 9,
  'orderby' => 'rand',
];
$query = new WP_Query($args);
?>


<?php while ($query->have_posts()) :
  $query->the_post();
  $icon = get_post_meta(get_the_ID(), 'choix_icone', true); ?>

  <div class="col-md-4 col-sm-6">
    <div class="service">
      <div class="icon">
        <i class="<?= $icon ?>"></i>
      </div>
      <div class="service-text">
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
      </div>
    </div>
  </div>
<?php
endwhile;
wp_reset_postdata();
?>


