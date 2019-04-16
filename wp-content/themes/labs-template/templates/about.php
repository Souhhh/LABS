<?php
$text_column_left = get_theme_mod('labs-about-text-left', __('Texte about gauche'));
$text_column_right = get_theme_mod('labs-about-text-right', __('Texte about droite'));
$title1 = get_theme_mod('labs-about-title1', __('Titre de la section'));
$title2 = get_theme_mod('labs-about-title2', __('Titre de la section'));
$title3 = get_theme_mod('labs-about-title3', __('Titre de la section'));
?>


<!-- About contant -->
 <div class="about-contant">
      <div class="container">
        <div class="section-title">
          <h2><?= $title1; ?> <span><?= $title2; ?></span> <?= $title3; ?></h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <p><?= $text_column_left; ?></p>
          </div>
          <div class="col-md-6">
            <p><?= $text_column_right; ?></p>
          </div>
        </div>
        <div class="text-center mt60">
          <a href="" class="site-btn">Browse</a>
        </div>
        <!-- popup video -->
        <div class="intro-video">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <img src="http://localhost:8080/wp-content/themes/labs-template/img/video.jpg" alt="">
              <a href="https://www.youtube.com/watch?v=JgHfx2v9zOU" class="video-popup">
                <i class="fa fa-play"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About section end -->
