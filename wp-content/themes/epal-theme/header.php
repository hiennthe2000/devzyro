<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <?php wp_head(); ?>
    <?php if (get_field('script_header', 'option')) {
        echo get_field('script_header', 'option');
    } ?>
</head>

<body <?php body_class(); ?>>
    <?php if (get_field('script_body', 'option')) {
        echo get_field('script_body', 'option');
    } ?>

    <?php get_template_part('sections/menu-main'); ?>