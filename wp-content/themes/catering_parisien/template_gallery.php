<?php /* Template Name: Gallerie */
?>


<?php
get_header();
?>

<?php
include 'logo.php';
?>

<div class="slides2 rowImg">
    <?php
    $query = new WP_Query( array( 'category_name' => 'gallerie', 'post_type' => 'attachment', 'post_status' => 'any' ) );

    foreach ($query->posts as $post) { ?>
        <div class="item well"><img class="imgStyle img-responsive" src=" <?php echo $post->guid ?>" /></div>
   <?php } ?>
</div>



