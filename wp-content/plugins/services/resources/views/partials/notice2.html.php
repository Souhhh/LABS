<!-- Notifications pour la NEWSLETTER -->
<!-- On vérifie si une notification existe en variable de session. -->

<?php if (isset($_SESSION['notice'])) : ?>

    <?php
    $status = $_SESSION['notice']['status'];
    $message = $_SESSION['notice']['message'];
    ?>

    <div class="notice notice-<?= $status; ?> is-dismissible">
        <p><?= $message; ?></p>
    </div>

<?php

// On supprime la notification des variables de sessions afin qu'elle ne s'affiche plus au rechargement de la page.
unset($_SESSION['notice']);
?>

<?php endif; ?>