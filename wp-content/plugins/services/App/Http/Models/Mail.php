<?php
namespace App\Http\Models;
class Mail
{
    // Les propriétés de l'objet model. Les propriétés de l'objet qui sont représentatives de la structure de la table dans la base de données.
    public $id;
    public $userid;
    public $name;
    public $email;
    public $content;
    public $subject;
    public $created_at;
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
            [
                'id' => $this->id,
                'userid' => $this->userid,
                'name' => $this->name,
                'email' => $this->email,
                'content' => $this->content,
                'subject' => $this->subject,
                'created_at' => $this->created_at
            ]
            );
    }
}