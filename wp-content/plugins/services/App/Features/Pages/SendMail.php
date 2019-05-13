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
        /**
         * On fait un refactoring afin que la method render renvoie vers la bonne méthode en fonction de l'action
         */
        // On défini une valeur par défaut pour $action qui est l'index et qui correspondra à la éthode à utiliser (celle qui renvoie la vue avec tous les mails et le formulaire)
        $action = isset($_GET["action"]) ? $_GET["action"] : "index";
        call_user_func([MailController::class, $action]);
    }
    // public static function index()
    // {
    //     // On fait appel à la function all venant de la class Mail et on compact son contenu dans notre view
    //     // On va chercher toutes les entrées de la table dont le model mail s'occupe et on inverse l'ordre afin d'avoir le plus récent en premier.
    //     $mails = array_reverse(Mail::all());
    //     // Si $_SESSION['old] existe, alors on déclare une variable $old dans laquelle son contenu puis on détruit notre globale $_SESSION['old'].
    //     if (isset($_SESSION['old'])) {
    //         $old = $_SESSION['old'];
    //         unset($_SESSION['old']);
    //     }
    //     // On envoi notre variable $old qui contient les anciennes valeurs dans notre view send)mail pour qu'on puisse afficher son contenu dans les champs.
    //     view('pages/send-mail', compact('old', 'mails'));
    // }
    // /**
    //  * Affiche une entrée en particulier
    //  * 
    //  * @return void
    //  */
    // // On entre ici car on clique sur le lien 'voir' donc dans notre url, on a 'action=show' qui s'est rajouté et notre call_user_func a donc fait appel à show() ici même
    // public static function show()
    // {
    //     // Maintenant qu'on est ici, on a besoin de savoir quel mail est demandé. On va donc dans notre url voir que vaut id= ?? et on le stock dans une variable $id
    //     $id = $_GET['id'];
    //     // On fait appel à notre function find et on passe en paramètre l'id pour que notre function sache l'email à aller chercher dans notre base de données.
    //     $mail = Mail::find($id);
    //     // On retourne une vue avec le contenu de Mail. Cette vue n'est pas encore crée. Nous allons la créer au prochain commit. 
    //     view('pages/show-mail', compact('mail'));
    // }
}
