<?php get_header(); ?>

<section class="box-content">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2 class="borda">Products</h2>
			</div>

			<div class="list-produtos">

				<?php
					$qtd_prod = 0;
					$args = array(
					    'taxonomy'      => 'products_taxonomy',
					    'parent'        => 0,
					    'orderby'       => 'name',
					    'order'         => 'ASC',
					    'hierarchical'  => 1,
					    'pad_counts'    => 0
					);
					$categories = get_categories( $args );
					foreach ( $categories as $categoria ){

						$field_cat = 'products_taxonomy_'.$categoria->term_taxonomy_id; ?>

						<a href="<?php echo get_term_link($categoria->term_id); ?>" class="col-6">
							<img src="<?php the_field('img_categoria', $field_cat); ?>" class="center">
							<h4><?php echo $categoria->name; ?></h4>
							<p class="justify-left"><?php echo $categoria->description; ?></p>
						</a>

					<?php }
				?>

			</div>
		</div>

	</div>
</section>

<?php get_template_part( 'content-contato' ); ?>

<?php get_footer(); ?>