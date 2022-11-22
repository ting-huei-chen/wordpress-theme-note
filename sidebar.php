<aside id="sidebar">
    <?php
    //Test what template is being displayed, and show the appropriate sidbar
    if (is_single()) {
        //If the current template is 'single.php' which is a blog post...
        dynamic_sidebar('blog-sidebar');
        // 與此Sidebar相關請見 single.php line 25
        // 與此Sidebar相關請見 functions.php line 29
        // 與此Sidebar相關請見 WP ADMIN > Appearance > Widgets
    } else if (is_page()) {
        dynamic_sidebar('page-sidebar');
    }
    ?>
</aside>