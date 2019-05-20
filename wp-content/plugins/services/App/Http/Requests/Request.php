<?php
namespace App\Http\Requests;

class Request{
    // Petite correction : notre variable est renommée de error à errors.
    private static $errors = array();

    // On crée une function du nom de validation qui attend un paramètre de type array. Ce paramètre va être rempli via le fichier SendMail.php, ligne 44.
    public static function validation(array $data){
        // Pour chaque antrée, on lance une des méthodes ci-dessous selon la valeur du tableau $data.
        // Data est un tableau de clé => valeur dont la clé est le 'name' de l'input et la valeur est la méthode de vérification que l'on veut appliquer sur le contenu de l'input. C'est nous qui avons fait en sorte que les valeurs du tableau $data correspondent aux names de nos inputs dans notre formulaire.
        foreach ($data as $input_name => $verification) {
            // On lance la function de la class, 'email' ou 'required' selon ce que vaut $verification et on rempli le paramètre de la function avec $input_name.
            call_user_func([self::class, $verification], $input_name);
            // En même temps qu'on fait les vérifications pour savoir si les champs sont bien remplis, on en profite pour stocker ce qu'à écris le client dans notre super globale $_SESSION sous la clé 'old'.
        }

        // On vérifie qerrorsue $errors contient quelque chose. Si c'est quelque chose. Si c'est le cas, alors on récupère tous les messages d'erreurs qu'on y a stoché. On fait un foreach dessus pour réécrire chaque ligne qu'on stock dans une variable $message.
        if (count(self::$errors) != 0) {
            $message = "";
            foreach (self::$errors as $key => $value) {
                $message .= $value . '<br>';
            }
            // On rempli notre $_SESSION avec toutes nos erreurs réécrites pour que l'affichage soit mieux présenté.
            $_SESSION['notice_mail'] = [
                'status' => 'error',
                'message' => $message
            ];
            // On crée $_SESSION['old'] que s'il y a des erreurs.
            foreach ($data as $input_name => $validation) {
                $_SESSION['old'][$input_name] = $_POST[$input_name];
            }
            // On retourne sur notre page
            wp_safe_redirect(wp_get_referer());
            // Permet d'arrêter le script tant qu'il y a des erreurs à partir de la ligne 44 de notre fichier SendMail.php
            exit;
        }
    }

    public static function validation2 (array $data)
    {
        foreach ($data as $input_name => $verification) {
            call_user_func([self::class, $verification], $input_name);

            $_SESSION['old'][$input_name] = $_POST[$input_name];
        }
        if (count(slef::$errors) !=0) {
            $message = "";
            foreach (self::$errors as $key => $value) {
                $message .= $value . '<br>';
            }
            $_SESSION['notice'] = [
                'status' => 'error',
                'message' => $message
            ];
            wp_safe_redirect(wp_get_referer());
        }
    }
    // La méthode 'validation' a redistribué via son foreach dans l'une ou l'autre méthode (required, email) selon ce que vaut '$verification' tout en remplissant notre paramètre $input_name ci-dessous par la valeur $input_name rempli ligne 16 ci-dessus.
    public static function required(string $input_name) {
        if ($_POST[$input_name] == "") {
            // On rempli notre tableau $error avec nos erreurs qu'on écrit ci-dessous
            self::$errors[$input_name] = sprintf(__("Le champ '%s' est obligatoire"), $input_name);
        }
    }

    public static function email(string $input_name) {
        if (!is_email($_POST[$input_name])) {
            self::$errors[$input_name] = __("Le champ email doit être un format email");
        }
    }
}