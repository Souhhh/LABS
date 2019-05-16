<?php
namespace App\Database;
use App\Database\Migrations\CreateMailTable;
use App\Database\Migrations\CreateNewsletterTable;

class Database
{
    /**
     * Initiatlisation de la base de données. Cette méthode est déclenchée lorsque l'on active le plugin.
     * 
     * @return void
     */
    public static function init()
    {
        // Création des tables dans la base de données.
        self::migration();
    }
    /**
     * Méthode qui lance les migrations afin que chacune crée sa table dans la base de données.
     * 
     * @return void
     */
    public static function migration()
    {
        CreateMailTable::up();
        CreateNewsletterTable::up();
    }
}