<section id="hero" class="hero section dark-background">
    <div class="overlay-item"></div>
    <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
        <?php
if( have_rows('post_banner_home') ):
    while( have_rows('post_banner_home') ) : the_row();
        $post_item = get_sub_field('post_item');
        $title = wp_trim_words($post_item->post_title, 5, ''); 
        $content = wp_trim_words($post_item->post_excerpt, 38, '...'); 
        $link = get_permalink($post_item->ID);
    ?>
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown title"><?php echo $title; ?></h2>
                <div class="animate__animated animate__fadeInUp content"><?php echo $content; ?></div>
                <a href="<?php echo $link ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Xem
                    thêm</a>
            </div>
        </div>
        <?php
    endwhile;
endif;
?>
        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24"
                width="512" height="512" fill="#fff">
                <path
                    d="M16.041,24,6.534,14.48a3.507,3.507,0,0,1,0-4.948L16.052,0,18.17,2.121,8.652,11.652a.5.5,0,0,0,0,.707l9.506,9.52Z" />
            </svg>

        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24"
                width="512" height="512" fill="#fff">
                <path
                    d="M8.127,24l9.507-9.52a3.507,3.507,0,0,0,0-4.948L8.116,0,6,2.121l9.518,9.531a.5.5,0,0,1,0,.707L6.01,21.879Z" />
            </svg>

        </a>

    </div>
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
    </svg>
</section>