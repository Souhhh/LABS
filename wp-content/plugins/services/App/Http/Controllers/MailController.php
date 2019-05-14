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
            'nom' => 'required',
            'email' => 'email',
            'objet' => 'required',
            'message' => 'required'
        ]);

        // Nous récupérons les données envoyées par le formulaire qui se retrouve dans la variable $_POST
        $firstname = sanitize_text_field($_POST['nom']);
        $email = sanitize_email($_POST['email']);
        $lastname = sanitize_text_field($_POST['objet']);
        $content = sanitize_textarea_field($_POST['message']);

        $header = 'Content-Type: text/html; charset=UTF-8';

        // On a remplacé notre pavé par un helper qui le contient et on le stock dans une variable qu'on passe à notre wp_mail.
        $message_template = mail_template('pages/template-mail', compact('nom', 'email', 'objet', 'message'));

        $mail = new Mail();
        $mail->userid = get_current_user_id();
        $mail->nom = $firstname;
        $mail->email = $email;
        $mail->objet = $lastname;
        $mail->message = $content;
        // Sauvegarde du mail dans la base de données
        $mail->save();
        // echo $test;
        // exit;

        // A chaque fois qu'on lance le formulaire d'envoie de mail, on rajoute dans $_SESSION un tableau notice avec 2 clés et leur valeur.
        // Si le mail est bien envoyé, status = 'success' sinon 'error'.
        if (wp_mail($email, 'Pour ' . $firstname, $message_template, $header)) {
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

        if (!wp_verify_nonce($_POST['_wpnonce'], 'send-mail')) {
            return;
        };
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
    /**
     * Affiche une entrée en particulier
     * 
     * @return void
     */
    public static function show()
    {
        // Maintenant qu'on est ici, on a besoin de savoir quel mail est demandé. On va donc dans notre url voir que vaut id= ?? et on le stock dans une variable $id
        $id = $_GET['id'];
        // On fait appel à notre function find et on passe en paramètre l'id pour que notre function sache l'email à aller chercher dans notre base de données.
        $mail = Mail::find($id);
        // On retourne une vue avec le contenu de Mail. Cette vue n'est pas encore crée. A présent, la vue existe et donc on peut y utiliser la variable mail qu'on compact.
        view('pages/show-mail', compact('mail'));
    }
    // Fonction qui est lancée via le hook admin_action_mail-delete ligne 23 du fichier hooks.php
    public static function delete()
    {
        // On récuère l'id envoyé via $_POST notre formulaire ligne 29 dans show-mail.html.php
        $id = $_POST['id'];
        // Si notre function delete($id) est lancée, alors on rempli SESSION avec un status et un message positif puis on redirect sur notre page mail-client
        if (Mail::delete($id)) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Le mail a bien été supprimé'
            ];
            wp_safe_redirect(menu_page_url('mail-client'));
        }
        // Si le mail na pas été supprimé on renvoi sur la page avec une notification négative
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
    // On récupère les données du formulaire d'update avec une vérification du none, et les validations. Ensuite, on va chercher toutes les données passées dans $_POST par notre formulaire, on y applique un sanitize sur chaque donnée. Ensuite, on lance la function update() qui vient de notre model Mail.php
    public static function update()
    {
        // On vérifie la sécurité pour voir si le formualire est bien authentique
        if (!wp_verify_nonce($_POST['_wpnonce'], 'edit-mail')) {
            return;
        };
        // on vérifie les valeurs
        Request::validation([
            'lastname' => 'required',
            'email' => 'email',
            'firstname' => 'required',
            'content' => 'required'
        ]);
        // on récupère le mail original de la base de donnée
        $mail = Mail::find($_POST['id']);
        // On met à jour les nouvelles valeurs
        $mail->userid = get_current_user_id();
        $mail->lastname = sanitize_text_field($_POST['lastname']);
        $mail->firstname = sanitize_text_field($_POST['firstname']);
        $mail->email = sanitize_email($_POST['email']);
        $mail->content = sanitize_textarea_field($_POST['content']);
        // On met à jour dans la base de donnée et on renvoi une notification
        $mail->update();
        if ($mail->update()) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Votre e-mail a bien été modifié'
            ];
        } else {
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => 'Une erreur est survenue, veuillez réessayer plus tard'
            ];
        }
        wp_safe_redirect(wp_get_referer());
    }
}
