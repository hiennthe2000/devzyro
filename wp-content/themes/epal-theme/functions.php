<?php
/*
*  GLOBAL VARIABLES
*/

define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_URL', get_stylesheet_directory_uri() );
add_editor_style( 'css/button-web.css' );
/*
*  INCLUDED FILES
*/

$file_includes = [
    'inc/theme-assets.php',
    'inc/theme-setup.php',
    'inc/acf-options.php',
    'inc/theme-short-code.php',
    'inc/button-editor.php',
    'inc/theme-config.php',
    'inc/theme-login.php',
    'inc/custom-breadcumb.php'

];

foreach ( $file_includes as $file ) {
    if ( !$filePath = locate_template( $file ) ) {
        trigger_error( sprintf( __( 'Missing included file' ), $file ), E_USER_ERROR );
    }

    require_once $filePath;
}

unset( $file, $filePath );

//tự động gọi tiêu đề hình ảnh thay thế cho alt của hình ảnh khi người dùng không nhập alt

function auto_generate_alt_text( $content )
 {
    // Kiểm tra xem nếu đang ở trong bài viết hoặc trang đang hiển thị
    if ( is_singular() && in_the_loop() ) {
        // Lặp qua tất cả các hình ảnh trong nội dung bài viết hoặc trang
        $pattern = '/<img(.*?)alt=["\' ]( .*? )[ "\'](.*?)>/i';
        $content = preg_replace_callback($pattern, 'auto_set_alt_text', $content);
    }
    return $content;
}

function auto_set_alt_text($matches)
{
    // Lấy tiêu đề của hình ảnh từ thuộc tính 'title'
    $title = get_the_title();

    // Nếu không tìm thấy tiêu đề, thì sử dụng một giá trị mặc định hoặc trả về alt ban đầu
    $alt = $title ? $title : $matches[2];

    // Xây dựng lại thẻ hình ảnh với alt được cung cấp
    $new_img = '<img' . $matches[1] . 'alt="' . esc_attr($alt) . '"' . $matches[3] . '>';

    return $new_img;
}

add_filter('the_content', 'auto_generate_alt_text' );

function modify_query( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        // Phân trang cho category
        if ( $query->is_category() ) {
            $query->set( 'posts_per_page', 1 ); // Số bài viết mỗi trang cho category
        }
        
        // Phân trang cho tag
        if ( $query->is_tag() ) {
            $query->set( 'posts_per_page', 1 ); // Số bài viết mỗi trang cho tag
        }

        // Phân trang cho tìm kiếm (search.php)
        if ( $query->is_search() ) {
            $query->set( 'posts_per_page', 2 ); // Số bài viết mỗi trang cho trang tìm kiếm
        }

        // Thiết lập phân trang chung
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $query->set( 'paged', $paged ); // Phân trang cho tất cả
    }
}
add_action( 'pre_get_posts', 'modify_query' );