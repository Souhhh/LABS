<?php
namespace App\Features\Pages;

use App\Http\Controllers\NewsletterController;

class SendNewsletter
{
    /**
     * Initialisation de la page.
     * 
     * @return void
     */
    public static function init()
    {
        add_menu_page(
            __("Personnes s'étant abonnées à la newsletter"),
            __('Newsletter'),
            'edit_private_pages',
            'newsletter',
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
        $action = isset($_GET["action"]) ? $_GET["action"] : "index"; call_user_func([NewsletterController::class, $action]);
    }
}