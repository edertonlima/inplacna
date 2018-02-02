<?php get_header(); ?>

<section class="box-content no-padding">
	<div class="container">

		<div class="list-cat">
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

						<a href="<?php echo get_term_link($categoria->term_id); ?>" class="<?php if(single_term_title('',false) ==  $categoria->name){ echo "active"; } ?>">
							<img src="<?php the_field('imagem_menu', $field_cat); ?>" class="center">
							<?php echo $categoria->name; ?>
						</a>

					<?php }
				?>
		</div>

	</div>
</section>

<section class="box-content">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2 class="borda"><?php single_term_title(); ?></h2>
			</div>

			<div class="list-produtos">

				<?php
					query_posts(
						array(
							'post_type' => 'products',
							'tag' => get_queried_object()->slug,
							'posts_per_page' => -1
						)
					);
					while ( have_posts() ) : the_post();

						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

						<a href="<?php the_permalink(); ?>" class="col-6">
							<?php if($imagem[0]){ ?>
								<img src="<?php echo $imagem[0]; ?>" class="center">
							<?php } ?>

							<h4><?php the_title(); ?></h4>
							<p class="justify-left"><?php the_excerpt(); ?></p>
						</a>

					<?php endwhile;
					wp_reset_query();
				?>

			</div>
		</div>

	</div>
</section>

<?php get_template_part( 'content-contato' ); ?>

<?php get_footer(); ?>