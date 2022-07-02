<?php 
/* Template Name: Homepage */ 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
};
global $post;
get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col col-12">
				<?php the_breadcrumb(); ?>
			</div>
		</div>
	</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col col-12">
					<?php while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<div class="container">
	<div class="row">
		<div class="col col-12 col-lg-6 mb-4 mb-lg-0">
			<div class="leftside">
				<h2 class="title orange">CONTACT US</h2>
				<?php echo do_shortcode( '[contact-form-7 id="14" title="Contact form"]' ); ?>
			</div>
		</div>
		<div class="col col-12 col-lg-6">
			<div class="rightside">
				<h2 class="title orange">REACH US</h2>
				<?php echo do_shortcode( '[ct_social]' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>