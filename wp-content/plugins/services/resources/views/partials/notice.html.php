<!-- On vérifie si une notification existe en variable de session. -->
<?php if (isset($_SESSION['notice'])) : ?>
    <?php
    // On récupère les variables de session et on les stocke dans des variables plus simples à utiliser.
    $status = $_SESSION['notice']['status'];
    $message = $_SESSION['notice']['message'];
    ?>

    <div class="alert alert-<?= $status; ?> is-dismissible">
        <p><?= $message; ?></p>
    </div>
    <?php
    // On supprime la notification des variables de sessions afin qu'elle ne s'affichent plus au rechargement de la page.
    unset($_SESSION['notice']);
    ?>
<?php endif; ?>