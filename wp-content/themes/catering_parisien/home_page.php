<?php /* Template Name: home_page */
?>

<?php
get_header();
?>

<?php
global $post;
echo $post->post_content;
?>

<?php
get_footer();
?>

