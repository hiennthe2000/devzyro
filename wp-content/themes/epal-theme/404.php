<?php

/**
 * template name: Lỗi 404
 */

get_header();
?>
<section id="error">
    <div class="container">
        <div class="error_title">
            <img src="<?php echo get_template_directory_uri() . '/images/404_devzyro.jpg' ?>">
            <p>Xin lỗi! Không tìm thấy đường dẫn.</p>
        </div>
        <div class="error_bottom">
            <a href="<?php echo get_home_url() ?>">QUAY LẠI TRANG CHỦ</a>
        </div>
    </div>
</section>
<?php get_footer() ?>