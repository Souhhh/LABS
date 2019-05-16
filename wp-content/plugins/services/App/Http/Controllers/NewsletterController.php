<?php
namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Models\Newsletter;

class NewsletterController
{
    public static function send()
    {
        // On vérifie la sécurité pour voir si le formulaire est bien authentique, qu'il est bien celui de notre page.
        if (!wp_verify_nonce($_POST['_wpnonce'], 'send-newsletter')) {
            return;
        };
        Request::validation([
            'email' => 'email',
        ]);

        // Nous récupérons les données envoyées par le formulaire qui se trouve dans la variable $_POST
        $newsletter = sanitize_email($_POST['email']);

        $newsletter_template = mail_template('pages/template-newsletter', compact('newsletter'));

        $news = new Newsletter();
        $news->userid = get_current_user_id();
        $news->email = $newsletter;
        // Sauvegarde de l'adresse mail dans la base de données
        $news->save();

        // A chaque fois qu'on envoie un mail via l'inout, on rajoute dans $_SESSION un tableau notice avec 2 clés et leur valeur.
        // Si l'adresse mail est bien envoyéé, status = 'success', sinon 'error'.
        if (wp_mail("admin.admin@gmail.com", $newsletter, $newsletter_template)) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Votre inscription a bien été validée'
            ];
        } else {
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => 'Une erreur est survenue, veuillez rééssayer plus tard'
            ];
        }
        // La fonction wp_safe_redirect redirige vers une url. La fonction wp_get_referer renvoie vers la page d'où la requête a été envoyée.
        wp_safe_redirect(wp_get_referer());
    }

    public static function index()
    {
        $news = array_reverse(Newsletter::all());

        $old = [];
        if (isset($_SESSION['old']) && ($_SESSION['notice']['status'] == 'error')) {
            $old = $_SESSION['old'];
            unset($_SESSION['old']);
        }
        view('pages/send-newsletter', compact('old', 'mails'));
    }

    /**
     * Affiche une entrée en particulier
     * 
     * @return void
     */
    public static function show()
    {
        $id = $_GET['id'];
        $news = Newsletter::find($id);

        view('pages/show-newsletter', compact('news'));
    }

    public static function edit()
    {
        $id = $_GET['id'];
        $news = Newsletter::find($id);

        view('pages/edit-newsletter', compact('news'));
    }

    public static function update()
    { 
        // On vérifie la sécurité pour voir si le formulaire est bien authentique.
        if (!wp_verify_nonce($_POST['_wpnonce'], 'edit-newsletter')) {
            return;
        };
        // On vérifie les valeurs
        Request::validation([
            'email' => 'email'
        ]);
        $news = Newsletter::find($_POST['id']);

        // On met à jour les nouvelles valeurs
        // $news->userid = get_current_user_id();
        $news->email = sanitize_email($_POST['email']);

        if ($news->update()) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Votre mail a bien été modifié'
            ];
        } else {
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => 'Une erreur est survenue, veuillez rééssayer plus tard'
            ];
        }
        wp_safe_redirect(wp_get_referer());
    }

    public static function delete()
    {
        $id = $_POST['id'];

        if (Newsletter::delete($id)) {
            $_SESSION['notice'] = [
                'status' => 'success',
                'message' => 'Le mail a bien été supprimé'
            ];
            wp_safe_redirect(menu_page_url('newsletter-client'));
        } else {
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => 'Un problème est survenu, veuillez rééssayer'
            ];
            wp_safe_redirect(wp_get_referer());
        }
    }
}
