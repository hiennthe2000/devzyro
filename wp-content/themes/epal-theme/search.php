<?php
 get_header();
 $id = get_queried_object_id(); 
?>

<div class="blog-page">
    <main class="main">
        <div class="page-title dark-background">
            <div class="container position-relative">
                <h1>Tìm kiếm</h1>
                <p><?php custom_breadcrumbs(); ?></p>
            </div>
        </div>
        <section id="blog-posts" class="blog-posts section">
            <div class="container">
                <div class="row box-home">
                    <div class="content-scroll">
                        <div class="row gy-4">
                            <?php
            $s = get_search_query();
            $args = array(
                's' => $s,
                'post_type' => 'post',
                'posts_per_page' => -1, 
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                            <div class="col-sm-6 col-6 mt-4">
                                <article class="cate">
                                    <div class="post-img">
                                        <?php if (has_post_thumbnail()) { ?>
                                        <a
                                            href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?></a>
                                        <?php } ?>
                                    </div>
                                    <h2 class="title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="d-flex align-items-center">
                                        <p class="post-date">
                                            <?php echo wp_trim_words(get_the_excerpt(), 23, '...'); ?>
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo __('Không có bài viết.', 'text-domain');
            endif;
            ?>
                        </div>
                    </div>
                    <?php get_template_part('sections/sidebar') ?>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>