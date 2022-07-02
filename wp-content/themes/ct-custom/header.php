<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col col-8 align-self-center">
						<span class="brown me-2">Call us now!</span>
						<a class="white" href="tel:<?php echo esc_html( ct_custom_get_theme_option( 'phone_number' ) );?>">
							<?php echo esc_html( ct_custom_get_theme_option( 'phone_number' ) ); ?>
						</a>
					</div>
					<div class="col col-4 align-self-center">
						<div class="d-flex justify-content-end">
							<a href="/" class="brown me-2">LOGIN</a><a href="/" class="white">SIGNUP</a>
						</div>						
					</div>
				</div>
				
			</div>
		</div><!-- .topbar -->
		<div class="site-branding">
			<div class="container">
				<div class="row">
					<div class="col col-6 align-self-center">
						<?php
						$blogname = explode( " ", get_bloginfo('name') );			
						//COLORIZE FIRST WORD OR HALF WORD IN LOGO
						if (has_custom_logo()):
							the_custom_logo();
						elseif ( is_front_page() && is_home() ): ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title">
								<h1>
									<span class="dark"><?php echo esc_html( $blogname[0] ); ?></span>
									<span class="orange"><?php echo esc_html( $blogname[1] ); ?></span>
								</h1>
							</a>
						<?php else: ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title">
								<span class="dark"><?php echo esc_html( $blogname[0] ); ?></span>
								<span class="orange"><?php echo esc_html( $blogname[1] ); ?></span>
							</a>
						<?php endif; ?>
					</div>
					<div class="col col-6 align-self-center">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ct-custom' ); ?></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->
					</div>				
				</div>
			</div>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->
