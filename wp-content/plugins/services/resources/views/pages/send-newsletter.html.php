<!-- Page qui se charge de l'affichage de la liste des personnes s'étant inscrites à la Newsletter (liste de leurs adresses email). -->

<div class="wrap">
    <h1><?= get_admin_page_title(); ?></h1>

    <?php view('partials/notice'); ?>

    <div class="row">
        <div class="col-sm-6">
            <p>Cette liste reprend les personnes s'étant inscrites à la Newsletter</p>

            <?php foreach ($mails as $mail) : ?>
                <div class="postbox">
                    <div class="inside">
                        <strong>Abonné : </strong>
                        <?= $mail->email; ?> <br>

                        <a href="<?php menu_page_url('newsletter-client'); ?>&action=show&id=<?= $mail->id; ?>" class="button-primary">voir ..</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>