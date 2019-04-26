<?php



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
 * @package Servicesadd_meta_boxes_recipe
 */

// Your code starts add_meta_boxes_recipe



// On require_once le fichier autoload.php qui lui fera un require_once pour toutes les class qui ont besoin d'être chargées.
require_once('autoload.php');

// J'inclus le fichier bootstrap qui lui contient tous les require_once. Le but est de structurer nos fichiers, nos dossiers et de faire les appels de manière structurée dans les bons fichiers en se basant sur le structure et le fonctionnement de Laravel pour qu'on ai déjà une premire approche avec la structure de Laravel.
require_once('bootstrap.php');