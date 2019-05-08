 <!-- services card section-->
 <div class="services-card-section spad" id="cards">
    <div class="container">
      <div class="row">
        <?php
        $args = [
          'post_type' => 'projets',
          'posts_per_page' => 3,
          'order' => 'DESC',
        ];
        $query = new WP_Query($args);
        ?>
        <?php while ($query->have_posts()) :
        $query->the_post();
        ?>
        <!-- Single Card -->
        <div class="col-md-4 col-sm-6">
          <div class="sv-card">
            <div class="card-img">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            </div>
            <div class="card-text">
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
    </div>
  </div>
  <!-- services card section end-->