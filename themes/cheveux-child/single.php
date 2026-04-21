<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<section class="hair-post w-100">
		<div class="container-fluid px-lg-5 py-5">

			<div class="row justify-content-center">
				<div class="col-xl-10">

					<header class="hair-post__header">
						<p class="hair-post__eyebrow mb-3">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								echo esc_html( $categories[0]->name );
							} else {
								echo 'Hair Tips';
							}
							?>
						</p>

						<h1 class="hair-post__title mb-4"><?php the_title(); ?></h1>

						<div class="hair-post__meta d-flex flex-wrap gap-3 align-items-center">
							<span><?php echo get_the_date(); ?></span>
							<span>•</span>
							<span><?php the_author(); ?></span>
						</div>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="hair-post__featured-image my-5">
							<?php the_post_thumbnail( 'full' ); ?>
						</div>
					<?php endif; ?>

				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-8 col-xl-7">
					<article class="hair-post__content">
						<?php the_content(); ?>
					</article>

					<?php
					$post_tags = get_the_tags();
					if ( $post_tags ) :
						?>
						<div class="hair-post__tags mt-5">
							<h2 class="hair-post__tags-title mb-3">Tags</h2>
							<div class="d-flex flex-wrap gap-2">
								<?php foreach ( $post_tags as $tag ) : ?>
									<a class="hair-post__tag" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
										<?php echo esc_html( $tag->name ); ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="hair-post__back mt-5">
						<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="hair-post__back-link">
							← Back to Hair Tips
						</a>
					</div>
				</div>
			</div>

			<?php
			$related = new WP_Query( array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
				'post__not_in'   => array( get_the_ID() ),
				'category__in'   => wp_get_post_categories( get_the_ID() ),
			) );
			?>

			<?php if ( $related->have_posts() ) : ?>
				<section class="hair-post__related mt-6">
					<hr class="hair-post__divider">
					<div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
						<div>
							<p class="hair-post__eyebrow mb-2">MORE TO READ</p>
							<h2 class="hair-post__related-title mb-0">Related Posts</h2>
						</div>
					</div>

					<div class="row g-4">
						<?php while ( $related->have_posts() ) : $related->the_post(); ?>
							<div class="col-md-6 col-lg-4">
								<article class="blog-card blog-card--small h-100">
									<a href="<?php the_permalink(); ?>" class="blog-card__link text-decoration-none">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="blog-card__image blog-card__image--small">
												<?php the_post_thumbnail( 'medium_large' ); ?>
											</div>
										<?php endif; ?>

										<div class="blog-card__content">
											<p class="blog-card__meta mb-2">
												<?php
												$rel_categories = get_the_category();
												if ( ! empty( $rel_categories ) ) {
													echo esc_html( $rel_categories[0]->name );
												} else {
													echo 'Hair Tips';
												}
												?>
											</p>
											<h3 class="blog-card__title blog-card__title--small mb-0"><?php the_title(); ?></h3>
										</div>
									</a>
								</article>
							</div>
						<?php endwhile; ?>
					</div>

					<?php wp_reset_postdata(); ?>
				</section>
			<?php endif; ?>

		</div>
	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
