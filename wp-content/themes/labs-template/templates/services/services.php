<?php
$title1 = get_theme_mod('labs-serv-title1');
$title2 = get_theme_mod('labs-serv-title2');
$title3 = get_theme_mod('labs-serv-title3');
?>


<!-- services section -->
<div class="services-section spad">
  <div class="container">
    <div class="section-title dark">
      <h2><?= $title1; ?> <span><?= $title2; ?></span> <?= $title3; ?></h2>
    </div>
    <div class="row">

      <?php
      $paged = (get_query_var('paged')) ?
      get_query_var('paged') : 1;
      ?>

      <?php
      $args = [
        'post_type' => 'services',
        'order' => 'ASC',
        'posts_per_page' => 9,
        'paged' => $paged,
      ];
      $query = new WP_Query($args);
      ?>

      <?php while ($query->have_posts()) :
        $query->the_post();
        $icon = get_post_meta(get_the_ID($query), 'choix_icone', true);
        ?>

        <!-- single service -->
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


    </div>
    <div class="text-center">
      <!-- <a href="" class="site-btn">Browse</a> -->
    </div>
  </div>

      <!-- Pagination -->
      <!-- <div class="page-pagination text-center">
        <a class="active" href="">01.</a>
        <a href="">02.</a>
        <a href="">03.</a>
      </div> -->


      <div class="page-pagination text-center">
        <?php
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
          'format' => '/page/%#%',
          'current' => $current_page,
          'total' => $query->max_num_pages,
          'prev_text' => __('« Prev'),
          'next_text' => __('Next »'),
        ));
        wp_reset_postdata();
        ?>

      </div>

</div>
<!-- services section end -->