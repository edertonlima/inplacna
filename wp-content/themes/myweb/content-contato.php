<section class="box-content contato cinza">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2>Contact</h2>

				<?php 
					$contact = get_page_by_path('contact'); 
					$content = apply_filters( 'the_content', $contact->post_content ); 
				?>
				<div class="center"><?php echo $content; ?></div>

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

				<div class="form-contato">
					<p>How can we help you?</p>
					<form action="javascript:" class="contato">
						<fieldset>
							<input type="text" name="nome" id="nome" placeholder="Nome:">
						</fieldset>

						<fieldset>
							<input type="text" name="email" id="email" placeholder="Email:">
						</fieldset>

						<fieldset>
							<textarea name="mensagem" id="mensagem" placeholder="Mensagem:"></textarea>
						</fieldset>

						<fieldset class="center">
							<p class="msg-form"></p>
							<button class="button enviar">SEND</button>
						</fieldset>
					</form>						
				</div>
			</div>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function(){	  

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('SENDING').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name'); ?>';

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem').parent().addClass('erro');
			}

			if((nome == '') || (email == '') || (mensagem == '')){
				jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.').addClass('erro');
				jQuery('.enviar').html('SEND').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.contato').trigger("reset");
					jQuery('.enviar').html('SEND').prop( "disabled", false );
				});
			}
		});

		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
		
	});

</script>