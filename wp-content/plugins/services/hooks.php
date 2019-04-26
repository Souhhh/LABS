<?php

// On use ici un namespace (celui qu'on crée ligne 2 dans autoload.php). L'avantage de cette écriture là c'est qu'on crée un 'alias' avec la commande 'as' ce qui fait qu'à la ligne 26, on peut simplement écrire ServicesPostType::class. Pour l'exemple, j'ai précisé que l'alias était ServicesPostType mais à vrai dire c'est nécessaire que si on modifie le nom de la class. 
// J'ai copié collé (mis à part require autoload) le contenu de services.php ici même.
use App\Features\PostTypes\ServicesPostType;
use App\Features\MetaBoxes\ServicesDetailsMetabox;


add_action('init', [ServicesPostType::class, 'register']);

add_action('add_meta_boxes_services', [ServicesDetailsMetabox::class, 'add_meta_box']);

// On fini par lancer la function save quand le hook save_post_$slug est appelé.
add_action('save_post_' . ServicesPostType::$slug, [ServicesDetailsMetabox::class, 'save']);