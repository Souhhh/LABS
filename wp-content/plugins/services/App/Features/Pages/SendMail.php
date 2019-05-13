<?php
namespace App\Features\Pages;

class SendMail
{
    /**
     * Initialisation de la page.
     * 
     * @return void
     */
    public static function init()
    {
        add_menu_page(
            __('Formulaire pour contacter les clients'),
            __('Mail Client'),
            'edit_private_pages',
            'mail-client',
            [self::class, 'render'],
            'dashicons-email-alt',
            26
        );
    }
    /**
     * Affichage de la page
     * 
     * @return void
     */
    public static function render()
    {
        // Si $_SESSION['old] existe, alors on déclare une variable $old dans laquelle son contenu puis on détruit notre globale $_SESSION['old'].
        if (isset($_SESSION['old'])) {
            $old = $_SESSION['old'];
            unset($_SESSION['old']);
        }
        // On envoir notre variable $old qui contient les anciennes valeurs dans notre view send)mail pour qu'on puisse afficher son contenu dans les champs.
        view('pages/send-mail', compact('old'));
    }
}