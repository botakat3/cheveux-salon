<?php
/**
 * Header template
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

	<header class="cheveux-header px-lg-5 sticky-top">
		<nav class="navbar navbar-dark navbar-expand-lg p-0">
			<div class="container-fluid cheveux-navbar-container d-flex align-items-center justify-content-between">
				<a class="navbar-brand cheveux-navbar-brand mb-0" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</a>

				<button
					class="navbar-toggler border-0 shadow-none"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#primaryNavbar"
					aria-controls="primaryNavbar"
					aria-expanded="false"
					aria-label="<?php esc_attr_e( 'Toggle navigation', 'cheveux-child' ); ?>"
				>
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse mt-3 mt-lg-0" id="primaryNavbar">
					<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center ms-lg-auto justify-content-lg-end w-100">
						<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'navbar-nav d-flex align-items-lg-center gap-lg-4 gap-3 ms-auto cheveux-navbar-nav',
						'fallback_cb'    => false,
					) );
					?>

					<a href="<?php echo esc_url( home_url( '/book' ) ); ?>" class="text-decoration-none cheveux-book-btn ms-lg-4 mt-3 mt-lg-0 mx-lg-4">
						Book
					</a>
				</div>

			</div>
		</nav>
	</header>
