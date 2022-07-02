<?php
/**
 * The template for Woocoomerce
**/
get_header(); 
global $dumketo;
$pageID = get_the_ID();
$page = get_post($pageID);
$title = $page->post_name; ?>
    <section class="inner-product-section py-5">
        <?php if( is_shop() ) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="woocommerce site-main">
                            <?php if ( have_posts() ) : 
                                woocommerce_content(); 
                            endif; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="woocommerce">
                            <?php if ( have_posts() ) : 
                                woocommerce_content(); 
                            endif; wp_reset_postdata();  ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>                   
    </section>
<?php get_footer(); ?>