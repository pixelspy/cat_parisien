<?php /* Template Name: Gallerie */
?>


<?php
get_header();
?>

<?php
include 'logo.php';
?>

<div class="slides2 col-lg-12">
    <?php
    $index = 0;
    $query = new WP_Query( array( 'category_name' => 'gallerie', 'post_type' => 'attachment', 'post_status' => 'any' ) );

    foreach ($query->posts as $post): ?>

        <img src=" <?php echo $post->guid ?>" />
        <?php $index++; ?>
        <?php if ( $index % 2 == 0 && $index !=count($query->posts) ) : ?>
</div>

<div class="slides2 main col-12">
    <?php endif; ?>
    <?php endforeach; ?>
</div>

