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
	'post_type' => 'project',
	'orderby' => 'title',
	'order' => 'ASC',
]);


?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="row row-cols-1 row-cols-md-2 g-4">

	<!-- The loop -->
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		?>
	<div class="col">
		<div class="card" style="width: 18rem;">
			<div class="card-img" >
				<?php
				$image_url = get_field('thumbnail', get_the_ID());

				if ($image_url) : ?>
					<img
						src="<?php echo esc_url($image_url); ?>"
						class="project-image img-fluid"
						alt="<?php echo esc_attr(get_the_title()); ?>"
					>
				<?php endif; ?>			</div>
			<div class="card-body">
				<h2 class="card-title"><?= get_the_title() ?></h2>
<!--				<p class="card-text">--><?php //= get_the_content() ?><!--</p>-->
				<div class="tools-section">
					<p>Tools Used</p>
					<div class="tools-list ">
						<?php
						$tools = get_post_meta(get_the_ID(), 'tools', true);

						if (!empty($tools) && is_array($tools)) {
							foreach ($tools as $tool) {
								echo '<span class="tool-pill">' . esc_html($tool) . '</span> ';
							}
						}
						?>
					</div>
				</div>
				<a href=<?php the_permalink(); ?> class="btn btn-primary rounded-pill w-100">View Project!</a>
			</div>
		</div>
	</div>

	<?php endwhile; ?>
	</div>
</div>
