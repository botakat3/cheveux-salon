<?php
get_header();
?>

	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/page', 'header' ); ?>

			<section class="cheveux-page-content py-5">
				<div class="container">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</section>

		<?php
		endwhile;
		?>
	</main>

<?php
get_footer();
