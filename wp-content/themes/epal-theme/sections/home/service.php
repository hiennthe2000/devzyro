 <section id="services" class="services section">
     <div class="container section-title">
         <h2>Category</h2>
         <h1 class="title-h1"><?php the_field('title_cate_home') ?></h1>
     </div>
     <div class="row gy-4">
         <?php
                $categories = get_categories();
                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $category ) {
                        if ( $category->slug == 'uncategorized' || $category->term_id == 1 ) {
                            continue;
                        }
                ?>
         <div class="col-md-6 col-sm-6 col-6 mt-4">
             <div class="service-item  position-relative">
                 <?php
                        $img_category = get_field('img_category', 'category_' . $category->term_id);
                        if ( $img_category ) {
                            ?>
                 <div class="icon">
                     <img src="<?php echo $img_category['url'] ?>" alt="logo danh muc devzyro">
                 </div>
                 <?php
                        }
                                            ?>
                 <a href="<?php echo get_category_link( $category->term_id ) ?>" class="stretched-link">
                     <h3><?php echo $category->name ?></h3>
                 </a>
                 <?php
                        if ( ! empty( $category->description ) ) {
                            ?>
                 <p class="content-description"><?php echo wp_trim_words( $category->description, 25, '' );?></p>
                 <?php
                        }
                     ?>

             </div>
         </div>
         <?php
    }
}
?>
     </div>
 </section>