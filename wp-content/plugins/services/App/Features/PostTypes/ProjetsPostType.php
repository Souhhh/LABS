<?php

namespace App\Features\PostTypes;

class ProjetsPostType
{
    public static $slug = 'projets';

    public static function register()
    {
        register_post_type(
            self::$slug,
            [
                'labels' => [
                    'name' => __('Projets'),
                    'singular_name' => 'projet',
                    'add_new' => __('Ajouter'),
                    'add_new_item' => __('Ajouter un nouveau projet'),
                    'edit_item' => __('Modifier le projet'),
                    'new_item' => __('Nouveau projet'),
                    'view_item' => __('Voir le projet'),
                    'view_items' => __('Voir les projets'),
                    'search_items' => __('Rechercher des projets'),
                    'not_found' => __('Pas de projet trouvé.'),
                    'not_found_in_trash' => ('Pas de projet dans la corbeille.'),
                    'all_items' => __('Tous les projets'),
                    'archives' => __('projets archivés'),
                    'filter_items_list' => __('Filtre de projet'),
                    'items_list_navigation' => __('Navigation de projet'),
                    'items_list' => __('Liste des projets'),
                    'item_published' => __('projet publié.'),
                    'item_published_privately' => __('projet publié en privé.'),
                    'item_reverted_to_draft' => __('Le projet est retourné au brouillon.'),
                    'item_scheduled' => __('projet planifié.'),
                    'item_updated' => __('projet mis à jours.'),
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'projets'
                ],
                'capabilities' => array(
                    'edit_post' => 'edit_projet',
                    'edit_posts' => 'edit_projets',
                    'edit_others_posts' => 'edit_other_projets',
                    'publish_posts' => 'publish_projets',
                    'read_post' => 'read_projet',
                    'read_private_posts' => 'read_private_projets',
                    'delete_post' => 'delete_projet',
                  ),
                'menu_icon' => 'dashicons-portfolio',
                'supports' => ['title', 'editor', 'thumbnail']                
            ]
        );
    }
}
