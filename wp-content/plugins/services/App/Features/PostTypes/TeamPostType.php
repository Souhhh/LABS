<?php

namespace App\Features\PostTypes;

class TeamPostType
{
    public static $slug = 'team';
    public static function register()
    {
        register_post_type(
            self::$slug,
            [
                'labels' => [
                    'name' => __('Membres de l\'équipe'),
                    'singular_name' => 'équipe',
                    'add_new' => __('Ajouter'),
                    'add_new_item' => __('Ajouter un nouveau membre'),
                    'edit_item' => __('Modifier le membre'),
                    'new_item' => __('Nouveau membre'),
                    'view_item' => __('Voir le membre'),
                    'view_items' => __('Voir les membres'),
                    'search_items' => __('Rechercher des membres'),
                    'not_found' => __('Pas de membre trouvé.'),
                    'not_found_in_trash' => ('Pas de membre dans la corbeille.'),
                    'all_items' => __('Tous les membres'),
                    'archives' => __('Membres archivés'),
                    'filter_items_list' => __('Filtre de membre'),
                    'items_list_navigation' => __('Navigation de membre'),
                    'items_list' => __('Liste des membres'),
                    'item_published' => __('Membre publié.'),
                    'item_published_privately' => __('Membre publié en privé.'),
                    'item_reverted_to_draft' => __('Le membre est retourné au brouillon.'),
                    'item_scheduled' => __('Membre planifié.'),
                    'item_updated' => __('Membre mis à jours.'),
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'membres'
                ],
                'capabilities' => array(
                    'edit_post' => 'edit_team',
                    'edit_posts' => 'edit_team',
                    'edit_others_posts' => 'edit_other_team',
                    'publish_posts' => 'publish_team',
                    'read_post' => 'read_team',
                    'read_private_posts' => 'read_private_team',
                    'delete_post' => 'delete_team',
                  ),
                'menu_icon' => 'dashicons-groups',
                'supports' => ['title', 'editor', 'thumbnail'],
            ]
        );
    }
}
