<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS和JS連結 -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <!-- h1和LOGO -->
        <h1>
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web-communicaitons-logo.svg" alt="<?php bloginfo('name'); ?>">
            </a>
        </h1>
        <p><?php bloginfo('description'); ?></p>
        <?php get_search_form(); ?>
        <?php
        // 在這裡貼上menu
        // 判斷式wp_is_mobile()分辨要用手機版還是一般版
        if (wp_is_mobile()) {
            wp_nav_menu(array(
                'theme_location' => 'mobile-menu',
                'containter' => 'nav',
                'container_id' => 'mobile-navigation'
            ));
        } else {
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_id' => 'main-nav'
            ));
        }
        ?>

        <a href="mailto:<?php echo bloginfo('admin_email'); ?>">Submit A Tip</a>
    </header>
    <main>