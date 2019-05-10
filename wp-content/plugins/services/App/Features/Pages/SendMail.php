<?php
namespace App\Features\Pages;
// On use la class Request pour pouvoir nous en servir plus bas, ligne 44.
use App\Http\Requests\Request;


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
        view('pages/send-mail');
    }
    public static function send_mail()
    {
        // On vérifie la sécurité pour voir si le formulaire est bien authentique, que le formulaire est bien celui de notre page.
        if (!wp_verify_nonce($_POST['_wpnonce'], 'send-mail')) {
            return;
        };

        // Maintenant, à chaque fois qu'il y a une tentative réussie ou ratée d'envoie de mail, on lance la méthode 'validation' de la class Request et on rempli son paramètre avec un tableau de clé et de valeur. On fait en sorte que le nom des clés correspondent aux names des inputs du formulaire.
        Request::validation([
            'name' => 'required',
            'email' => 'email',
            'subject' => 'required',
            'message' => 'required'
        ]);


        // Nous récupérons les données envoyées par le formulaire qui se retrouve dans la variable $_POST
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);        
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        $header = 'Content-Type: text/html; charset=UTF-8';

        // On a remplacé notre pavé par un helper qui le contient et on le stock dans une variable qu'on passe à notre wp_mail.
        $mail = mail_template('pages/template-mail', compact('name', 'email', 'subject'));

        // A chaque fois qu'on lance le formulaire d'envoie de mail, on rajoute dans $_SESSION un tableau notice avec 2 clés et leur valeur.
        // Si le mail est bien envoyé, status = 'success' sinon 'error'.
        if(wp_mail($email, 'Pour' . $name, $mail, $header)) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Votre e-mail a bien été envoyé'
            ];
        } else {
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => 'Une erreur est survenue, veuillez réessayer plus tard'
            ];
        }

        // La fonction WordPress pour envoyer des mails
        // On rajoute $header en 5ime paramètre 
        // On change $message par $mail. Cela veut dire qu'on envoie plus message dans le contenu du mail mais ce qui est retourné par $mail c'est-à-dire le contenu de notre page template-mail.html.php 
     

        // La fonction wp_safe_redirect redirige vers une url. La fonction wp_get_referer renvoie vers la page d'où la requête a été envoyée.
        wp_safe_redirect(wp_get_referer());
    }
}