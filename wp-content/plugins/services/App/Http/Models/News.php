<?php
namespace App\Http\Models;

class News
{
    public $id;
    public $email;
    public $created_at;
    
    protected static $table = 'mg_labs_news';
    /**
     * Fonction qui est appelée lors de l'instance d'un objet.
     */
    public function __construct()
    {
        // On rempli déjà la date de création
        $this->created_at = current_time('mysql');
    }
    /** 
     * Fonction qui prend en charge la sauvegarde de l'adresse mail dans la base de données
     * 
     * @return void
     */
    public function save()
    {
        global $wpdb;
        return $wpdb->insert(
            $wpdb->prefix . 'labs_news',
            [
                'id' => $this->id,
                'email' => $this->email,
                'created_at' => $this->created_at,
            ],
            get_object_vars($this)
        );
    }


    public static function all()
    {
        global $wpdb;
        $table = self::$table;
        $query = "SELECT * FROM $table";
        return $wpdb->get_results($query);
    }

    /**
     * Fonction qui va chercher l'entrée de la table qui a l'id correspondant.
     */
    public static function find($id)
    {
        global $wpdb;
        $table = self::$table;
        $query = "SELECT * FROM $table WHERE id = $id";

        // Nous ajoutons ces lignes afin de ne pas renvoyer un simple objet maus bien un objet Mail
        $object = $wpdb->get_row($query);
        $news = new News();
        foreach ($object as $key => $value) {
            $news->$key = $value;
        }
        return $news;
    }

    /**
     * Fonction qui va mettre à jour l'entrée dans la base de données.
     */
    public function update()
    {
        global $wpdb;
        return $wpdb->update(
            self::$table,
            get_object_vars($this),
            ['id' => $this->id]
        );
    }
    
    public static function delete($id)
    {
        global $wpdb;
        return $wpdb->delete(
            self::$table,
            [
                'id' => $id
            ]
        );
    }
}
