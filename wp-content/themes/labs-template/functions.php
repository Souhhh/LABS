<?php

// Pour ne pas avoir de fichier contenant trop de ligne de code, nous allons répartir le tout dans des fichiers spécifiques afin de rendre le tout plus lisible.
// Nous découvrons ici la function require_once() de php qui nous permet d'importer des fichiers.
require_once(get_template_directory() . '/includes/enqueue-script.php');


/**
 * Fonction qui ajoute un menu au thème.
 * 
 * @return void
 */
function register_main_menu()
{
    register_nav_menu('main-menu', 'Menu principal dans le header');
}
add_action('after_setup_theme', 'register_main_menu');

/**
 * Fonction qui ajoute des attributes aux balises a des nav_menu
 * 
 * @param [type] $att
 * @param [type] $item
 * @param [type] $args
 * @return void
 */
function ajout_menu_a_class($atts, $item, $args)
{
    $class = '';
    $atts['class'] = $class;
    return $atts;
}
add_filter('nav_menu_css_class', 'ajout_menu_a_class', 10, 3);


/**
 * Ajout la fonctionnalité d'un ajout d'image pour les posts pour ce thème-ci
 * 
 * @return void
 */
function ajout_image_article()
{
    // Ajout de la fonctionnalité d'ajout d'image pour les posts pour ce thème-ci
    add_theme_support('post-thumbnails');
    $test = 0;
}
// Ajout d'un écouteur d'événement pour activer les images mise en avant pour les post (article)
add_action('init', 'ajout_image_article');




/**
 * Fonction qui ajoute la possibilité de customiser la partie personnalisation du thème
 * 
 * @param [type] $wp_customize
 * @return void
 */
// FONCTION POUR CUSTOMIZER LA HOME PAGE

function ajout_personnalisation_about($wp_customize)
{
    // Création du panel
    $wp_customize->add_panel('labs-panel-home', [
        'title' => __('Home page'),
        'Description' => __('Personnalisation de la page Home')
    ]);

    // Ajout d'une section à un panel défini. Si pas de panel défini, alors la section sera visible directement
    // Attention, il faut que le panel ait déjà été ajouté pour que la section puisse s'y greffer.

    // Création de la 'Section about' (dans le panel Home page)
    $wp_customize->add_section('labs-about-section-text', [
        'panel' => 'labs-panel-home',
        'title' => __('Section about'),
        'description' => __('Personnalisez le texte')
    ]);

    // Ajout d'un setting qui contiendra des informations dans la base de données sous la clé correspondant à son id (premier paramètre)
     // La clé est utilisée pour récupérer les valeurs dans le thème grâce à la function get_theme_mod().
    // Attention, la ligne précédente n'est valable que si le 'type' du setting est défini à 'theme_mod'

    // Setting pour le changement de la partie 1 du titre de la section
    $wp_customize->add_setting('labs-about-title1', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour la partie en vert du titre
    $wp_customize->add_setting('labs-about-title2', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour la partie 3 du titre
    $wp_customize->add_setting('labs-about-title3', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour le changement du texte de gauche
    $wp_customize->add_setting('labs-about-text-left', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour le changement du texte de droite
    $wp_customize->add_setting('labs-about-text-right', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    // Ajout d'un control (un label avec input et autres informations). Le control doit être attaché à une section ainsi qu'à un setting.
    // Attention, le control doit être déjà crée afin que le control puisse s'ajouter.

    // Control pour la partie 1 du titre
    $wp_customize->add_control('labs-about-text-title1-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-title1',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez la partie gauche du titre'),
        'type' => 'textarea'
    ]);
    // Control pour la partie en couleur du titre
    $wp_customize->add_control('labs-about-text-title2-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-title2',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez la partie verte du titre'),
        'type' => 'textarea'
    ]);
    // Control pour la partie 3 du titre
    $wp_customize->add_control('labs-about-text-title3-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-title3',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez la partie droite du titre'),
        'type' => 'textarea'
    ]);
    // Control pour le texte de gauche
    $wp_customize->add_control('labs-about-text-left-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-text-left',
        'label' => __('Texte colonne gauche'),
        'description' => __('Personnalisez le texte de la colonne gauche'),
        'type' => 'textarea'
    ]);
    // Control pour le texte de droite
    $wp_customize->add_control('labs-about-text-right-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-text-right',
        'label' => __('Texte colonne droite'),
        'description' => __('Personnalisez le texte de la colonne droite'),
        'type' => 'textarea'
    ]);
}
add_action('customize_register', 'ajout_personnalisation_about');


// Fonction pour pouvoir changer l'image (le logo du site)
