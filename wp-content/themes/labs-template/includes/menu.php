<?php

// Nous allons prendre l'habitude de préfixer nos class afin de ne pas créer de conflit avec WordPress. On ne sait jamais que le nom soit déjà utilisé ailleurs.

class MgMenu
{

    /**
     * Fonction qui ajoute un menu au thème.
     * 
     * @return void
     */
    public static function register_main_menu()
    {
        register_nav_menu('main-menu', 'Menu principal dans le header');
    }
    /**
     * Fonction qui ajoute des attributes aux balises a des nav_menu
     * 
     * @param [type] $att
     * @param [type] $item
     * @param [type] $args
     * @return void
     */
    public static function ajout_menu_a_class($atts, $item, $args)
    {
        $class = '';
        $atts['class'] = $class;
        return $atts;
    }
}
add_action('after_setup_theme', [MgMenu::class, 'register_main_menu']);
// J'ai utilisé un hook différent de celui utilisé par Yassine car moi je voulais ajouter une class à mes li et non pas à mes balises a.
add_filter('nav_menu_css_class', [MgMenu::class, 'ajout_menu_a_class'], 10, 3);
