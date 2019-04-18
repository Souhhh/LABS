<?php
$title = get_theme_mod('labs-promotion-title', __('Changer le titre'));
$text = get_theme_mod('labs-promotion-text', __('Changer le texte'));
?>

  <!-- Promotion section -->
  <div class="promotion-section">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h2><?= $title; ?></h2>
          <p><?php echo $text; ?></p>
        </div>
        <div class="col-md-3">
          <div class="promo-btn-area">
            <a href="" class="site-btn btn-2">Browse</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Promotion section end--> 