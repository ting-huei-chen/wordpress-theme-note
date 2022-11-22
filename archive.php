<!-- works for all types of archive e.g. category, author, date -->
<!-- archive預設是依照月份 -->
<!-- ***** 要在sidebar(widgets)裡加一個archive widget才有連結可以點 ***** -->
<?php get_header(); ?>
<?php
the_archive_title('<h2>', '</h2>'); //syntax the_archive_title(before content,after content)
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_title('<h3>', '</h3>');
        //the_content(); //Pulls all the page content
        the_excerpt();
        //the_permalink();
        echo '<a href="' . get_the_permalink() . '">Read more</a>';
    }
}

/*if (have_posts()) : 
		    while ( have_posts() ) : the_post(); 
			// Display post content
		    endwhile; 
	        endif; */
?>
<?php get_footer(); ?>