<?php

namespace App\Database\Migrations;

class CreateMailTable
{
    /**
     * Création de la table
     */
    public static function up()
    {
        // nous récupérons l'objet $wpdb qui est global afin de pouvoir intéragir avec la base de donnée
        global $wpdb;
        $table_name = $wpdb->prefix . 'labs_mail';

        // nous utilisons la méthode query qui nous permet d'écrire une requette en SGL pure
        // nous verrons plus tard l'écriture mysql en profondeur
        // vous pouvez avoir une preview sur comme construire cette requête
        $wpdb->query("CREATE TABLE IF NOT EXISTS  $table_name  (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            userid INT NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            created_at TIMESTAMP
          )
          COLLATE utf8mb4_unicode_520_ci
          ;");
    }
}