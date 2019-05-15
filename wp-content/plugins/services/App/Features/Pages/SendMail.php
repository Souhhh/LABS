<?php
namespace App\Features\Pages;

use App\Http\Models\Mail;
use App\Http\Controllers\MailController;

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
            __('Mails envoyés via votre site'), // Le titre qui s'affichera sur la page
            __('Mail Client'), // Le texte dans le menu
            'edit_private_pages', // La capacité qu'il faut posséder en tant qu'utilisateur pour avoir accès à cette page (les rôles et capacités seront vus plus tard)
            'mail-client', // Le slug du menu
            [self::class, 'render'], // La méthode qui va afficher la page
            'dashicons-email-alt',
            26 // La position dans le menu 
        );
    }
    /**
     * Affichage de la page
     * 
     * @return void
     */
    public static function render()
    {
        /**
         * On fait un refactoring afin que la method render renvoie vers la bonne méthode en fonction de l'action
         */
        // On fait appel à la function all venant de la class Mail et on compact son contenu dans notre view
        
        $mails = Mail::all(); 
        // Le OLD ici ne sert à rien, il ne fonctionne pas !!!
        // Si $_SESSION['old] existe, alors on déclare une variable $old dans laquelle son contenu puis on détruit notre globale $_SESSION['old'].
        // if (isset($_SESSION['old'])) {
        //     $old = $_SESSION['old'];
        //     unset($_SESSION['old']);
        // }
        // view('pages/send-mail', compact('old', 'mails'));
        // On défini une valeur par défaut pour $action qui est l'index et qui correspondra à la méthode à utiliser (celle qui renvoie la vue avec tous les mails et le formulaire)
        $action = isset($_GET["action"]) ? $_GET["action"] : "index";
        call_user_func([MailController::class, $action]);
    }

    /**
     * Affiche une entrée en particulier
     * 
     * @return void
     */
    // On entre ici car on clique sur le lien 'voir' donc dans notre url, on a 'action=show' qui s'est rajouté et notre call_user_func a donc fait appel à show() ici même
}
