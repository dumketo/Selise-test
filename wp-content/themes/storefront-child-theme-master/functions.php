<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
**/
function add_google_fonts() {
wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Bungee&family=Poppins:wght@300;400;500;600;700;800&display=swap', false );}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

function dumketo_css() {
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', 'all');
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css', 'all');
    wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/responsive.css', 'all');
}
add_action( 'wp_enqueue_scripts', 'dumketo_css' );

function dumketo_js() {
    $js_path = esc_url( get_stylesheet_directory_uri() . '/assets/js/' );
    $deps = array( 'jquery' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', $js_path . 'bootstrap.js', $deps, '', true );
    wp_enqueue_script( 'custom', $js_path . 'custom.js', $deps, '', true );
}
add_action( "wp_enqueue_scripts", "dumketo_js" );

add_action( 'widgets_init', 'dumketo_widgets_init' );
function dumketo_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Page', 'dumketo' ),
        'id'            => 'sidebar-page',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}

/**
 * Remove Breadcrumbs
 */
add_action( 'init', 'storefront_remove_storefront_breadcrumbs' );
function storefront_remove_storefront_breadcrumbs() {
   remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}

add_filter( 'woocommerce_product_tabs', 'njengah_new_product_tab' );
 
function njengah_new_product_tab( $tabs ) {
    $tabs['test_tab'] = array( 
        'title'    => __( 'Technical Specifications', 'woocommerce' ), 
        'priority' => 20, 
        'callback' => 'dumketo_new_product_tab_content' 
    );
    return $tabs;
}
 
function dumketo_new_product_tab_content() {
    $prod_id = get_the_ID();
    echo'<p>'.the_field('technical_specifications').'</p>';
}

add_filter( 'woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999 );
 
function bbloomer_change_number_related_products( $args ) {
 $args['posts_per_page'] = 4;
 $args['columns'] = 4;
 return $args;
}

// add_action( 'woocommerce_review_order_after_submit', 'add_after_checkout_button' );
// function add_after_checkout_button() {
//     echo '<p class="mt-1 mb-1 d-block w-100" style="font-size: 15px;text-align: center;"><strong>Delivery Time: </strong> (1-3 Days)</p>';
// }