<?php get_header(); ?>
<!-- We can use Wordpress funciton instead of include('header.php'); -->
<?php
if (have_posts()) {
    while (have_posts()) {
        echo '<div class="card">';
        the_post();
        the_title('<h2>', '</h2>');
        //the_content(); //Pulls all the page content
        the_excerpt();
        // the_permalink();
        echo '<a href="' . get_the_permalink() . '">Read more</a>';
        echo '</div>';
    }
}
// Wordpress syntax
/*if (have_posts()) : 
        while ( have_posts() ) : the_post(); 
        // Display post content
        endwhile; 
        endif; */

?>

<!-- We can use Wordpress funciton instead of include('footer.php'); -->
<?php get_footer(); ?>