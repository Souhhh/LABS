<?php

class EnqueueScript
{
    /**
     * Fonction qui va ajouter des scripts dynamiquement afin que l'on puisse les inclure dans le thème avec wp_head() et wp_footer()
     * Nous avons ajouter le mot public afin que cette méthode puisse être utilisée depuis l'extérieur. Cela veut dire que l'on peut créer une instance de cette class et puis faire appel à la méthode (ex: $instance->methode())
     * Le mot static permet de pouvoir utiliser la méthode directement depuis la class sans devoir l'instancier
     * 
     * @return void
     */
    public static function ajout_css_js()
    {
        // Ajout des scripts css
        wp_enqueue_style('favicon', get_template_directory_uri() . '/img/favicon.ico');
        wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700");
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('css', get_template_directory_uri() . '/css/font-awesome.min.css');
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css');
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
        wp_enqueue_style('carousel', get_template_directory_uri() . '/css/owl.carousel.css');
        wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
        
        

        // Ajout des scripts js
        wp_enqueue_script('jquery-perso', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', [], null, true);
        wp_enqueue_script('jquery-perso', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery-perso'], null, true);
        wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/magnific-popup.min.js', ['jquery-perso'], null, true);
        wp_enqueue_script('carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', ['jquery-perso'], null, true);
        wp_enqueue_script('circle', get_template_directory_uri() . '/js/circle-progress.min.js', ['jquery-perso'], null, true);
        wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', ['jquery-perso'], null, true);
    }
}

// Nous créons une instance de la class EnqueueScript afin de la passer en paramètre dans notre add_action.
// $euqueue_script = new EnqueueScript();


// Nous ajoutons un écouteur d'événements pour nous prévenir lorsque l'on peut ajouter des css et scripts.
// La function add_action prend en deuxième paramètre soit un string (qui correspond au nom d'une fonction), soit un tableau. Dans la tableau, on passe en premier paramètre l'un objet instance d'une class et en deuxième paramètre u string qui correspond au nom de la method de l'objet passé en premier paramètre.
// Il est possible de ne pas devoir instancier la class avec la syntaxe ci-dessous. Attention, il faut alors que la méthode soit static.
add_action('wp_enqueue_scripts', [EnqueueScript::class, 'ajout_css_js']);
