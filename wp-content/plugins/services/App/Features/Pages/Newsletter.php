<?php
namespace App\Features\Pages;

use App\Http\Models\News;
use App\Http\Controllers\NewsController;

class Newsletter
{
    /**
     * Initialisation de la page.
     * 
     * @return void
     */
    public static function init()
    {
        add_menu_page(
            __("Personnes abonnées à la newsletter"),
            __('Newsletter'),
            'edit_private_pages',
            'news-letter',
            [self::class, 'render'],
            'dashicons-email',
            26
        );
    }
    /**
     * Affichage de la page.
     * 
     * @return void
     */
    public static function render() 
    {
        $action = isset($_GET["action"]) ? $_GET["action"] : "index"; 
        call_user_func([NewsController::class, $action]);
    }
}