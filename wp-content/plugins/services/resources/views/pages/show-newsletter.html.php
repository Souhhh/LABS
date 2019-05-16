<!-- Page qui se charge de l'affichage du récapitulatif du mail quand on clique sur le bouton 'voir'. -->

<div class="wrap">

    <h1><?= get_admin_page_title(); ?></h1>

    <?php view('partials/notice'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="postbox">
                <div class="inside">
                    <div>
                        <strong>E-mail : </strong> <?= $news->email; ?>
                    </div>
                </div>
            </div>
            <a href="<?php menu_page_url('newsletter-client'); ?>" class="button button-primary">retour</a>

            <form class="form-inline d-inline-block" action="<?php get_site_url(); ?>? action=newsletter-delete" method="post">
                <input type="hidden" name="id" value="<?= $news->id; ?>">
                <button type="submit" class="button bg-danger">supprimer</button>
            </form>
        </div>
    </div>
</div>