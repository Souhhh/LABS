<?php 
namespace App\Features\MetaBoxes;
use App\Features\PostTypes\TeamPostType;
class TeamDetailsMetabox
{
    public static $slug = 'team_details_metabox';
    public static function add_meta_box()
    {
        $screen = [TeamPostType::$slug];
        add_meta_box(
            self::$slug,
            __('Entrer la fonction du membre'),
            [self::class, render],
            $screen
        );
    }
    public static function render()
    {
        $data = get_post_meta(get_the_ID());

        $membre = extract_data_attr('infos_membre', $data);

        view('metaboxes/team-detail', compact('membre'));
    }
    public static function save($post_id)
    {
        if (count($_POST) != 0){
            $data = [
                'infos_membre' => sanitize_text_field($_POST['labs_infos_membre']),
            ];
            update_post_metas($post_id, $data);
        }
    }
}