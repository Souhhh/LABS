<?php

class MgCustomizer
{

/**
 * Fonction qui ajoute la possibilité de customiser la partie personnalisation du thème
 * 
 * @param [type] $wp_customize
 * @return void
 */

// FONCTION POUR CUSTOMIZER LA HOME PAGE
public static function ajout_personnalisation_about($wp_customize)
{
    // Création du panel
    $wp_customize->add_panel('labs-panel-home', [
        'title' => __('Home page'),
        'Description' => __('Personnalisation de la page Home')
    ]);

    // Ajout d'une section à un panel défini. Si pas de panel défini, alors la section sera visible directement
    // Attention, il faut que le panel ait déjà été ajouté pour que la section puisse s'y greffer.

    // Création de la 'Section banner' (dans le panel Home page)
    $wp_customize->add_section('labs-section-banner', [
        'panel' => 'labs-panel-home',
        'title' => __('Section banner'),
        // 'description' => __('Personnalisez le logo'),
    ]);
    // Création de la 'Section about' (dans le panel Home page)
    $wp_customize->add_section('labs-about-section-text', [
        'panel' => 'labs-panel-home',
        'title' => __('Section about'),
        // 'description' => __('Personnalisez le titre et le texte')
    ]);
    // Création de la 'Section vidéo' (dans le panel Home page)
    $wp_customize->add_section('labs-video', [
        'panel' => 'labs-panel-home',
        'title' => __('Video'),
        // 'description' => __('Personnalisez le titre et le texte')
    ]);
    // Création de la 'Section testimonial' (dans le panel Home page)
    $wp_customize->add_section('labs-section-testimonial', [
        'panel' => 'labs-panel-home',
        'title' => __('Section testimonial'),
        // 'description' => __('Personnalisez le titre')
    ]);
    // Création de la 'Section team' (dans le panel Home page)
    $wp_customize->add_section('labs-section-team', [
        'panel' => 'labs-panel-home',
        'title' => __('Section team'),
        // 'description' => __('Personnalisez le titre')
    ]);
    // Création de la 'Section promotion' (dans le panel Home page)
    $wp_customize->add_section('labs-section-promotion', [
        'panel' => 'labs-panel-home',
        'title' => __('Section promotion'),
        // 'description' => __('Personnalisez le titre')
    ]);
    // Création de la 'Section contact us' (dans le panel Home page)
    $wp_customize->add_section('labs-section-contact', [
        'panel' => 'labs-panel-home',
        'title' => __('Section contact us'),
        // 'description' => __('Personnalisez le titre')
    ]);
    
    // Ajout d'un setting qui contiendra des informations dans la base de données sous la clé correspondant à son id (premier paramètre)
     // La clé est utilisée pour récupérer les valeurs dans le thème grâce à la function get_theme_mod().
    // Attention, la ligne précédente n'est valable que si le 'type' du setting est défini à 'theme_mod'

    // SECTION ABOUT
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
    // SECTION NAVBAR
    // Setting pour le changement du logo de la navbar
    $wp_customize->add_setting('labs-header', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // SECTION BANNER
    // Setting pour le changement du logo du banner
    $wp_customize->add_setting('labs-banner', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);    
    // Setting pour le changement de la première image du carousel
    $wp_customize->add_setting('labs-carousel1', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour le changement de la deuxième image du carousel
    $wp_customize->add_setting('labs-carousel2', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // VIDEO
    // Setting pour la vidéo
    $wp_customize->add_setting('labs-video', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour la vignette de la vidéo
    $wp_customize->add_setting('labs-video-vign', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // SECTION TESTIMONIAL
    // Setting pour le changement du titre de la section testimonial
    $wp_customize->add_setting('labs-testinomial', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // SECTION TEAM
    // Setting pour le changement de la partie 1 du titre de la section team
    $wp_customize->add_setting('labs-team-title1', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour la partie en vert du titre
    $wp_customize->add_setting('labs-team-title2', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour la partie 3 du titre
    $wp_customize->add_setting('labs-team-title3', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // SECTION PROMOTION
    // Setting pour le titre de la section promotion
    $wp_customize->add_setting('labs-promotion-title', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour le texte de la section promotion
    $wp_customize->add_setting('labs-promotion-text', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // SECTION CONTACT US
    // Setting pour le titre
    $wp_customize->add_setting('labs-contact-title1', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour le paragraphe 
    $wp_customize->add_setting('labs-contact-text', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour le sous-titre 
    $wp_customize->add_setting('labs-contact-title2', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);
    // Setting pour les coordonnées 
    $wp_customize->add_setting('labs-contact-coord', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);


    // Ajout d'un control (un label avec input et autres informations). Le control doit être attaché à une section ainsi qu'à un setting.
    // Attention, le control doit être déjà crée afin que le control puisse s'ajouter.

    // SECTION ABOUT
    // Control pour la partie 1 du titre
    $wp_customize->add_control('labs-about-text-title1-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-title1',
        'label' => __('Titre de la section'),
        // 'description' => __('Personnalisez la partie gauche du titre'),
        'type' => 'text'
    ]);
    // Control pour la partie en couleur du titre
    $wp_customize->add_control('labs-about-text-title2-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-title2',
        'label' => __('Titre de la section'),
        // 'description' => __('Personnalisez la partie verte du titre'),
        'type' => 'text'
    ]);
    // Control pour la partie 3 du titre
    $wp_customize->add_control('labs-about-text-title3-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-title3',
        'label' => __('Titre de la section'),
        // 'description' => __('Personnalisez la partie droite du titre'),
        'type' => 'text'
    ]);
    // Control pour le texte de gauche
    $wp_customize->add_control('labs-about-text-left-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-text-left',
        'label' => __('Texte colonne gauche'),
        // 'description' => __('Personnalisez le texte de la colonne gauche'),
        'type' => 'textarea'
    ]);
    // Control pour le texte de droite
    $wp_customize->add_control('labs-about-text-right-control', [
        'section' => 'labs-about-section-text',
        'settings' => 'labs-about-text-right',
        'label' => __('Texte colonne droite'),
        // 'description' => __('Personnalisez le texte de la colonne droite'),
        'type' => 'textarea'
    ]);
    // SECTION NAVBAR
    // Control pour le logo de la navbar
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo2',
            array(
                'label'      => __( 'Charger une image pour le logo principal'),
                'section'    => 'labs-section-banner',
                'settings'   => 'labs-banner',
                'context'    => 'your_setting_context' 
            )
        )
    );
    // SECTION NAVBAR
    // Control pour le logo de la navbar
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo1',
            array(
                'label'      => __( 'Charger une image pour le logo du menu'),
                'section'    => 'labs-section-banner',
                'settings'   => 'labs-header',
                'context'    => 'your_setting_context' 
            )
        )
    );
    // Control pour la première image du carousel
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'carousel1',
            array(
                'label'      => __( 'Charger la première image du carousel'),
                'section'    => 'labs-section-banner',
                'settings'   => 'labs-carousel1',
                'context'    => 'your_setting_context' 
            )
        )
    );
    // Control pour la deuxième image du carousel
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'carousel2',
            array(
                'label'      => __( 'Charger la deuxième image du carousel'),
                'section'    => 'labs-section-banner',
                'settings'   => 'labs-carousel2',
                'context'    => 'your_setting_context' 
            )
        )
    );
    // Control pour la vidéo
    $wp_customize->add_control('labs-video-control', [
        'section' => 'labs-video',
        'settings' => 'labs-video-vign',
        'label' => __('Mettre le lien de votre vidéo dans le champ ci-dessous'),
        // 'description' => __('Personnalisez la partie gauche du titre'),
        'type' => 'url'
    ]);
    // Control pour la vignette de la vidéo
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'vignette',
            array(
                'label'      => __( 'Vignette de la vidéo'),
                'section'    => 'labs-video',
                'settings'   => 'labs-video-vign',
                'context'    => 'your_setting_context' 
            )
        )
    );
    // Control pour la section testimonial
    $wp_customize->add_control('labs-testimonial-title', [
        'section' => 'labs-section-testimonial',
        'settings' => 'labs-testinomial',
        'label' => __('Titre de la section'),
        // 'description' => __('Personnalisez le titre de la section'),
        'type' => 'text'
    ]);
     // Control pour la partie 1 du titre de la section team
     $wp_customize->add_control('labs-team-title1-control', [
        'section' => 'labs-section-team',
        'settings' => 'labs-team-title1',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez la partie gauche du titre'),
        'type' => 'text'
    ]);
    // Control pour la partie en couleur du titre
    $wp_customize->add_control('labs-team-title2-control', [
        'section' => 'labs-section-team',
        'settings' => 'labs-team-title2',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez la partie verte du titre'),
        'type' => 'text'
    ]);
    // Control pour la partie 3 du titre
    $wp_customize->add_control('labs-team-title3-control', [
        'section' => 'labs-section-team',
        'settings' => 'labs-team-title3',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez la partie droite du titre'),
        'type' => 'text'
    ]);
    // SECTION PROMOTION
    // Control pour le titre 
    $wp_customize->add_control('labs-promotion-title', [
        'section' => 'labs-section-promotion',
        'settings' => 'labs-promotion-title',
        'label' => __('Titre de la section'),
        'description' => __('Personnalisez le titre'),
        'type' => 'text'
    ]);
    // Control pour le paragraphe 
    $wp_customize->add_control('labs-promotion-texte', [
        'section' => 'labs-section-promotion',
        'settings' => 'labs-promotion-text',
        'label' => __('Texte de la section'),
        'description' => __('Personnalisez le texte'),
        'type' => 'textarea'
    ]);
    // SECTION CONTACT US
    // Control pour le titre 
    $wp_customize->add_control('labs-contact-title1', [
        'section' => 'labs-section-contact',
        'settings' => 'labs-contact-title1',
        'label' => __('Titre de la section'),
        'type' => 'text'
    ]);
    // Control pour le texte 
    $wp_customize->add_control('labs-contact-text', [
        'section' => 'labs-section-contact',
        'settings' => 'labs-contact-text',
        'label' => __('Description'),
        'type' => 'textarea'
    ]);
    // Control pour le sous-titre 
    $wp_customize->add_control('labs-contact-title2', [
        'section' => 'labs-section-contact',
        'settings' => 'labs-contact-title2',
        'label' => __('Sous-titre'),
        'type' => 'text'
    ]);
    // Control pour les coordonnées 
    $wp_customize->add_control('labs-contact-coord', [
        'section' => 'labs-section-contact',
        'settings' => 'labs-contact-coord',
        'label' => __('Coordonnées'),
        'description' => __('Remarque : mettre un |br| pour passer à la ligne.'),
        'type' => 'textarea'
    ]);
}
}
add_action('customize_register', [MgCustomizer::class, 'ajout_personnalisation_about']);


