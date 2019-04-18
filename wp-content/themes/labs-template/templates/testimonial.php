<?php
$title = get_theme_mod('labs-testinomial', __('Changer le titre')); // On doit mettre le nom du setting en premier paramètre.
?>

<!-- Testimonial section -->
<div class="testimonial-section pb100">
  <div class="test-overlay"></div>

  <?php
  $args = [
    'post-type' => 'post',
    'posts_per_page' => 6,
    // 'category_name' => 'testimonials'
  ];
  $query = new WP_Query($args);
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-4">
        <div class="section-title left">
          <h2><?php echo $title; ?></h2>
        </div>
        <div class="owl-carousel" id="testimonial-slide">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <!-- single testimonial -->
            <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p><?php the_content(); ?>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="http://localhost:8080/wp-content/themes/labs-template/img/avatar/01.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div>
          <?php
        endwhile;
        wp_reset_postdata();
        ?>

          <!-- single testimonial
            <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="http://localhost:8080/wp-content/themes/labs-template/img/avatar/02.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div>
            <!-- single testimonial -->
          <!-- <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="http://localhost:8080/wp-content/themes/labs-template/img/avatar/01.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div> -->
          <!-- single testimonial -->
          <!-- <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="http://localhost:8080/wp-content/themes/labs-template/img/avatar/02.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div> -->
          <!-- single testimonial -->
          <!-- <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="http://localhost:8080/wp-content/themes/labs-template/img/avatar/01.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div> -->
          <!-- single testimonial -->
          <!-- <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="http://localhost:8080/wp-content/themes/labs-template/img/avatar/02.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div>  -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Testimonial section end-->