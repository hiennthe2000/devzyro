<?php

/**
 * Template Name: Trang Chủ
 */

get_header();
get_template_part('sections/home/banner');
?>
<div class="container">
    <div class="box-home">
        <div class="content-scroll">
            <?php
    get_template_part('sections/home/service');
    get_template_part('sections/home/blog');
    ?>
        </div>
        <?php get_template_part('sections/sidebar') ?>
    </div>
</div>
<?php
get_footer();