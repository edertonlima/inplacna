<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

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

								$terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' );
								$field_cat = 'products_taxonomy_'.$categoria->term_taxonomy_id;

								foreach( $terms as $term ){
									if($term->name == $categoria->name){
										$class_term = 'active';
									}
								} ?>

								<a href="<?php echo get_term_link($categoria->term_id); ?>" class="<?php echo $class_term; ?>">
									<img src="<?php the_field('imagem_menu', $field_cat); ?>" class="center">
									<?php echo $categoria->name; ?>
								</a>

								<?php $class_term = '';
							}
						?>
				</div>

			</div>
		</section>

		<section class="box-content">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2 class="borda"><?php the_title(); ?></h2>

						<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
						<?php if($imagem[0]){ ?>
							<img src="<?php echo $imagem[0]; ?>" class="center">
						<?php } ?>

						<?php $galeria = get_field('galeria');
							if( $galeria ):
								foreach( $galeria as $imagem ): ?>
								<img src="<?php echo $imagem['url']; ?>"/>
							<?php endforeach; ?>
						<?php endif; ?>

						<div class="cont-prod justify-left">
							<?php the_content(); ?>
						</div>

					</div>
				</div>

			</div>
		</section>

	<?php endwhile;
	wp_reset_query(); ?>

<?php get_template_part( 'content-contato' ); ?>

<?php get_footer(); ?>