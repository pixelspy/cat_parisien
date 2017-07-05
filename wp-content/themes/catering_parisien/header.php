<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body >
<div id="page">
    <header id="masthead" class="site-header" role="banner">

        <nav class="container navbar">
            <div class="row col-lg-12 ">
            <?php wp_nav_menu (array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'nav navbar-nav navbar-right'
            ));?>
            </div>
        </nav>
    </header><!-- #masthead -->


    <div class="site-content-contain">
        <div id="content" class="site-content">
