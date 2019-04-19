<?php
// Dès qu'on fait appel à une class comme c'est le cas à la ligne 27 du fichier services.php, la function sql_autoload_register est automatiquement lancée. Elle lance à son tour la function qu'elle a en paramètre 'simplarity_autoloader' et à la même occasion elle remplie le paramètre de la function simplarity_autoloader avec la class qui l'a lancée.
spl_autoload_register('simplarity_autoloader');

// $class_name contient la class ServicesPostType
function simplarity_autoloader($class_name)
{
    // Si le namespace de la class contien App, alors on rentre dans la fonction 
    if (strpos($class_name, 'App') !== false){
        // __FILE__ correspond au fichier dans lequel on est : 'autoload.php'. La fonction plugin_dir_path retourne le chemin jusqu'au dossier contenant __FILE__. On stock ce chemin dans une variable $classes_dir.
        $classes_dir = plugin_dir_path(__FILE__);

        // On modifie la syntaxe de la class name pour passer de "App\Features\PostTypes\ServicesPostType" par "App/Features/PostTypes/ServicesPostType". Voilà ce que fais la combinaison de la fonction strp_replace et de l'argument DIRECTORY_SEPARATOR
        // DIRECTORY_SEPARATOR générera "/" ou "\" selon le système d'exmploitation de la machine.
        $class_file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
        require_once $classes_dir . $class_file;
    }
}