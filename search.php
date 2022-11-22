<?php get_header(); ?>
<h2>Search results for &ldquo;<?php echo $_GET['s']; ?>&rdquo;</h2>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_title('<h2>', '</h2>');
        the_date('', '<p class="date">Posted on ', '</p>');
        //the_content(); //Pulls all the page content
        the_excerpt();
        //the_permalink();
        echo '<a href="' . get_the_permalink() . '">Read more</a>';
    }
} else {
    echo '<p>There is no results for "' . $_GET['s'] . '"</p>';
}
?>
<?php get_footer(); ?>