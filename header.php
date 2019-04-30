<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <?php $tdu = get_template_directory_uri(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="//www.google-analytics.com" rel="dns-prefetch">

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $tdu; ?>/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $tdu; ?>/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $tdu; ?>/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $tdu; ?>/img/favicons/site.webmanifest">
        <link rel="mask-icon" href="<?php echo $tdu; ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="<?php echo $tdu; ?>/img/favicons/mstile-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,700,700i" rel="stylesheet">
        <?php wp_head(); ?>


    </head>
    <body <?php body_class(); ?>>

        <?php // do_action('wpml_add_language_selector'); ?>
        <!-- HEADER -->
        <header id="header">
            <div class="container">
                <a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>
                <nav>
                    <ul>
                        <?php chilly_nav('header_menu'); ?>
                        <!-- <li class="facebook"><a target="_blank" href="https://www.facebook.com/lesvillasdesgrumes/">Facebook</a></li> -->
                        <li class="social_link social_link_youtube"><a target="_blank" href="https://www.youtube.com/watch?v=Nk6kDCJpcwY&amp;feature=youtu.be">Youtube</a></li>
                        <li class="social_link social_link_vr"><a href="https://visite-360.ch/1289-bella-vista/" data-featherlight="iframe" data-featherlight-iframe-style="border:none">VR</a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
                <a href="#" id="show_mobile_nav" >Menu</a>
            </div>

        </header>
