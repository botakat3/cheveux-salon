<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */



$query = new WP_Query([
	'post_type' => 'stylist',
	'orderby' => 'title',
	'order' => 'ASC',
])

?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<!-- The loop -->
	<?php
	while ( $query->have_posts() ) :
	$query->the_post();
	?>
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<?= get_the_post_thumbnail() ?>
			</div>
			<div class="flip-card-back p-5" style="background-color: <?= $attributes['cardColor']?>">
				<h3 class="name" style="color: <?= $attributes['headingColor']?>"><?= get_the_title() ?></h3>
				<div class="position" style="color: <?= $attributes['textColor']?>"><?= get_post_meta(get_the_ID(), 'position', true) ?></div>

				<a href="<?php echo esc_url( get_permalink() ); ?>"
				   class="btn btn-primary rounded-pill w-100 mt-2">
					View Profile
				</a>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>
