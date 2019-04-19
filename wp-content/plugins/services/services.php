<?php

// On use ici un namespace (celui qu'on crée ligne 2 dans autoload.php). L'avantage de cette écriture là c'est qu'on crée un 'alias' avec la commande 'as' ce qui fait qu'à la ligne 26, on peut simplement écrire ServicesPostType::class. Pour l'exemple, j'ai précisé que l'alias était ServicesPostType mais à vrai dire c'est nécessaire que si on modifie le nom de la class. 
use App\Features\PostTypes\ServicesPostType as ServicesPostType;


/**
 * Plugin Name: Services
 * Plugin URI: PLUGIN SITE HERE
 * Descritpion: PLUGIN DESCRIPTION HERE
 * Author: YOUR NAME HERE
 * Author URI: YOUR SITE HERE
 * Text Domain: services
 * Domain Path: /languages
 * Version: 0.1.1
 * 
 * @package Services
 */

// Your code starts here.


// On require_once le fichier autoload.php qui lui fera un require_once pour toutes les class qui ont besoin d'être chargées.
require_once('autoload.php');

// Importation du fichier ServicesPostType avec la function php 'require_once'
// require_once('App/Features/PostTypes/ServicesPostType.php');


add_action('init', [ServicesPostType::class, 'register']);



