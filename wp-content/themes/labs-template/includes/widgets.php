<?php

class MgWidgetRegister
{
    public static function register()
    {
        register_sidebar(array(
            'name' => __('Widgets'),
            'id' => 'wigdets',
            'before_widget' => '<div class="widget-item">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            'class' => 'list-group'
        ));
    }
}
add_action('widgets_init', [MgWidgetRegister::class, 'register']);
