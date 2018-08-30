<div class="bg-popup">
	<div class="col-md-6 col-md-offset-3 popup">
		<h1>Cadastre seu e-mail</h1>
		<h2>E receba em breve novidades e promoções exclusivas das empresas!</h2>
		<input type="text" id="nome-cadastro" name="nome" value="" placeholder="NOME:">
		<input type="text" id="email-cadastro" name="email" value="" placeholder="E-MAIL:">
		<input type="submit" name="enviar" id="cadastro" value="CADASTRAR">
		<p class="result result2"></p>
	</div>
	<div class="col-md-6 col-md-offset-3 close-popup">
		<p>Fechar [ x ]</p>
	</div>
</div>
<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(http://listacampos.com.br/images/cadastrar-agora.jpg); background-size: 100%;">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<!--<div class="col-md-6 col-md-offset-3 col-md-push-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1>Campos do Jordão em suas mãos</h1>
										<h2>Veja todas as empresas</h2>
										<p><a class="btn btn-primary btn-demo" href="http://listacampos.com.br/home/categoria/">
										</i>Ver mais</a></p>
				   				</div>
				   			</div>-->
				   			<a href="http://listacampos.com.br/cadastre/" class="a-banner"></a>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(http://listacampos.com.br/uploads/banner-home.jpg);background-size: 100%;">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<!--<div class="col-md-6 col-md-offset-3 col-md-pull-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1>Encontre aqui tudo o que<br>você procura!</h1>
										<h2>Veja todas as categorias:</h2>
										<p><a class="btn btn-primary btn-demo" href="http://listacampos.com.br/home/categoria"></i>Ver todos</a></p>
				   				</div>
				   			</div>-->
				   		</div>
			   		</div>
			   	</li>
			   	<!--<li style="background-image: url(<?php echo IMAGES; ?>banner-2-1500-1000.jpeg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1>Lhotse Comunicação & Marketing</h1>
										<h2>A vista do cume de uma montanha ajuda muito a ampliar os conceitos!</h2>
										<p><a class="btn btn-primary btn-demo" href="#"></i>Veja mais</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>-->
			   	   	
			  	</ul>
		  	</div>
		</aside>
		

		<div id="fh5co-work" class="fh5co-light-grey">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading" style="margin-bottom: 20px;">
					<h1>DESTAQUES</h1>
					<p>Veja abaixo algumas empresas de destaque em Campos do Jordão!</p>
				</div>
			</div>
			<div class="row">
				<?php for ($i=0; $i < count($empresas) ; $i++) { ?>
				<div class="col-md-4 col-sm-6 text-center animate-box">
					<a href="<?php echo base_url('home/perfil/'.$empresas[$i]->url.''); ?>" class="work"  style="/*background-image: url(<?php echo IMAGES; ?>portfolio-1.jpg);*/">
						<div class="desc">
							<h4 class="see-all-info"> <i class="icon-plus"></i> Mais informações</h4>
						</div>
						<div class="icon-work">
							<?php if(isset($empresas[$i]->ft_miniatura)){ ?>
							<img src="http://listacampos.com.br/uploads/<?php echo $empresas[$i]->ft_miniatura; ?>">
							<?php }else{ ?>
							<img src="http://listacampos.com.br/uploads/padrao.jpg">
							<?php } ?>
						</div>
						<div class="info-work">
							<h4>
								<?php 
									$nome = $empresas[$i]->nome;
									if(strlen($empresas[$i]->nome)> 58)
										$nome = substr($empresas[$i]->nome, 0, 58)."...";
									
									echo $nome;
								?>	
							</h4>
							<p>
								<span class="icon-work-info"><i class="icon-location"></i></span>
								<span class="text-work-info">
								<?php

									$endereco = "";
									if($empresas[$i]->logradouro !="")
										$endereco = $empresas[$i]->logradouro.", ";
									if($empresas[$i]->numero !="")
										$endereco.= $empresas[$i]->numero.". ";
									if($empresas[$i]->bairro !="")
										$endereco.= $empresas[$i]->bairro;

									echo $endereco;
								?>		
								</span>
							</p>
							<?php $preencher = false; ?>
							
							<?php if($empresas[$i]->whatsapp != ""){ $preencher=true;?>
							<p>
								<span class="icon-work-info"><i class="icon-whatsapp"></i></span>
								<span class="text-work-info"><?php echo $empresas[$i]->whatsapp; ?></span>
							</p>

							<?php }else if($empresas[$i]->telefone != ""){ $preencher=true;?>
							<p>
								<span class="icon-work-info"><i class="icon-phone-hang-up"></i></span>
								<span class="text-work-info"><?php echo $empresas[$i]->telefone; ?></span>
							</p>
							
							<?php }else if($preencher== false){ ?>
							<p>
								<span class="icon-work-info"><i class="icon-bookmark"></i></span>
								<span class="text-work-info"><?php echo $empresas[$i]->codigo_categoria->categoria." > ".$empresas[$i]->codigo_subcategoria->subcategoria; ?></span>
							</p>
							<?php } ?>
						</div>
						
					</a>
				</div>

				<?php  } ?>
				

			</div>
			<div class="row animate-box">
				<div class="col-md-12">
					<a href="<?php echo base_url('home/categoria/'); ?>" class="see-all-cat">Ver todas as categorias</a>
				</div>
			</div>
		</div>

		<div id="fh5co-services">
			<div class="row">
				<div class="col-md-4 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-earth"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Completo</a></h3>
							<p>Aqui você encontra todas as empresas de Campos do Jordão em um só lugar.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-clipboard"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Informações</a></h3>
							<p>Veja todas as informações essenciais sobre as empresas com atualizações diárias.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-star-full"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Visual</a></h3>
							<p>Layout responsivo, com visual simples e moderno de fácil navegação.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="fh5co-services" style="background: #F6F9E3;">
		<div class="row">
			<div class="col-md-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-bookmark"></i>
					</span>
					<div class="desc">
						<h2><a href="#">Cadastre sua empresa é gratuito</a></h2>
						<p>Faça agora mesmo o cadastro da sua empresa, é 100% gratuito e promova sua marca na internet.</p>
						<a href="http://listacampos.com.br/cadastre/" class="btn-a">CADASTRAR EMPRESA</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-bookmarks"></i>
					</span>
					<div class="desc">
						<h2><a href="#">Conheça os planos premium</a></h2>
						<p>Aumente ainda mais a visibilidade da sua empresa, ganhe novos clientes e converta mais vendas.</p>
						<a href="http://listacampos.com.br/anuncie/" class="btn-a">VER PLANOS</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	</div>
	
	<!-- END container-wrap -->