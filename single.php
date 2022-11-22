<?php
//single.php is the template used for showing individual 'Post' content
get_header();
?>
<div id="two-column">
    <article>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_title('<h2>', '</h2>');
                the_date('', '<p class="date">Post on', '</p>');
                echo '<p class="author">Posted by ' . get_the_author() . '</p>';
                // Syntax: the_date( string $format = '', string $before = '', string $after = '', bool $echo = true ): string|void
                the_content(); //Pulls all the page content
                //the_excerpt();
                //the_permalink();
            }
        }
        comments_template(); //attach comments.php here
        ?>
    </article>
    <aside>
        <?php
        if (is_active_sidebar('blog-sidebar')) {
            get_sidebar();
        }
        ?>
    </aside>
</div>
<?php get_footer(); ?>