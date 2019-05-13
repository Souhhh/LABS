<?php
namespace App;
class Setup
{
    /**
     * Fonction pour démarrer une session afin de pouvoir utiliser la variable $_SESSION
     * 
     * @return void
     */
    public static function start_session()
    {
        // On vérifie si une session n'existe pas déjà. 
        if (!session_id()){
            // session_start() génère un ID accessible via session_id
            session_start();
        }
    }
    /* Fonction pour ajouter des sripts et css pour l'admin */
    public static function enqueue_scripts($page)
    {
        // Cette css a été crée à partir des fichiers scss de bootstrap en utilisant que la partie grid. Si vous essayez de reproduire cette action, sachez que j'ai du rajouter ceci manuellement *{box-sizing:border-box};
        wp_enqueue_style('admin-bootstrap-grid', LABS_PLUGIN_URL . "/resources/assets/css/bootstrap-grid.css");
    }
}