<?php
namespace App\Features\MetaBoxes;
use App\Features\PostTypes\ServicesPostType;
class ServicesDetailsMetabox
{
    public static $slug = 'services_details_metabox';
    /**
     * Ajout d'une metabox au type de contenu qui sont passé dans le tableau $screens
     * 
     * @return void
     */
    public static function add_meta_box()
    {
        $screen = [ServicesPostType::$slug];
            add_meta_box(
                self::$slug,
                __('Détails sur le service'),
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
        // Je fais appel à ma fonction view($path) dans laquelle je rempli le paramètre avec le nom du fichier et son dossier parent. Avant, on avait le include.
        // Récupération de toutes les metadata du post
        $data = get_post_meta(get_the_ID());

        // Etant donné que $data est un tableau de données contenant toutes les metadata possible, on doit préciser qu'on veut celle dont l'index est 0. Nous avons qu'une seule metadata de stockée mais la récupération se fait quand même via un tableau.
        $icone = extract_data_attr('choix_icone', $data);

        // Ancienne façon : view('metaboxes/services-detail', ['icone_choisi' => $icone]);

        // Nouvelle façon de passer les données avec l'aide de la function compact().
        // La function compact créée un tableau où elle met en clé le nom de la variable qu'on lui passe. On lui passe cette variable d'une manière assez pariculière car on lui retire le $ et qu'en plus on la met entre guillemets. En lui passant de cette manière, elle crée donc un tableau avec comme clé et valeur le même nom. Ce qui donne en soi : ['icone' => $icone]. Ca veut dire également qu'on doit aller chaner dans services-detail.html.php le nom de la clé à laquelle on fait appel.
        view('metaboxes/services-detail', compact('icone'));
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
                 'choix_icone' => sanitize_text_field($_POST['labs_choix_icone']),
             ];

             // J'utilise le helper update_post_metas que j'ai crée dans le fichier helpers.php ligne 36. Je passe deux variables : $post_id qui contient l'id du post et $data qui contient un tableau de données récupérées.
             update_post_metas($post_id, $data);
         }
     }
} 