 <section id="recent-posts" class="recent-posts section">
     <div class="container section-title">
         <h2>Posts</h2>
         <p><?php the_field('title_post_home') ?><br></p>
     </div>
     <div class="container">
         <div class="row gy-4">
             <?php
$query = new WP_Query( array(
    'posts_per_page' => 12,
    'post_status'    => 'publish'
) );
if ( $query->have_posts() ) : 
    while ( $query->have_posts() ) : $query->the_post(); ?>
             <div class="col-12 box-recent">
                 <article>
                     <h2 class="title">
                         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     </h2>


                     <div class="row">
                         <div class="col-sm-5 col-12">
                             <?php if ( has_post_thumbnail() ) : ?>
                             <a href="<?php the_permalink(); ?>">
                                 <div class="post-img">
                                     <?php the_post_thumbnail('medium'); ?>
                                 </div>
                             </a>
                             <?php endif; ?>

                         </div>
                         <div class="col-sm-7 col-12">
                             <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $category ) {
                        if ( $category->slug == 'uncategorized' || $category->term_id == 1 ) {
                            continue;
                        }
                        ?>
                             <a href="<?php echo  get_category_link( $category->term_id ) ?>">
                                 <p class="post-category"><?php echo $category->name ?></p>
                             </a>
                             <?php  
                    }
                }
                ?>
                             <div class="d-flex align-items-center mb-3">
                                 <p class="post-date">
                                     <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                 </p>
                             </div>
                             <a class="btn-more" href="<?php the_permalink(); ?>">Xem thêm</a>
                         </div>
                     </div>
                 </article>
             </div>
             <?php endwhile; 
    wp_reset_postdata();
endif;
?>
         </div>
     </div>
 </section>