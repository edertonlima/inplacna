<?php get_header(); ?>

<!-- slide -->
<section class="box-content no-padding">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();
						$slide = $slide+1;

						if(get_sub_field('video')){ ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video'); ?>" type="video/mp4">
								</video>
							</div>

						<?php }else{

							if(get_sub_field('imagem')){ ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<div class="box-height">
										<div class="box-texto">
											
											<p class="texto"><?php the_sub_field('texto'); ?></p>
											<?php if(get_sub_field('sub_texto')){ ?>
												<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
											<?php } ?>

										</div>
									</div>
									
								</div>

							<?php }

						}
					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>
	</div>
</section>

<section class="box-content">
	<div class="container">
		
		<div class="row">
			<div class="col-8">
				<p class="destaque">Are you looking for the best packaging solution for your products?</p>
			</div>
			<div class="col-4">
				<a href="javascript:" class="button contato-home">Contact us</a>
			</div>
		</div>

	</div>
</section>

<section class="box-content azul">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2>About Us</h2>
				<p class="destaque-mini">Leader in the plastic valve bag market, Inplac offers a variety of flexible packaging solutions for your company.<br><br>Inplac is well known for both technological innovation and services, various winning products and processes have been developed in a pioneering fashion. That is how the company grew and maintains a high level of development.</p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-sobre.png" class="center">
			</div>
		</div>

	</div>
</section>

<section class="box-content">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2>Products</h2>
			</div>
		</div>

	</div>
</section>

<section class="box-content verde">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2>Markets</h2>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>