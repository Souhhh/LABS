<?php

namespace App;

class Setup
{  

    /**
     * Fonction pour ajouter des scripts et css pour l'admin	               
     */
    public static function enqueue_scripts($page)
    {
        wp_enqueue_style('flaticon', LABS_PLUGIN_URL . "resources/assets/css/flaticon.css");
        wp_enqueue_style('icons', LABS_PLUGIN_URL . "resources/assets/css/icones.css");
        wp_enqueue_script('icones', LABS_PLUGIN_URL . "resources/assets/scripts/icone.js", [], '', true);
        // cette css a été créer à partir des fichiers scss de bootstrap en n'utilisant que la partie grid. Si vous essayez de reproduire cette action, sachez que j'ai du rajouter ceci manuellement *{box-sizing:border-box};	
        wp_enqueue_style('admin-bootstrap-grid', LABS_PLUGIN_URL . "/resources/assets/css/bootstrap-grid.css");
    }


    /**
     * Fonction pour démarrer une session afin de pouvoir utiliser la variable $_SESSION
     * 
     * @return void
     */
    public static function start_session()
    {
        // On vérifie si une session n'existe pas déjà. 
        if (!session_id()) {
            // session_start() génère un ID accessible via session_id
            session_start();
        }
    }

    /**
     * Configuration du phpmailer pour rediriger les mails vers mailTrap
     *
     * @param [type] $phpmailer
     * @return void
     */
    // public static function mailtrap($phpmailer)
    // {
    //     $phpmailer->isSMTP();
    //     $phpmailer->Host = 'smtp.mailtrap.io';
    //     $phpmailer->SMTPAuth = true;
    //     $phpmailer->Port = 2525;
    //     $phpmailer->Username = '9f36aa3a3fa949';
    //     $phpmailer->Password = '23fb6f19d3a28d';
    // }
   
}
