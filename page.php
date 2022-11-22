<?php
//page.php is the template used for showing individual 'Page' content
get_header();
?>
<div id="two-column">
    <article>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_title('<h2>', '</h2>');
                the_content(); //Pulls all the page content
            }
        }
        ?>
    </article>
    <?php
    if (is_active_sidebar('page-sidebar')) {
        get_sidebar();
    }
    ?>
</div>
<?php get_footer(); ?>