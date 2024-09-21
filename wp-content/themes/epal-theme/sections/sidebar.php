<div class="sidebar sidebar-scroll">
    <div class="widgets-container">
        <div class="recent-posts-widget widget-item">
            <h3 class="widget-title"><?php the_field('title_sidebar_post','option') ?></h3>
            <?php
            if(is_single()){
                $categories = wp_get_post_categories(get_the_ID());

if ($categories) {
$args = array(
'category__in'   => $categories, 
'post__not_in'   => array(get_the_ID()), 
'posts_per_page' => 6, 
'ignore_sticky_posts' => 1
);

$related_posts = new WP_Query($args);

if ($related_posts->have_posts()) {

while ($related_posts->have_posts()) {
$related_posts->the_post();
?>
            <div class="post-item">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <time datetime="<?php echo get_the_date('d/m/Y'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
            </div>
            <?php
}
} 
wp_reset_postdata();
} 
            }else{
                if( have_rows('post_home', 'option') ):
                    while( have_rows('post_home', 'option') ) : the_row();
                        $post = get_sub_field('post');
                        $post_link = get_permalink($post->ID);
                        $post_title = get_the_title($post->ID);
                        $current_time = current_time( 'd-m-Y' );
                        ?>
            <div class="post-item">
                <h4><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a></h4>
                <time datetime="<?php echo $current_time ?>"><?php echo $current_time ?></time>
            </div>
            <?php
                    endwhile;
                endif;
            }
?>
        </div>
        <div class="categories-widget widget-item">

            <h3 class="widget-title"><?php the_field('title_sidebar_cate', 'option') ?></h3>
            <ul class="mt-3">
                <?php
$categories = get_categories();
if ( ! empty( $categories ) ) {
foreach ( $categories as $category ) {
    // Hiển thị tên chuyên mục
    if ( $category->slug == 'uncategorized' || $category->term_id == 1 ) {
        continue;
    }
?>
                <li><a href="<?php echo get_category_link( $category->term_id ) ?>">
                        <?php echo $category->name ?></a></li>
                <?php
}
}
?>
            </ul>

        </div>
    </div>

</div>