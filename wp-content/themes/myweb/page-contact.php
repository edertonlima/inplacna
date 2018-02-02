<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content cinza contato-page">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2 class="borda"><?php the_title(); ?></h2>

						<div class="col-6 center">
							<?php the_content(); ?>
						</div>
					</div>

					<div class="col-6">
						<form action="javascript:" class="row contato">
							<fieldset class="col-12">
								<input type="text" name="nome" id="nome" placeholder="Nome:">
							</fieldset>

							<fieldset class="col-12">
								<input type="text" name="email" id="email" placeholder="Email:">
							</fieldset>

							<fieldset class="col-6">
								<input type="text" name="fone" id="fone" placeholder="Fone:">
							</fieldset>

							<fieldset class="col-6 col-clear">
								<input type="text" name="state" id="state" placeholder="State:">
							</fieldset>

							<fieldset class="col-6">
								<input type="text" name="city" id="city" placeholder="City:">
							</fieldset>

							<fieldset class="col-12">
								<textarea name="mensagem" id="mensagem" placeholder="Mensagem:"></textarea>
							</fieldset>

							<fieldset class="col-12 center">
								<p class="msg-form"></p>
								<button class="button enviar enviar-contato">SEND</button>
							</fieldset>
						</form>	
					</div>

					<div class="col-6">
						<?php if(get_field('google_maps','option')){ ?>
							<div class="iframe"><?php the_field('google_maps','option'); ?></div>
						<?php }else{
							if(get_field('imagem_mapa','option')){ ?>
								<img src="<?php the_field('imagem_mapa','option') ?>" class="img-map">
							<?php } 
						} ?>

						<?php if(get_field('endereco','option')){ ?>
							<span class="endereco">
								<?php the_field('endereco','option'); ?>
							</span>	
						<?php } ?>

						<div class="box-info-contato">
							<div class="info-contato info-tel">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-cel.png">
								<div class="item">
									<span>Call Us</span>
									<?php if(get_field('telefone_1','option')){ ?>
										<span class="det-item"><?php the_field('telefone_1','option'); ?></span>
									<?php } ?>

									<?php if(get_field('telefone_2','option')){ ?>
										<span class="det-item"><?php the_field('telefone_2','option'); ?></span>
									<?php } ?>
								</div>
							</div>

							<div class="info-contato info-email">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-envelope.png">
								<div class="item">
									<span>Write us</span>
									<span class="det-item"><a href="mailto:<?php the_field('email','option'); ?>"><?php the_field('email','option'); ?></a></span>
								</div>
							</div>
						</div>	
					</div>
				</div>

			</div>
		</section>

		<section class="box-content no-padding-top cinza contato-page curriculo">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2>Work with us</h2>
						
						<p class="center cinza">If you want to be part of our team<br>please send us your resume.</p>
					</div>

					<div class="col-3">&nbsp;</div>
					<div class="col-6">
						<form action="javascript:" class="row curriculo">
							<fieldset class="col-12">
								<input type="text" name="nome" id="nome" placeholder="Nome:">
							</fieldset>

							<fieldset class="col-12">
								<input type="text" name="email" id="email" placeholder="Email:">
							</fieldset>

							<fieldset class="col-6">
								<input type="text" name="fone" id="fone" placeholder="Fone:">
							</fieldset>

							<fieldset class="col-6 col-clear">
								<input type="text" name="state" id="state" placeholder="State:">
							</fieldset>

							<fieldset class="col-6">
								<input type="text" name="city" id="city" placeholder="City:">
							</fieldset>

							<fieldset class="col-12 center">
								<p class="msg-form"></p>
								<button class="button enviar enviar-contato">SEND</button>
							</fieldset>
						</form>	
					</div>
					<div class="col-3">&nbsp;</div>

				</div>

			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>