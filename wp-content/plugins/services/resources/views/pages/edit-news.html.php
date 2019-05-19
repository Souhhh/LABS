<div class="wrap">
    <!-- nous utilisons la fonction get_admin_page_title() pour récupérer le titre de la page admin que l'on a défini lors de l'enregistrement -->
    <h1><?= get_admin_page_title(); ?>: </h1>

    <!-- Ici nous ajoutons une partie d'html afin qui prendra en charge les notifications. On met cela dans un fichier à part afin de pouvoir réutiliser les notifications ailleurs -->
    <?php view('partials/notice'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="postbox">
                <div class="inside">
                    <form action="<?php get_site_url(); ?>?action=news-update" method="post">
                        <?php wp_nonce_field('edit-news'); ?>
                        <input type="hidden" name="id" value="<?= $news->id; ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $news->email; ?>">
                        </div>

                        <a href="<?php menu_page_url('news-letter'); ?>&action=show&id=<?= $news->id; ?>" class="button button-primary">retour</a>

                        <button type="submit" class="button">enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>