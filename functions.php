<?php

register_nav_menus(
    array('primary-menu'=> 'Primary Menu')
);

add_post_type_support('page', 'excerpt');

add_theme_support('post-thumbnails');

// Add custom classes to navigation menu links
function custom_nav_menu_link_attributes($atts, $item, $args, $depth) {
    if ($args->theme_location === 'primary-menu') {
        $atts['class'] = 'nav-link nav-item'; // Add your custom classes here
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10, 4);



?>