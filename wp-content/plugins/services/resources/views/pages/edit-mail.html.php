<div class="wrap">
    <!-- Nous utilisons la fonction get_admin_page_title() pour récupérer le titre de la page admin que l'on a défini lors de l'enregistrement. -->
    <h1><?= get_admin_page_title(); ?>: </h1>

    <!-- Ici, nous ajoutons une partie d'html qui prendra en charge les notifications. On met cela dans un fichier afin de pouvoir réutiliser les notifications ailleurs. -->
 
    <div class="row">
        <div class="col-sm-6">
            <div class="postbox">
                <div class="inside">
                    <form action="<?php get_site_url(); ?>?action=mail-update" method="post">
                    <!-- // On rajoute un nonce qui nous servira à vérifier que le formulaire est authentique. -->
                    <?php wp_nonce_field('edit-mail'); ?>
                    <!-- On rajoute un input contenant l'id du mail qu'on récupérera dans $_POST pur savoir quel mail mettre à jour dans la base de données. -->
                    <input type="hidden" name="id" value="<?= $mail->id; ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $mail->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $mail->name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="subject">Objet</label>
                            <input type="text" class="form-control" id="subject" name="subject" value="<?= $mail->subject; ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Message</label>
                            <textarea class="form-control" name="content" id="content" rows="3"><?= $mail->content; ?></textarea>
                        </div>
                        <a href="<?php menu_page_url('mail-client'); ?>&action=show&id=<?= $mail->id; ?>" class="button button-primary">retour</a>
                        <button type="submit" class="button">enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>