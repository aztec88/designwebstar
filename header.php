<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DesignWebStar</title>
    <meta name="description" content="Don't be in the dark, let us light the way for you">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/wp-content/themes/designwebstar/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Cabin:700|Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<?php

if (is_front_page()):
    $site_classes = array('site-class', 'my-class');
else:
    $site_classes = array('no-site-class');
endif;

?>

<body <?php  body_class($site_classes); ?>>

<div class="container-fluid">
    <div class="row main_header">
        <div class="col-4 logo">
            <a href="/">
                <img width="150px" src="<?= get_template_directory_uri()?>/public/src/img/logo.png" alt="DesignWebStar Logo">
            </a>
        </div>

        <div class="col-8 menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'main_menu',
                    'walker' => new Walker_Nav_primary()
                )
            );
            ?>
        </div>
    </div>
</div>



<!-- <?php
wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'mob_menu',
        'walker' => new Walker_Nav_primary()
    )
);
?>			            -->

