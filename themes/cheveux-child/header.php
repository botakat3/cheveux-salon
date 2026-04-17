<?php
/**
 * Header template for Cheveux Child
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<header class="cheveux-header">
		<div class="cheveux-header__inner container-fluid">
			<div class="cheveux-header__brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cheveux-header__logo">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div>

			<nav class="cheveux-header__nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'cheveux-child' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'cheveux-menu',
					'fallback_cb'    => false,
				) );
				?>
			</nav>

			<div class="cheveux-header__cta">
				<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cheveux-header__button">
					Book Now
				</a>
			</div>
		</div>
	</header>
