<?php
namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Models\Mail;

class MailController
{
    public static function send()
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
        $mail = mail_template('pages/template-mail', compact('name', 'email', 'subject', 'message'));

        $mail = new Mail();
        $mail->userid = get_current_user_id();
        $mail->name = $name;
        $mail->email = $email;
        $mail->subject = $subject;
        $mail->content = $message;

        $mail->save();

        // A chaque fois qu'on lance le formulaire d'envoie de mail, on rajoute dans $_SESSION un tableau notice avec 2 clés et leur valeur.
        // Si le mail est bien envoyé, status = 'success' sinon 'error'.
        if (wp_mail($email, 'Pour' . $name . ' ', $message, $header)) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Votre e-mail a bien été envoyé'
            ];
            // Nous allons également sauvegarder en base de données les mails que nous avons envoyé.
            // Refactoring pour apprendre et utiliser les models. Seuls les models peuvent interagir avec la base de données.
            // On instancie la class Mail et on rempli les valeurs dans les propriétés.

            // Sauvegarde du mail dans la base de données
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
    /**
     * Affiche la page principal
     */
    // public static function index()
    // {
    //     $mails = array_reverse(Mail::all());
    //     $old = [];
    //     if (isset($_SESSION['old']) && ($_SESSION['notice']['status'] == 'error')) { //correction pour afficher valeur que quand error
    //         $old = $_SESSION['old'];
    //         unset($_SESSION['old']);
    //     }
    //     view('pages/send-mail', compact('old', 'mails'));
    // }
    /**
     * Affiche une entrée en particulier
     */
    // public static function show()
    // {
    //     //Vérification des permissions
    //     //    CheckPermission::check('show_email');
    //     $id = $_GET['id'];
    //     $mail = Mail::find($id);
    //     view('pages/show-mail', compact('mail'));
    // }

    // Fonction qui est lancée via le hook admin_action_mail-delete ligne 23 du fichier hooks.php
    public static function delete()
    {
        // On récupère l'id envoyé via $_POST. notre formulaire ligne 29 dans show-mail.html.php
        $id = $_POST['id'];
        // Si notre function delete($id) est lancée, alors on rempli SESSION avec un status et un message positif puis on redirect sur noter page mail-client
        if (Mail::delete($id)) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Le mail a bien été envoyé'
            ];
            wp_safe_redirect(menu_page_url('mail-client'));
        }
        // Si le mail n'a pas été supprimé, on renvoie sur la page avec une notification négative
        else {
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => 'Un problème est survenu, veuillez rééssayer'
            ];
            wp_safe_redirect(wp_get_referer());
        }
    }
    // Fonction qui permet d'aller dans la base de données récupérer le mail dont l'id a été envoyé en POST via le link dans l'url
    public static function edit()
    {
        $id = $_GET['id'];
        $mail = Mail::find($id);
        view('pages/edit-mail', compact('mail'));
    }
}

