<?php

// On use ici un namespace (celui qu'on crée ligne 2 dans autoload.php). L'avantage de cette écriture là c'est qu'on crée un 'alias' avec la commande 'as' ce qui fait qu'à la ligne 26, on peut simplement écrire ServicesPostType::class. Pour l'exemple, j'ai précisé que l'alias était ServicesPostType mais à vrai dire c'est nécessaire que si on modifie le nom de la class. 
// J'ai copié collé (mis à part require autoload) le contenu de services.php ici même.
use App\Features\PostTypes\ServicesPostType;
use App\Features\MetaBoxes\ServicesDetailsMetabox;
use App\Features\PostTypes\TestimonialsPostType;
use App\Features\MetaBoxes\TestimonialsDetailsMetabox;
use App\Features\PostTypes\TeamPostType;
use App\Features\MetaBoxes\TeamDetailsMetabox;
use App\Features\PostTypes\ProjetsPostType;
use App\Features\MetaBoxes\ProjetsDetailsMetabox;

use App\Features\Pages\Page;
use App\Features\Pages\SendMail;
use App\Setup;

// add_action pour le post type SERVICES
add_action('init', [ServicesPostType::class, 'register']);
add_action('add_meta_boxes_services', [ServicesDetailsMetabox::class, 'add_meta_box']); // attention : après le add_meta_boxes_, on doit mettre le slug du post type !!
// On fini par lancer la function save quand le hook save_post_$slug est appelé.
add_action('save_post_' . ServicesPostType::$slug, [ServicesDetailsMetabox::class, 'save']);

// add_action pour le post type TESTIMONIALS
add_action('init', [TestimonialsPostType::class, 'register']);
add_action('add_meta_boxes_testimonials', [TestimonialsDetailsMetabox::class, 'add_meta_box']);
add_action('save_post_' . TestimonialsPostType::$slug, [TestimonialsDetailsMetabox::class, 'save']);

// add_action pour le post type TEAM
add_action('init', [TeamPostType::class, 'register']);
add_action('add_meta_boxes_team', [TeamDetailsMetabox::class, 'add_meta_box']);
add_action('save_post_' . TeamPostType::$slug, [TeamDetailsMetabox::class, 'save']);

// add_action pour le post type PROJETS
add_action('init', [ProjetsPostType::class, 'register']);
add_action('add_meta_boxes_projets', [ProjetsDetailsMetabox::class, 'add_meta_box']);
add_action('save_post_' . ProjetsPostType::$slug, [ProjetsDetailsMetabox::class, 'save']);


// add_action pour les MAILS
add_action('admin_menu', [Page::class, 'init']);
add_action('admin_action_send-mail', [SendMail::class, 'send_mail']);
add_action('admin_init', [Setup::class, 'start_session']);