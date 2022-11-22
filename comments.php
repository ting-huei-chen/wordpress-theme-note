<!-- Comments only show in posts (single.php) (見single.php line 20)-->
<!-- 留言區開關及相關設定: WP面板 > Settings > Discussion Settings -->
<?php if (comments_open()) { ?>
    <section id="comments">
        <?php
        if (have_comments()) {
            //Does this blog have comments?
            echo '<h3>';
            comments_number('No comments on this post', 'One comment', '% Comments');
            echo '</h3>';

            echo '<ol id="comment-list">';
            wp_list_comments(array(
                'style' => 'ol',
                'avatar_size' => 64,
                'reverse_top_level' => true
            ));
            echo '</ol>';
        };

        comment_form();
        ?>
    </section>
<?php } else if (!comments_open()) {
    echo '<p>Comments are closed</p>';
} ?>