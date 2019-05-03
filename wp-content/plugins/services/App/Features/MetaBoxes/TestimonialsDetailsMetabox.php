<?php
namespace App\Features\MetaBoxes;
use App\Features\PostTypes\TestimonialsPostType;
class TestimonialsDetailsMetabox
{
    public static $slug = 'testimonials_details_metabox';
    /**
     * Ajout d'une metabox au type de contenu qui sont passé dans le tableau $screens
     * 
     * @return void
     */
    public static function add_meta_box()
    {
        $screen = [TestimonialsPostType::$slug];
            add_meta_box(
                self::$slug,
                __('Entrer votre fonction/métier'),
                [self::class, render],
                $screen 
            );
    }
    /**
     * Fonction pour rendre le code html dans la metabox
     * 
     * @return void
     */
    public static function render()
    {
        $data = get_post_meta(get_the_ID());

        $temoignages = extract_data_attr('infos_temoignages', $data);
        
        view('metaboxes/testimonials-detail', compact('temoignages'));
    }

    /**
     * Sauvegarde des données de la metabox
     * 
     * @param [type] $post_id reçu par le do_action
     * @return void
     */

     // $post_id est remplie par l'id du post contenu dans l'url de la page
     public static function save($post_id)
     {
         // On vérifie que $_POST ne soit pas vide pour effectuer l'action uniquement à la sauvegarde du post Type
         if (count($_POST) != 0){
             // Je crée un tableau dans lequel je stock les données récupérées par ma requête auxquelles j'assigne des clés
             $data = [
                 // clés => // name du champ pour récupérer la valeur
                 'infos_temoignages' => sanitize_text_field($_POST['labs_infos_temoignages']),
             ];

             // J'utilise le helper update_post_metas que j'ai crée dans le fichier helpers.php ligne 36. Je passe deux variables : $post_id qui contient l'id du post et $data qui contient un tableau de données récupérées.
             update_post_metas($post_id, $data);
         }
     }
} 