<footer id="footer" class="footer dark-background">
    <div class="container">
        <?php
         $logo_footer = get_field('logo_footer', 'option');
         $address_footer = get_field('address_footer', 'option'); 
         $content_copyright = get_field('content_copyright', 'option'); 
         $footer_author = get_field('footer_author', 'option'); 
         ?>
        <h3 class="sitename"><img src="<?php echo $logo_footer['url'] ?>" alt=""></h3>
        <p><?php echo $address_footer ?></p>
        <div class="social-links d-flex justify-content-center">
            <?php
            $categories = get_categories();
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    // Hiển thị tên chuyên mục
                    if ( $category->slug == 'uncategorized' || $category->term_id == 1 ) {
                        continue;
                    }
            ?>
            <a href="<?php echo get_category_link( $category->term_id ) ?>">
                <?php echo $category->name ?>
            </a>
            <?php
                }
            }
            ?>
        </div>
        <div class="container">
            <div class="copyright">
                <span><?php echo $content_copyright ?></span>
            </div>
            <div class="credits">
                Designed by <a href="/"><?php echo $footer_author ?></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
<script>
AOS.init();
</script>
</body>

</html>