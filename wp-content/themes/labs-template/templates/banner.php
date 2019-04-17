<?php
$logo2 = get_theme_mod('labs-banner', __('Changer le logo'));
$carousel1 = get_theme_mod('labs-carousel1', __('Changer l\'image 1'));
$carousel2 = get_theme_mod('labs-carousel2', __('Changer l\'image 2'));
?>
  <!-- Intro Section -->
  <div class="hero-section">
    <div class="hero-content">
      <div class="hero-center">
        <img src="<?php echo $logo2; ?>" alt="">
        <p><?php echo get_bloginfo('name');?></p>
      </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">
      <div class="item  hero-item" data-bg="<?php echo $carousel1; ?>"></div>
      <div class="item  hero-item" data-bg="<?php echo $carousel2; ?>"></div>
    </div>
  </div>
  <!-- Intro Section -->  