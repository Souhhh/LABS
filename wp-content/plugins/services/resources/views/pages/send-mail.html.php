<div class="wrap">
    <!-- Ici, nous ajoutons une partie d'html qui prendra en charge les notifications. On met cela dans un fichier à part afin de pouvoir réutiliser les notifications ailleurs. -->
    <?php view('partials/notice'); ?>
    <!-- Nous utilisons cette fonction pour récupérer le titre de la page admin que l'on a défni lors de l'enregistrement. -->
    <h1><?= get_admin_page_title(); ?></h1>
    <p>Ce formulaire vous permet de contacter vos clients pour leur réservation.</p>

    
</div>