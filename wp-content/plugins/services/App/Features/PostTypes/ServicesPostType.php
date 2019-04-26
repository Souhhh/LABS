<?php

/**
 * Plugin Name: Services
 * Author: Plugin Author
 * Text Domain: recipe
 * Domain Path: /languages
 */

namespace App\Features\PostTypes;

// On a coupé collé notre function du fichier Services.php pour l'englober avec une class

class ServicesPostType
{
    // On crée une variable qu'on appelle 'slug'. On la rend public et static pour pouvoir s'en servir dans les fonctions de la class ServicesPostType et en dehors.
    public static $slug = 'services';
    public static function register()
    {
        // register_post_type permet de rajouter un post-type dans notre menu. De base, il existe des post type tels que 'PAGE' ou 'POST' (article) et bien d'autres. Notre but va être de créer un nouveau post type qui sera 'Services'.
        register_post_type(
            self::$slug,
            [
                // labels contient un tableau avec plein de paramètres par défaut en anglais comme : Add Post, Edit Post etc,. On fait référence aux clés et on y introduit une nouvelle valeur en francais pour que notre backOffice on ait les messages en francais. Vou pouvez aller vérifier en allant sur un de nos services et en allant sur la page de modification de notre service, vous pourrez constater que le titre sera : Modifier le service.
                'labels' => [
                    'name' => __('Services'),
                    'singular_name' => 'Services',             
                    'add_new' => __('Ajouter'),
                    'add_new_item' => __('Ajouter un service'),
                    'edit_item' => __('Modifier le service'),
                    'new_item' => __('Nouveau service'),
                    'view_item' => __('Voir le service'),
                    'view_items' => __('Voir les services'),
                    'search_items' => __('Rechercher des ervices'),
                    'not_found' => __('Pas de services trouvés.'),
                    'not_found_in_trash' => ('Pas de services dans la corbeille.'),
                    'all_items' => __('Tous les services'),
                    'archives' => __('Services archivés'),
                    'filter_items_list' => __('Filtre de services'),
                    'items_list_navigation' => __('Navigation de services'),
                    'items_list' => __('Liste services'),
                    'item_published' => __('Service publié.'),
                    'item_published_privately' => __('Service publié en privé.'),
                    'item_reverted_to_draft' => __('Le Service est retourné au brouillon.'),
                    'item_scheduled' => __('Service planifié.'),
                    'item_updated' => __('Service mis à jours.'),
                ],
                'public' => true,
                // has_archive nous permet de nous render sur http://localhost:8080/index.php/services/ et d'y trouver tous nos services. Si cela ne fonctionne pas, c'est possible qu'il nous faille réécrire nos permaliens. Pour ce faire, aller dans notre backoffice -> Settings -> Permaliens et cliquer sur Enregistrer les modifications. Après avoir fait ça, tester en passant de true à false et actualiser puis observer.
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'services'
                ],
                'menu_icon' => 'dashicons-nametag',
                // On choisi dans supports ce qu'on veut rendre accessible dans notre post-type : un titre, un textarea, un extrait et la possibilité de rajouter une image mise en avant.
                'supports' => ['title', 'editor', 'thumbnail'],
            ]
        );
    }
}
