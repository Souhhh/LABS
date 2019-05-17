<?php
namespace App\Http\Models;

class Mail
{
    // Les propriétés de l'objet model. Les propriétés de l'objet qui sont représentatives de la structure de la table dans la base de données.
    public $id;
    public $userid;
    public $name;
    public $email;
    public $subject;
    public $content;
    public $created_at;
    protected static $table = 'mg_labs_mail';
    /**
     * Fonction qui est appelée lors de l'instance d'un objet.
     */
    public function __construct()
    {
        // On rempli déjà la date de création
        $this->created_at = current_time('mysql');
    }
    /**
     * Fonction qui prend en charge la sauvegarde du mail dans la base de données
     * 
     * @return void
     */
    public function save()
    {
        global $wpdb;
        // Nous utilisons à nouveau la méthode insert de l'objet $wpdb;
        return $wpdb->insert(
            $wpdb->prefix . 'labs_mail',
            [ // La première colonne doit reprendre exactement les mêmes noms que ceux qu'on a mis dans notre table lors de sa création.
            // La deuxième colonne doit reprendre les propriétés (les noms) de la class du dessus (donc ici la class Mail) car il y a le 'this'.
                'id' => $this->id,
                'userid' => $this->userid,
                'name' => $this->name,
                'subject' => $this->subject,
                'email' => $this->email,
                'content' => $this->content,
                'created_at' => $this->created_at
            ],
            get_object_vars($this)
        );
    }
    // On crée une function qui récupère tous les mails qui ont été enregistrés dans la base de données. On crée plus haut ligne 16 de ce fichier une variable dans laquelle on stock le nom de la table qui contient les mails. Ce nom de table, on l'avait défini quelques commit plus haut ligne 35 de ce fichier.
    // Cette fonction permet de récupérer tout ce qui se trouve dans notre table.
    public static function all()
    {
        global $wpdb;
        $table = self::$table;
        $query = "SELECT * FROM $table";
        return $wpdb->get_results($query);
    }
    // On crée une seconde function 'find()' pour faire une requête différente de 'all()'. 'find' ira récupérer dans la base de données que les mails dont l'id vaut ce qui est passé dans l'url.

    /**
     * Fonction qui va récupérer l'élément selon son id.
     */
    public static function find($id)
    {
        global $wpdb;
        $table = self::$table;
        $query = "SELECT * FROM $table WHERE id = $id";

        // Nous ajoutons ces lignes afin de ne pas renvoyer un simple objet mais bien un objet Mail.
        $object = $wpdb->get_row($query);
        $mail = new Mail();
        foreach ($object as $key => $value) {
            $mail->$key = $value;
        }
        return $mail;
    }

    // Fonction qui permet de mettre à jour les données quand on clique sur 'edit'.
    public function update()
    {
        global $wpdb;
        return $wpdb->update(
            self::$table,
            get_object_vars($this),
            ['id' => $this->id]
        );
    }

    
    // Fonction qui va nous permettre de supprimer un mail dans la base de données. Cette function attend un paramètre '$id' que l'on va remplir par la suite quand on va appeler cette function.
    public static function delete($id)
    {
        global $wpdb;
        // delete est une method de notre class wpdb
        return $wpdb->delete(
            self::$table,
            [
                'id' => $id
            ]
        );
    }
}
