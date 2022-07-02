<?php
/**
 * The template for displaying all pages
**/
get_header(); 
global $dumketo;
$pageID = get_the_ID();
$page = get_post($pageID);
$title = $page->post_name; ?> 
    <section class="position-relative inner-content-section inner-padding py-5 hentry">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 entry-content">
                    <?php
                    while ( have_posts() ) : the_post(); 
                        the_content();
                    endwhile; wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </section>
    
	<?php
    /**
     *
     * @hooked dumketo_inner_footer_part  - 10
     *
    **/
    do_action( 'dumketo_inner_footer_part', $title ); 
    ?>

<?php get_footer(); ?>