<!-- Page qui se charge de l'affichage de la liste des emails envoyés depuis le site (le récupitulatif des emails). -->

<div class="wrap">
    <!-- Nous utilisons cette fonction pour récupérer le titre de la page admin que l'on a défni lors de l'enregistrement. -->
    <h1><?= get_admin_page_title(); ?></h1>
    <!-- Ici, nous ajoutons une partie d'html qui prendra en charge les notifications. On met cela dans un fichier à part afin de pouvoir réutiliser les notifications ailleurs. -->



    <div class="row">
        <div class="col-sm-6">
            <!-- Sous-titre de la page reprenant la liste des mails envoyés par les clients -->
            <p>Cette liste reprend tous les mails envoyés via votre site.</p>
            
            <!-- On recoit la variable mails (celle qu'on a compact dans le commit précédent). C'est une variable qui contient un tableau contenant chaque mail enregistré dans la base de données. On va donc faire un foreach afin d'avoir un rendu correct. -->
            <?php foreach ($mails as $mail) : ?>
                <div class="postbox">
                    <div class="inside">
                        <strong>Client : </strong> 
                        <?= $mail->email; ?> <br>
                        <!-- On rajoute ici un lien 'voir'. Ce lien a une action qui est show%id=l'id du mail. Si vous cliquez dessus, vous pouvez voir que dans notre barre url, il y a &action=show%id=x qui se rajoute et si vous cliquez sur un autre, l'id sera différent. Si on arrive à avoir l'id du mail, c'est via la variable $mail qui est une ligne de la variable $mails après un foreach. Dans chaque variable $mail, il y a bcp de données propres à chaque mail comme son ID, son message, son email, son nom etc.. -->
                        <a href="<?php menu_page_url('mail-client'); ?>&action=show&id=<?= $mail->id; ?>" class="button-primary">Voir ..</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>