<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content cinza page">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2><?php the_title(); ?></h2>
						<div class="destaque-mini"><?php the_content(); ?></div>
						<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($id->ID), '' ); ?>
						<img src="<?php echo $imagem[0]; ?>" class="center img-top-50">
					</div>
				</div>

			</div>
		</section>

		<?php if(have_rows('quality')): ?>
			<section class="box-content page">
				<div class="container">
					
					<div class="row">
						<div class="col-12">
							<h2>Quality</h2>
							
							<ul class="quality">

								<?php while ( have_rows('quality') ) : the_row(); ?>

									<li>
										<img src="<?php the_sub_field('imagem'); ?>" class="center">
										<?php the_sub_field('texto'); ?>
									</li>

								<?php endwhile; ?>

							</ul>
						</div>
					</div>

				</div>
			</section>		
		<?php endif; ?>

	<?php endwhile; ?>

<?php get_footer(); ?>
