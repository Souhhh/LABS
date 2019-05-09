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
        view('pages/send-mail');
    }
    public static function send_mail()
    {
        // Nous récupérons les données envoyées par le formulaire qui se retrouve dans la variable $_POST
        $email = sanitize_email($_POST['email']);
        $name = sanitize_text_field($_POST['name']);
        $firstname = sanitize_text_field($_POST['firstname']);
        $message = sanitize_textarea_field($_POST['message']);

        $header = 'Content-Type: text/html; charset=UTF-8';

        // On a remplacé notre pavé par un helper qui le contient et on le stock dans une variable qu'on passe à notre wp_mail.
        $mail = mail_template('pages/template-mail', compact('name', 'firstname', 'message'));

        // La fonction WordPress pour envoyer des mails
        // On rajoute $header en 5ime paramètre 
        wp_mail($email, 'Pour ' . $name . ' ' . $firstname, $mail, $header);
        // La fonction wp_safe_redirect redirige vers une url. La fonction wp_get_referer renvoie vers la page d'où la requête a été envoyée.
        wp_safe_redirect(wp_get_referer());
    }
}