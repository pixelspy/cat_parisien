<?php
$query = new WP_Query( array( 'category_name' => 'logo', 'post_type' => 'attachment', 'post_status' => 'any' ) );
?>
<div class="logo-static">
    <a href="http://localhost:8888/CateringParisien2/"><img class="logo-img" src=" <?php echo $query->post->guid ?>" /></a>
</div>

