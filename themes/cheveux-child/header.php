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
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>


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
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'navbar-nav cheveux-navbar-nav ms-lg-auto',
						'fallback_cb'    => false,
					) );
					?>

					<?php $booking_url = get_theme_mod( 'cheveux_booking_url' ); ?>

					<?php if ( $booking_url ) : ?>
						<a
							href="<?php echo esc_url( $booking_url ); ?>"
							class="text-decoration-none cheveux-book-btn ms-lg-4 mt-4 mt-lg-0 m w"
							rel="noopener noreferrer"
						>
							Book Now
						</a>
					<?php endif; ?>

					<a href="<?php echo is_user_logged_in()
						? esc_url( home_url( '/my-hair-dashboard' ) )
						: esc_url( home_url( '/login' ) ); ?>"
					   class="text-decoration-none cheveux-book-btn ms-lg-4 mt-2 mt-lg-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
							<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
						</svg>
					</a>
				</div>

			</div>
		</nav>
	</header>
