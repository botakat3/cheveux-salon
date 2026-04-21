<?php
/**
 * Single Stylist Template
 *
 * @package UnderStrap
 */

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

// ACF fields or custom fields
$position        = get_field( 'position' );
$services = get_field( 'services' );
$tags      = get_field( 'tags' );
$coffee   = get_field( 'coffee' );
$playlist        = get_field( 'playlist' );
$products   = get_field( 'products' );
?>

	<div class="wrapper" id="single-stylist-wrapper">
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">

				<div class="col-md-12 content-area" id="primary">
					<main class="site-main" id="main">


						<?php while ( have_posts() ) : the_post(); ?>

							<article <?php post_class( 'stylist-profile py-5' ); ?> id="post-<?php the_ID(); ?>">
								<nav class="breadcrumbs mb-3">

									<a href="<?php echo esc_url( home_url( '/stylist-directory/' ) ); ?>">
										Stylists
									</a>
									<span>›</span>

									<span><?php the_title(); ?></span>
								</nav>

								<div class="row g-5 align-items-start">

									<div class="col-lg-5">
										<div class="stylist-image-wrapper mb-4">
											<?php if ( has_post_thumbnail() ) : ?>
												<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded-4 w-100 stylist-main-image' ) ); ?>
											<?php endif; ?>
										</div>
									</div>

									<div class="col-lg-7 ps-4">
										<header class="entry-header mb-4">
											<h1 class="entry-title stylist-name"><?php the_title(); ?></h1>

											<?php if ( $position ) : ?>
												<p class="stylist-position mb-3">
													<?php echo esc_html( $position ); ?>
												</p>
											<?php endif; ?>
										</header>

										<?php if ( get_the_content() ) : ?>
											<div class="stylist-section mb-4">
												<h3>About Me</h3>
												<div class="entry-content">
													<?php the_content(); ?>
												</div>
											</div>
										<?php endif; ?>
										<?php foreach ( $tags as $tag ) :
											$hashtag = '#' . (preg_replace('/\s+/', '', $tag));
											?>
											<span class="stylist-tag badge rounded-pill"> <?php echo esc_html( $hashtag ); ?> </span>
										<?php endforeach; ?>

										<div class="mt-4">
											<h4>Quick Favorites</h4>
											<div class="row g-4 mb-4 mt-2">
												<?php if ( $services ) : ?>
													<div class="col-md-6">
														<div class="quick-fact-card p-3 rounded-4 h-100">
															<h5>Favorite Service</h5>
															<p class="mb-0"><?php echo esc_html( $services ); ?></p>
														</div>
													</div>
												<?php endif; ?>
												<?php if ( $products ) : ?>
													<div class="col-md-6">
														<div class="quick-fact-card p-3 rounded-4 h-100">
															<h5>Go To Product</h5>
															<p class="mb-0"><?php echo esc_html( $products ); ?></p>
														</div>
													</div>
												<?php endif; ?>
												<?php if ( $coffee ) : ?>
													<div class="col-md-6">
														<div class="quick-fact-card p-3 rounded-4 h-100">
															<h5>Coffee Order</h5>
															<p class="mb-0"><?php echo esc_html( $coffee ); ?></p>
														</div>
													</div>
												<?php endif; ?>

												<?php if ( $playlist ) : ?>
													<div class="col-md-6">
														<div class="quick-fact-card p-3 rounded-4 h-100">
															<h5>Salon Playlist</h5>
															<p class="mb-0"><?php echo esc_html( $playlist ); ?></p>
														</div>
													</div>
												<?php endif; ?>

											</div>

										</div>

									</div>
								</div>

							</article>

						<?php endwhile; ?>

					</main>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
