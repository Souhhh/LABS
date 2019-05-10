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
}