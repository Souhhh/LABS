<?php
$title1 = get_theme_mod('labs-contact-title1', __('Changer le titre'));
$text = get_theme_mod('labs-contact-text', __(''));
$title2 = get_theme_mod('labs-contact-title2', __(''));
$coordonnees = get_theme_mod('labs-contact-coord', __(''));
?>

<!-- Contact section -->
<div class="contact-section spad fix">
    <div class="container">
      <div class="row">
        <!-- contact info -->
        <div class="col-md-5 col-md-offset-1 contact-info col-push">
          <div class="section-title left">
            <h2><?php echo $title1; ?></h2>
          </div>
          <p><?php echo $text; ?> </p>
          <h3 class="mt60"><?php echo $title2; ?></h3>
          <p class="con-item"><?php echo aLaLigne('labs-contact-coord'); ?></p>
          <!-- <p class="con-item">C/ Libertad, 34 <br> 05200 Arévalo </p>
          <p class="con-item">0034 37483 2445 322</p>
          <p class="con-item">hello@company.com</p> -->
        </div>
        <!-- contact form -->
        <div class="col-md-6 col-pull">
          <form action="<?= get_admin_url() . '/?action=send-mail'; ?>" method="post" class="form-class" id="con_form">
          <!-- Cette fonction crée des inputs cachés qui contiennent des informations qui vont nous permettre de savoir si le formulaire est authentique et s'il est bien exécuté via notre site web et pas via une autre source. -->
          <?php wp_nonce_field('send-mail'); ?>
            <div class="row">
              <div class="col-sm-6">
                <input type="text" name="name" id="name" placeholder="Votre nom">
              </div>
              <div class="col-sm-6">
                <input type="text" name="email" id="email" placeholder="Votre email">
              </div>
              <div class="col-sm-12">
                <input type="text" name="subject" id="subject" placeholder="Sujet">
                <textarea name="message" id="message" placeholder="Message"></textarea>
                <button class="site-btn">Envoyer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact section end-->