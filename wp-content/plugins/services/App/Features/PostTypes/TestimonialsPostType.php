<?php

namespace App\Features\PostTypes;

// On a coupé collé notre function du fichier témoignages.php pour l'englober avec une class

class TestimonialsPostType
{
    // On crée une variable qu'on appelle 'slug'. On la rend public et static pour pouvoir s'en servir dans les fonctions de la class témoignagessPostType et en dehors.
    public static $slug = 'testimonials';
    public static function register()
    {
        // register_post_type permet de rajouter un post-type dans notre menu. De base, il existe des post type tels que 'PAGE' ou 'POST' (article) et bien d'autres. Notre but va être de créer un nouveau post type qui sera 'témoignages'.
        register_post_type(
            self::$slug,
            [
                // labels contient un tableau avec plein de paramètres par défaut en anglais comme : Add Post, Edit Post etc,. On fait référence aux clés et on y introduit une nouvelle valeur en francais pour que notre backOffice on ait les messages en francais. Vou pouvez aller vérifier en allant sur un de nos témoignages et en allant sur la page de modification de notre témoignage, vous pourrez constater que le titre sera : Modifier le témoignage.
                'labels' => [
                    'name' => __('Témoignages'),
                    'singular_name' => 'Témoignages',             
                    'add_new' => __('Ajouter'),
                    'add_new_item' => __('Ajouter un nouveau témoignage'),
                    'edit_item' => __('Modifier le témoignage'),
                    'new_item' => __('Nouveau témoignage'),
                    'view_item' => __('Voir le témoignage'),
                    'view_items' => __('Voir les témoignages'),
                    'search_items' => __('Rechercher des témoignages'),
                    'not_found' => __('Pas de témoignage trouvé.'),
                    'not_found_in_trash' => ('Pas de témoignage dans la corbeille.'),
                    'all_items' => __('Tous les témoignages'),
                    'archives' => __('Témoignages archivés'),
                    'filter_items_list' => __('Filtre de témoignage'),
                    'items_list_navigation' => __('Navigation de témoignage'),
                    'items_list' => __('Liste témoignage'),
                    'item_published' => __('témoignage publié.'),
                    'item_published_privately' => __('témoignage publié en privé.'),
                    'item_reverted_to_draft' => __('Le témoignage est retourné au brouillon.'),
                    'item_scheduled' => __('témoignage planifié.'),
                    'item_updated' => __('témoignage mis à jours.'),
                ],
                'public' => true,
                // has_archive nous permet de nous render sur http://localhost:8080/index.php/témoignages/ et d'y trouver tous nos témoignages. Si cela ne fonctionne pas, c'est possible qu'il nous faille réécrire nos permaliens. Pour ce faire, aller dans notre backoffice -> Settings -> Permaliens et cliquer sur Enregistrer les modifications. Après avoir fait ça, tester en passant de true à false et actualiser puis observer.
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'témoignages'
                ],
                'menu_icon' => 'dashicons-testimonial',
                // On choisi dans supports ce qu'on veut rendre accessible dans notre post-type : un titre, un textarea, un extrait et la possibilité de rajouter une image mise en avant.
                'supports' => ['title', 'editor', 'thumbnail'],
            ]
        );
    }
}
