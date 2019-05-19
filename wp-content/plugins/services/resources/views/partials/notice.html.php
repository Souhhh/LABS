<!-- Notifications pour les MAILS -->
<!-- On vérifie si une notification existe en variable de session. -->
<?php if (isset($_SESSION['notice_mail'])) : ?>

    <?php
    // On récupère les variables de session et on les stock dans des variables plus simples à utiliser.
    $status = $_SESSION['notice_mail']['status'];
    $message = $_SESSION['notice_mail']['message'];
    ?>

    <div class="notice notice-<?= $status; ?> is-dismissible">
        <p><?= $message; ?></p>
    </div>

    <?php
    // On supprime la notification des variables de sessions afin qu'elle ne s'affichent plus au rechargement de la page.
    unset($_SESSION['notice_mail']);
    ?>
    
<?php endif; ?>