<?php
$title1 = get_theme_mod('labs-team-title1', __('Changer le titre'));
$title2 = get_theme_mod('labs-team-title2', __('Changer le titre'));
$title3 = get_theme_mod('labs-team-title3', __('Changer le titre'));
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
        <div class="col-sm-4">
          <div class="member">
            <img src="http://localhost:8080/wp-content/themes/labs-template/img/team/1.jpg" alt="">
            <h2>Christinne Williams</h2>
            <h3>Project Manager</h3>
          </div>
        </div>
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="http://localhost:8080/wp-content/themes/labs-template/img/team/2.jpg" alt="">
            <h2>Christinne Williams</h2>
            <h3>Junior developer</h3>
          </div>
        </div>
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="http://localhost:8080/wp-content/themes/labs-template/img/team/3.jpg" alt="">
            <h2>Christinne Williams</h2>
            <h3>Digital designer</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team Section end-->
