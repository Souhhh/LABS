<?php
namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Models\Mail;

class MailController
{
    public static function send()
    {
        // On vérifie la sécurité pour voir si le formulaire est bien authentique, que le formulaire est bien celui de notre page.
        // if (!wp_verify_nonce($_POST['_wpnonce'], 'send-mail')) {
        //     return;
        // };

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
        $message_template = mail_template('pages/template-mail', compact('name', 'email', 'subject', 'message'));

        $mail = new Mail();
        $mail->userid = get_current_user_id();
        $mail->id = 1;
        $mail->name = $name;
        $mail->email = $email;
        // $mail->subject = $subject;
        $mail->content = $message;            
        
        $test = $mail->save();
        // echo $test;
        // exit;

        // A chaque fois qu'on lance le formulaire d'envoie de mail, on rajoute dans $_SESSION un tableau notice avec 2 clés et leur valeur.
        // Si le mail est bien envoyé, status = 'success' sinon 'error'.
        if (wp_mail($email, 'Pour' . $name, $message_template, $header)) {
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

    public static function index()
    {
        // On fait appel à la function all venant de la class Mail et on compact son contenu dans notre view
        // On va chercher toutes les entrées de la table dont le model mail s'occupe et on inverse l'ordre afin d'avoir le plus récent en premier.
        $mails = array_reverse(Mail::all());
        // Si $_SESSION['old] existe, alors on déclare une variable $old dans laquelle son contenu puis on détruit notre globale $_SESSION['old'].
        if (isset($_SESSION['old'])) {
            $old = $_SESSION['old'];
            unset($_SESSION['old']);
        }
        // echo count($mails);
        // exit;
        // On envoi notre variable $old qui contient les anciennes valeurs dans notre view send)mail pour qu'on puisse afficher son contenu dans les champs.
        view('pages/send-mail', compact('old', 'mails'));
    }
}
