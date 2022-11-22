<?php
//This file is used to change the behaviour of WordPress from the defaults
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
add_theme_support('title-tag');

function linked_assets()
{
    //Include all CSS or JS assets needed for this site
    wp_enqueue_style('main', get_stylesheet_uri());
    if (is_page()) {
        wp_enqueue_style('page-styles', get_template_directory_uri() . '/page.css');
    } else if (is_single()) {
        wp_enqueue_style('page-styles', get_template_directory_uri() . '/single.css');
    }
}
add_action('wp_enqueue_scripts', 'linked_assets');

//Register Menu Areas
function my_menus()
{
    register_nav_menu('header-menu', 'Main Menu (Header)');
    register_nav_menu('mobile-menu', 'Mobile Menu (Header)');
}
add_action('after_setup_theme', 'my_menus');

//Sidebars (Widget Areas)
function widgets()
{
    register_sidebar(array(
        'name' => 'Blog Post Sidebar', //The friendly name the user will see
        'id' => 'blog-sidebar', //The ID for this sidebar, which is unique
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Page Sidebar', //The friendly name the user will see
        'id' => 'page-sidebar', //The ID for this sidebar, which is unique
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'widgets');
