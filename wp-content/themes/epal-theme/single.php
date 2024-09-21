<!-- Hiển thị chi tiết bài viết -->
<?php
get_header();
?>
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Chi tiết</h1>
            <p><?php custom_breadcrumbs(); ?></p>
        </div>
    </div>
    <div class="container">
        <div class="row box-home">
            <div class="content-scroll">
                <section id="blog-details" class="blog-details section">

                    <article class="article">
                        <?php while (have_posts()) : the_post();
                ?>
                        <h2 class="title"><?php the_title() ?></h2>

                        <div class="meta-top">
                            <ul>
                                <li class="time d-flex align-items-center"><i class="bi bi-clock"></i> <time
                                        datetime="2020-01-01"><?php the_time('d-m-Y'); ?></time></a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                        <?php
                endwhile;  ?>
                    </article>

                </section><!-- /Blog Details Section -->
            </div>
            <?php get_template_part('sections/sidebar') ?>
        </div>
    </div>

</main>
<?php get_footer(); ?>