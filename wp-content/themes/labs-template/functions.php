<?php

// Pour ne pas avoir de fichier contenant trop de ligne de code, nous allons répartir le tout dans des fichiers spécifiques afin de rendre le tout plus lisible.
// Nous découvrons ici la function require_once() de php qui nous permet d'importer des fichiers.

// Nous utilisons la fonction define() de php pour nous faciliter l'écriture et pouvoir utiliser une constance globale.
define('INCLUDE_DIR', get_template_directory() . "/includes");

require_once(INCLUDE_DIR . '/enqueue-script.php');
require_once(INCLUDE_DIR . '/menu.php');
require_once(INCLUDE_DIR . '/theme-setup.php');
require_once(INCLUDE_DIR . '/customizer.php');
require_once(INCLUDE_DIR . '/widgets.php');


function aLaLigne($settingKey)
{
    $titre = get_theme_mod($settingKey);
    $titre = str_replace("|br|", "</br>", $titre);

    return $titre;
}


