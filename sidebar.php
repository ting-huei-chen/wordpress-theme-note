<aside id="sidebar">
    <?php
    //Test what template is being displayed, and show the appropriate sidbar
    if (is_single()) {
        //If the current template is 'single.php' which is a blog post...
        dynamic_sidebar('blog-sidebar');
    } else if (is_page()) {
        dynamic_sidebar('page-sidebar');
    }
    ?>
</aside>