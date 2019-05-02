  <!-- About section -->
  <div class="about-section">
    <div class="overlay"></div>
    <!-- card section -->
    <?php
    $args = [
      'post_type' => 'services',
      'posts_per_page' => 3,
      'orderby' => 'rand',
      // 'category_name' => 'services-card'
    ];
    $queryCards = new WP_Query($args);
    ?>
    <div class="card-section">
      <div class="container">
        <div class="row">
          <?php while ($queryCards->have_posts()) : $queryCards->the_post(); 
          $icon = get_post_meta(get_the_ID(), 'choix_icone', true); ?>
            <!-- single card -->
            <div class="col-md-4 col-sm-6">
              <div class="lab-card">
                <div class="icon">
                  <i class="<?= $icon ?>"></i>
                </div>
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
              </div>
            </div>
          <?php
        endwhile;
        wp_reset_postdata();
        ?>


          <!-- single card -->
          <!-- <div class="col-md-4 col-sm-6">
            <div class="lab-card">
              <div class="icon">
                <i class="flaticon-011-compass"></i>
              </div>
              <h2>Projects online</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div> -->

          <!-- single card -->
          <!-- <div class="col-md-4 col-sm-12">
            <div class="lab-card">
              <div class="icon">
                <i class="flaticon-037-idea"></i>
              </div>
              <h2>SMART MARKETING</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- card section end-->