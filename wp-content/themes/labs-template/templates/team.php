<?php
$title1 = get_theme_mod('labs-team-title1');
$title2 = get_theme_mod('labs-team-title2');
$title3 = get_theme_mod('labs-team-title3');
$picture = get_theme_mod('labs-team-pers');
$name = get_theme_mod('labs-team-name');
$job = get_theme_mod('labs-team-job');
?>


<!-- Team Section -->
<div class="team-section spad">
  <div class="overlay"></div>
  <div class="container">
    <div class="section-title">
      <h2><?= $title1; ?> <span><?= $title2; ?></span> <?= $title3; ?></h2>
    </div>
    <div class="row">
      <!-- single member -->
      <?php
      $args = [
        'post_type' => 'team',
        'posts_per_page' => 2,
        'orderby' => 'rand',
      ];
      $query = new WP_Query($args);
      ?>

      <?php $i = 0; ?>
      <?php while ($query->have_posts()) : $query->the_post();
        $i++;
        $i == 1 ?
          $post1 = [
            'url' => get_the_post_thumbnail_url(),
            'title' => get_the_title(),
            'content' => get_post_meta(get_the_ID(), 'infos_membre', true),
          ]
          : $post2 = [
            'url' => get_the_post_thumbnail_url(),
            'title' => get_the_title(),
            'content' => get_post_meta(get_the_ID(), 'infos_membre', true),
          ];

      endwhile;
      wp_reset_postdata();
      ?>

      <div class="col-sm-4">
        <div class="member">
          <img src="<?= $post1['url'] ?>" alt="">
          <h2><?= $post1['title'] ?></h2>
          <h3><?= $post1['content'] ?></h3>
        </div>
      </div>

      <!-- single member -->
      <div class="col-sm-4">
        <div class="member">
         <img src="<?= $picture; ?>" alt="">
         <h2><?= $name; ?></h2>
         <h3><?= $job; ?></h3>
        </div>
      </div>

      <!-- single member -->
      <div class="col-sm-4">
        <div class="member">
          <img src="<?= $post2['url']; ?>" alt="">
          <h2><?= $post2['title']; ?></h2>
          <h3><?= $post2 ['content']; ?></h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Team Section end-->