<?php

/**
 * Fonction qui va ajouter des scripts dynamiquement afin que l'on puisse les inclure dans le thème avec wp_head() et wp_footer()
 * 
 * @return void
 */
function ajout_css_js()
{
    // Ajout des scripts css
    wp_enqueue_style('favicon', get_template_directory_uri() . '/img/favicon.ico');
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700");
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('css', get_template_directory_uri() . '/css/font-awesome.min.cs');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style('carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');


    // Ajout des scripts js
    wp_enqueue_script('jquery-perso', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', null, true);
    wp_enqueue_script('jquery-perso', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery-perso'], null, true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/magnific-popup.min.js', ['jquery-perso'], null, true);
    wp_enqueue_script('carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', ['jquery-perso'], null, true);
    wp_enqueue_script('circle', get_template_directory_uri() . '/js/circle-progress.min.js', ['jquery-perso'], null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', ['jquery-perso'], null, true);
}

// Nous ajoutons un écouteur d'événements pour nous prévenir lorsque l'on peut ajouter des css et scripts.
add_action('wp_enqueue_scripts', 'ajout_css_js');


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
 * Fonction qui ajoute la possibilité de customiser la partie personnalisation du thème
 * 
 * @param [type] $wp_customize
 * @return void
 */
function ajout_personnalisation_about($wp_customize)
{
    $wp_customize->add_panel('labs-panel-about', [
        'title' => __('Section about'),
        'Description' => __('Personnalisation de la section about')
    ]);

    // Ajout d'une section à un panel défini. Si pas de panel défini, alors la section sera visible directement
    // Attention, il faut que le panel ait déjà été ajouté pour que la section puisse s'y greffer

    $wp_customize->add_section('labs-about-section-text', [
        'panel' => 'labs-panel-about',
        'title' => __('Personnalisation du texte'),
        'description' => __('Personnalisez le texte')
    ]);

    // Ajout d'un setting qui contiendra des informations dans la base de données sous la clé correspondant à son id (premier paramètre)
    $wp_customize->add_setting('labs-about-text-left', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    // Ajout d'un setting qui contiendra des informations dans la base de données sous la clé correspondant à son id (premier paramètre).
    // La clé est utilisée pour récupérer les valeurs dans le thème grâce à la function get_theme_mod().
    // Attention, la ligne précédente n'est valable que si le 'type' du setting est défini à 'theme_mod'
    $wp_customize->add_setting('labs-about-text-right', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    // Ajout d'un control (un label avec input et autres informations). Le control doit être attaché à une section ainsi qu'à un setting.
    // Attention, le control doit être déjà crée afin que le control puisse s'ajouter.
    $wp_customize->add_control('labs-about-text-left-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-text-left',
        'label' => __('Texte colonne gauche'),
        'description' => __('Personnalisez le texte de la colonne gauche'),
        'type' => 'textarea'
    ]);
    $wp_customize->add_control('labs-about-text-right-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-text-right',
        'label' => __('Texte colonne droite'),
        'description' => __('Personnalisez le texte de la colonne droite'),
        'type' => 'textarea'
    ]);
}
add_action('customize_register', 'ajout_personnalisation_about');