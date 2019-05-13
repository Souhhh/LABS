<?php
// Je défini une variable globale du nom de LABS_VIEW_DIR qui aura comme valeur le chemin du fichier dans lequel je suis. Je concatène le dossier resources/views/

define('LABS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('LABS_VIEW_DIR', plugin_dir_path(__FILE__) . 'resources/views/');