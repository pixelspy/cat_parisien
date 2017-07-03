<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); the_post(); ?>
    <div class="logo-cat">
    </div>
    <div class="row">

        <div id="primary" class="col-lg-12">
                    <div class="">
                        <h1 id="titre-main"> <?php the_title(); ?></h1>
                        <?php the_post_thumbnail('medium-large', ['class' => 'img-fluid center-block'])?>
                        <p><?php the_content(); ?></p>
                    </div><!-- .entry-content -->

        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
