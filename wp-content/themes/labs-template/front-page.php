<?php
    // Ajour de la navbar
    get_header();

    // Ajout du header (partie avec le carousel)
    get_template_part('templates/banner');
    // Ajout de la section avec les 3 cards
    get_template_part('templates/card');
    // Ajout de la section about
    get_template_part('templates/about');
    // Ajout de la section testimonial
    get_template_part('templates/testimonial');
    // Ajout de la section services
    get_template_part('template/services');
    // Ajout de la section team
    get_template_part('templates/team');
    // Ajout de la section promotion
    get_template_part('templates/promotion');
    // Ajout de la section contact
    get_template_part('templates/contact');

    // Ajout du footer
    get_footer();
?>