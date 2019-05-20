<?php
$title1 = get_theme_mod('labs-contact-title1', __('Changer le titre'));
$text = get_theme_mod('labs-contact-text', __(''));
$title2 = get_theme_mod('labs-contact-title2', __(''));
$coordonnees = get_theme_mod('labs-contact-coord', __(''));
?>

<!-- Contact section -->
<div class="contact-section spad fix" id="mails">
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
        <?php view('partials/notice'); ?>
        <!-- admin-post.php -->

        <form action="<?= admin_url('admin-post.php'); ?>#mails" method="post" class="form-class" id="con_form">
          <input type="hidden" name="action" value="send-mail">
          <input type="hidden" name="action" value="send-mail">
          <!-- Cette fonction crée des inputs cachés qui contiennent des informations qui vont nous permettre de savoir si le formulaire est authentique et s'il est bien exécuté via notre site web et pas via une autre source. -->
          <?php wp_nonce_field('send-mail'); ?>
          <div class="row">
            <?php if (isset($_SESSION['old'])) {
              $old = $_SESSION['old'];
              unset($_SESSION['old']);
            } ?>
            <div class="col-sm-6">
              <!-- Lorsqu'on affiche le formulaire sans être passé par les validations, aucune clé old n'a été enregistrée dans la session. Ceci crée une erreur si l'on demande de l'afficher. C'est pour cela que l'on met une condition. On demande de l'afficher que si elle existe. -->
              <!-- C'est surtout le name qui doit être exactement le même que de l'autre côté (avec le $_POST). -->
              <input type="text" name="name" id="name" placeholder="Votre nom" value="<?= isset($old['name']) ? $old['name'] : '' ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="email" id="email" placeholder="Votre email" value="<?= isset($old['email']) ? $old['email'] : '' ?>">
            </div>
            <div class="col-sm-12">
              <input type="text" name="subject" id="subject" placeholder="Objet" value="<?= isset($old['subject']) ? $old['subject'] : '' ?>">
              <textarea name="content" id="content" placeholder="Message" cols="30" rows="10"><?= isset($old['content']) ? $old['content'] : '' ?></textarea>
              <button type="submit" class="site-btn">Envoyer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Contact section end-->