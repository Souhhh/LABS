<?php

class MgWidgetRegister
{
    public static function register()
    {
        register_sidebar(array(
            'name' => __('Widget1'),
            'id' => 'wigdet1',
            'before_widget' => '<div class="widget-item mt-5">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            'class' => 'list-group'
        ));
        register_sidebar(array(
            'name' => __('Widget2'),
            'id' => 'wigdet2',
            'before_widget' => '<div class="widget-item mt-5">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            'class' => 'list-group'
        ));
        register_sidebar(array(
            'name' => __('Widget3'),
            'id' => 'wigdet3',
            'before_widget' => '<div class="widget-item mt-5">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            'class' => 'list-group'
        ));
        register_sidebar(array(
            'name' => __('Widget4'),
            'id' => 'wigdet4',
            'before_widget' => '<div class="widget-item mt-5">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            'class' => 'list-group'
        ));
    }
}
add_action('widgets_init', [MgWidgetRegister::class, 'register']);
?>

