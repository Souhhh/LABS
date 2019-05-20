<?php

namespace App\Features\Roles;

class Role

{
    /**
     * Fonction d'initialisation des rôles
     */

     public static function init()
     {
        self::add_cap_for_postType('services');
        self::add_cap_for_postType('projets');
        self::add_cap_for_postType('team');
        self::add_cap_for_postType('testimonials');
    }

    public static function add_cap_for_postType($slug_postType)
    {
        $admins = get_role('administrator');

        $admins->add_cap('edit_' . $slug_postType);
        $admins->add_cap('edit_' . $slug_postType . 's');
        $admins->add_cap('edit_other_' . $slug_postType . 's');
        $admins->add_cap('publish_' . $slug_postType . 's');
        $admins->add_cap('read_' . $slug_postType);
        $admins->add_cap('read_private_' . $slug_postType . 's');
        $admins->add_cap('delete_' . $slug_postType);
    }
}