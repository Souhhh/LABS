<div class="wrap">
    <!-- nous utilisons la fonction get_admin_page_title() pour récupérer le titre de la page admin que l'on a défini lors de l'enregistrement -->
    <h1><?= get_admin_page_title(); ?>: </h1>

    <!-- Ici nous ajoutons une partie d'html afin qui prendra en charge les notifications. On met cela dans un fichier à part afin de pouvoir réutiliser les notifications ailleurs -->
    <?php view('partials/notice'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="postbox">
                <div class="inside">
                    <div>
                        <strong>E-mail: </strong> <?= $news->email; ?>
                    </div>
                </div>
            </div>

            <a href="<?php menu_page_url('news-letter'); ?>" class="button button-primary">retour</a>
            <a href="<?php menu_page_url('news-letter'); ?>&action=edit&id=<?= $news->id; ?>" class="button bg-warning text-white">editer</a>
            <form class="form-inline d-inline-block" action="<?php get_site_url(); ?>?action=news-delete" method="post">
                <input type="hidden" name="id" value="<?= $news->id; ?>">
                <button type="submit" class="button bg-danger text-light">supprimer</button>
            </form>
        </div>
    </div>
</div>