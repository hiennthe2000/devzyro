<?php
function custom_breadcrumbs()
{
    $delimiter = ' / '; // Change delimiter if needed
    $home = 'Trang chủ'; // Text for the 'Home' link

    echo '<div class="breadcrumbs">';
    echo '<a class="home" href="' . home_url() . '">' . $home . $delimiter . '</a>';

    if (is_archive() || is_single()) {

        if (is_category()) {
            $categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => false,
            ));
            $page_news_id = get_page_by_path('news');
            $id = get_queried_object_id();
            $current_cate = get_category($id);
            $current_term = get_term($current_cate);
            if ($categories) {
                foreach ($categories as $category) {
                    if ($current_term->term_id == $category->term_id) {
                        $parent_id = $category->parent;
                        if ($parent_id) {
                            $parent_category = get_term($parent_id, 'category');
                            echo '<a href="' . get_category_link($parent_category->term_id) . '">' . $parent_category->name . $delimiter . '</a>';
                        }
                        echo '<a href="' . get_permalink($page_news_id) . '">' . 'Danh mục' . $delimiter . '</a>';
                        echo $category->name;
                    }
                }
            }
        } elseif (is_tag()) {
            $tags = get_tags();
            $id = get_queried_object_id();
            $page_news_tag = get_page_by_path('news');
            if ($tags) {
                foreach ($tags as $tag) {
                    if ($id == $tag->term_id) {
                        echo '<a href="' . get_permalink($page_news_tag) . '">' . 'Thẻ' . $delimiter . '</a>';
                        echo $tag->name;
                    }
                }
            }
        } else {
            $post_type = get_post_type();
            if ($post_type) {
                $post_type_object = get_post_type_object($post_type);
                if ($post_type_object) {
                    $post_type_name = $post_type_object->name;
                    if (is_single()) {
                        echo '<a href="' . get_post_type_archive_link($post_type) . '">' . 'Bài viết'. $delimiter . '</a>';
                    } else {
                        echo ucfirst($post_type_name);
                    }
                }
            }
        }

        if (is_single()) {
            if (is_post_type_archive()) {
                $post = get_post();
                if ($post) {
                    $post_type = get_post_type($post);
                    if ($post_type) {
                        $post_type_object = get_post_type_object($post_type);
                        if ($post_type_object) {
                            echo $post->post_title;
                        }
                    }
                }
            } else {
                echo 'Chi tiết';
            }
        }
    } elseif (is_category()) {
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ));
        $id = get_queried_object_id();
        $current_cate = get_category($id);
        $current_term = get_term($current_cate);
        if ($categories) {
            foreach ($categories as $category) {
                if ($current_term->term_id == $category->term_id) {
                    $parent_id = $category->parent;
                    if ($parent_id) {
                        $parent_category = get_term($parent_id, 'category');
                        echo '<a href="' . get_category_link($parent_category->term_id) . '">' . $parent_category->name . $delimiter . '</a>';
                    }
                    echo "Danh mục" . $delimiter . $category->name;
                }
            }
        }
    } elseif (is_tag()) {
        $tags = get_tags();
        $id = get_queried_object_id();
        if ($tags) {
            foreach ($tags as $tag) {
                if ($id == $tag->term_id) {
                    echo $tag->name;
                }
            }
        } elseif (is_search()) {
            echo 'Tìm kiếm cho "' . get_search_query() . '"';
        } elseif (is_404()) {
            echo 'Lỗi 404';
        }
    } elseif (is_page()) {
        echo get_the_title();
    } elseif (is_search()) {
        $page_news_id_2 = get_page_by_path('news');
        echo '<a href="' . get_permalink($page_news_id_2) . '">' . 'Từ khóa' . $delimiter . '</a>';
        echo get_search_query();
    }
    echo '</div>';
}