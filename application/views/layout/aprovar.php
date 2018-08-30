<div class="container-wrap">
		<?php if(isset($empresas[0]->ft_capa)){ ?>
		<?php if($tipo_plano > 1){ ?>
		<aside id="fh5co-hero" style="height: 300px;">
			<div class="flexslider">
				<ul class="slides slide-capa" style="background-image: url(<?php echo "http://listacampos.com.br/uploads/".$empresas[0]->ft_capa; ?>); background-position: center; ">
			   	<li>
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluids">
			   			
			   		</div>
			   	</li>		   	
			  	</ul>
		  	</div>
		</aside>
		<?php }}else{ ?>
		<aside id="fh5co-hero" style="height: 300px; display: none">
			<div class="flexslider">
				<ul class="slides slide-capa" style="background-image: url(http://listacampos.com.br/uploads/capa-banner.jpg); background-position: center; ">
			   	<li>
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluids">
			   			
			   		</div>
			   	</li>		   	
			  	</ul>
		  	</div>
		</aside>
		
		<?php } ?>
		<div id="fh5co-blog">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<h1><?php echo $empresas[0]->nome; ?></h1>
					<span class="categori-sub"><?php echo $empresas[0]->codigo_categoria->categoria; ?> > <?php echo $empresas[0]->codigo_subcategoria->subcategoria; ?></span>
						
						<?php if($tipo_plano > 1){ ?>
						<p class="p-description"><?php echo $empresas[0]->descricao; ?><br></p>
						<?php } ?>

						<?php if($tipo_plano < 2){ ?>
						<?php if(isset($empresas[0]->ft_miniatura)){ ?>
							<div class="imgpreview">
								<img width="100%" src="http://listacampos.com.br/uploads/<?php echo $empresas[0]->ft_miniatura; ?>">
							</div>
							<?php }else{ ?>
								<img src="http://listacampos.com.br/uploads/padrao.jpg">
						<?php 	} ?>
						<?php } ?>
					
					<div class="h-20"></div>
					<?php if($tipo_plano > 1 ){ ?>
					<?php if(isset($empresas[0]->galeria)){ ?>
					<div class="col-md-12">
						<div class="slider">
							<?php if(isset($empresas[0]->galeria->foto_1)){ ?>
								<div class="img-slider"><img src="http://listacampos.com.br/uploads/<? echo $empresas[0]->galeria->foto_1 ?>"></div>
							<?php }if(isset($empresas[0]->galeria->foto_2)){ ?>
								<div class="img-slider"><img src="http://listacampos.com.br/uploads/<? echo $empresas[0]->galeria->foto_2 ?>"></div>
							<?php }if(isset($empresas[0]->galeria->foto_3)){ ?>
								<div class="img-slider"><img src="http://listacampos.com.br/uploads/<? echo $empresas[0]->galeria->foto_3 ?>"></div>
							<?php }if(isset($empresas[0]->galeria->foto_4)){ ?>
								<div class="img-slider"><img src="http://listacampos.com.br/uploads/<? echo $empresas[0]->galeria->foto_4 ?>"></div>
							<?php }if(isset($empresas[0]->galeria->foto_5)){ ?>
								<div class="img-slider"><img src="http://listacampos.com.br/uploads/<? echo $empresas[0]->galeria->foto_5 ?>"></div>
							<?php } ?>
							
						</div>
		            </div>
		            <?php }} ?>
		            <div class="row">
		            	<div class="col-md-12">
		            		<?php if(strlen($empresas[0]->telefone) > 0 || strlen($empresas[0]->whatsapp) > 0 || strlen($empresas[0]->email) > 0){ ?>
		            		<div class="col-md-12 col-sm-12">
		            			<h2 class="h-subtitulo">CONTATO</h2>
		            			<?php if(strlen($empresas[0]->telefone)>0){ ?>
		            			<h4><span class="icon-wrp"><i class="icon-phone-hang-up"></i></span>
		            				<a href="tel://<?php echo $empresas[0]->telefone; ?>" class="a-icon"><?php echo $empresas[0]->telefone; ?>
		            			</h4>
		            			<?php } ?>
		            			<?php if(strlen($empresas[0]->whatsapp)>0){ ?>
		            			<h4><span class="icon-wrp"><i class="icon-whatsapp"></i></span>
		            				<a href="tel://<?php echo $empresas[0]->whatsapp; ?>" class="a-icon"><?php echo $empresas[0]->whatsapp; ?>
		            			</h4>
		            			<?php } ?>
		            			<?php if(strlen($empresas[0]->email)>0){ ?>
		            			<h4><span class="icon-wrp"><i class="icon-envelop"></i></span>
		            				<a href="mailto:<?php echo $empresas[0]->email; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->email; ?>
		            			</h4>
		            			<?php } ?>
		            			<div class="h-30"></div>
		            		</div>
		            		<?php } ?>
		            		<?php if($empresas[0]->facebook !=null || $empresas[0]->instagram !=null || $empresas[0]->site !=null){ ?>
		            		<div class="col-md-12 col-sm-12">
		            			<h2 class="h-subtitulo">REDES SOCIAIS</h2>
		            			
		            			<?php if(strlen($empresas[0]->facebook) > 0){ ?>
		            				<h4><span class="icon-wrp"><i class="icon-facebook2"></i></span>
		            						<?php if(substr($empresas[0]->facebook, 0, 4) == "http"){ ?>
		            						<a href="<?php echo $empresas[0]->facebook; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->facebook; ?></a></h4>
		            					<?php }else{ ?>
		            						<a href="<?php echo "http://". $empresas[0]->facebook; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->facebook; ?></a></h4>
		            					<?php } ?>

		            			<?php } ?>
		            			
		            			<?php if(strlen($empresas[0]->instagram) > 0){ ?>
		            				<h4><span class="icon-wrp"><i class="icon-instagram"></i></span>
		            				<?php if(substr($empresas[0]->instagram, 0, 4) == "http"){ ?>
		            					<a href="<?php echo $empresas[0]->instagram; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->instagram; ?></a></h4>
		            				<?php }else{ ?>
		            					<a href="<?php echo "http://".$empresas[0]->instagram; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->instagram; ?></a></h4>
		            				<?php } ?>
		            			<?php } ?>
		            			
		            			<?php if(strlen($empresas[0]->site) > 0){ ?>
		            				<h4><span class="icon-wrp"><i class="icon-earth"></i></span>
		            				<?php if(substr($empresas[0]->site, 0, 4) == "http"){ ?>
		            					<a href="<?php echo $empresas[0]->site; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->site; ?></a></h4>
		            				<?php }else{ ?>
		            					<a href="<?php echo "http://".$empresas[0]->site; ?>" class="a-icon" target="_blank"><?php echo $empresas[0]->site; ?></a></h4>
		            				<?php } ?>
		            			<?php } ?>
		            			
		            			<div class="h-30"></div>
		            		</div>
		            		<?php } ?>
		            	</div>
		            </div>
				</div>
				<div class="col-md-4 col-sm-12">
					<?php if(isset($empresas[0]->hr_funcionamento)){ ?>
					<div class="col-md-12 col-sm-12 animate-box">
						<?php if($empresas[0]->codigo_categoria->categoria == "Serviços"){ ?>
						<h3 class="text-center">Horário de atendimento</h3>
						<?php }else{ ?>
						<h3 class="text-center">Horário de funcionamento</h3>
						<?php } ?>
						<ul class="hr-func">
							<li><p class="p-hr-func"><span>Segunda-feira:</span><i><?php echo $empresas[0]->hr_funcionamento->segunda; ?></i></p></li>
							<li><p class="p-hr-func"><span>Terça-feira:</span><i><?php echo $empresas[0]->hr_funcionamento->terca; ?></i></p></li>
							<li><p class="p-hr-func"><span>Quarta-feira:</span><i><?php echo $empresas[0]->hr_funcionamento->quarta; ?></i></p></li>
							<li><p class="p-hr-func"><span>Quinta-feira:</span><i><?php echo $empresas[0]->hr_funcionamento->quinta; ?></i></p></li>
							<li><p class="p-hr-func"><span>Sexta-feira:</span><i><?php echo $empresas[0]->hr_funcionamento->sexta; ?></i></p></li>
							<li><p class="p-hr-func"><span>Sábado:</span><i><?php echo $empresas[0]->hr_funcionamento->sabado; ?></i></p></li>
							<li><p class="p-hr-func"><span>Domingo:</span><i><?php echo $empresas[0]->hr_funcionamento->domingo; ?></i></p></li>
						</ul>
					</div>
					<?php } ?>
					
					<div class="col-md-12 col-sm-6 animate-box">
						<div class="h-20"></div>
						<div class="colsm-4 banner-lateral" style="background-image: url(http://listacampos.com.br/uploads/lateral-banner.jpg); background-position: center; background-size: 100%; "></div>
						<div class="h-30"></div>
					</div>

					<?php if(isset($empresas[0]->tag)){ ?>
					<div class="col-md-12 col-sm-12  animate-box">
						<h3 class="text-center">Palavra-chave</h3>
						<ul class="hr-func colsm-4">
							<?php if(strlen($empresas[0]->tag->hashtag_1) > 0){ ?>
							<li class="text-center">
								<span>
									<a href="http://listacampos.com.br/home/pesquisar/<?php echo $empresas[0]->tag->hashtag_1; ?>">
									<?php echo $empresas[0]->tag->hashtag_1; ?>
									</a>
								</span>
							</li>
							<?php } ?>
							<?php if(strlen($empresas[0]->tag->hashtag_2) > 0){ ?>
							<li class="text-center">
								<span>
									<a href="http://listacampos.com.br/home/pesquisar/<?php echo $empresas[0]->tag->hashtag_2; ?>">
									<?php echo $empresas[0]->tag->hashtag_2; ?>
									</a>
								</span>
							</li>
							<?php } ?>
							<?php if(strlen($empresas[0]->tag->hashtag_3) > 0){ ?>
							<li class="text-center">
								<span>
									<a href="http://listacampos.com.br/home/pesquisar/<?php echo $empresas[0]->tag->hashtag_3; ?>">
									<?php echo $empresas[0]->tag->hashtag_3; ?>
									</a>
								</span>
							</li>
							<?php } ?>
							<?php if(strlen($empresas[0]->tag->hashtag_4) > 0){ ?>
							<li class="text-center">
								<span>
									<a href="http://listacampos.com.br/home/pesquisar/<?php echo $empresas[0]->tag->hashtag_4; ?>">
									<?php echo $empresas[0]->tag->hashtag_4; ?>
									</a>
								</span>
							</li>
							<?php } ?>
							<?php if(strlen($empresas[0]->tag->hashtag_5) > 0){ ?>
							<li class="text-center">
								<span>
									<a href="http://listacampos.com.br/home/pesquisar/<?php echo $empresas[0]->tag->hashtag_5; ?>">
									<?php echo $empresas[0]->tag->hashtag_5; ?>
									</a>
								</span>
							</li>
							<?php } ?>
						</ul>
						<div class="h-30"></div>
					</div>
					<?php } ?>
				</div>

				<div class="col-md-12  animate-box">
						<?php if($tipo_plano == 1 || $tipo_plano == 3){ ?>
						<div class="col-md-8">
						<?php }else if($tipo_plano == 2){ ?>
							<div class="col-md-12">
						<?php } ?>

		            		<h2 class="h-subtitulo">ENDEREÇO</h2>
		            		<h4>
		            			<?php

									$endereco = "";
									if(strlen($empresas[0]->logradouro)>0)
										$endereco = $empresas[0]->logradouro.", ";
									if(strlen($empresas[0]->numero)>0)
										$endereco.= $empresas[0]->numero.". ";
									if(strlen($empresas[0]->complemento)>0)
										$endereco.= $empresas[0]->complemento.". ";
									if(strlen($empresas[0]->bairro)>0)
										$endereco.= $empresas[0]->bairro.". ";
									if(strlen($empresas[0]->cidade)>0)
										$endereco.= $empresas[0]->cidade." - ";
									if(strlen($empresas[0]->estado)>0)
										$endereco.= $empresas[0]->estado.".";

									echo $endereco;
								?>

		            		</h4>
		            		

		            		<?php 
		            			if(isset($empresas[0]->url_mapa)){
		            				if($tipo_plano > 1){
		            					echo $empresas[0]->url_mapa;
		            		 		} 
		            		 	} 
		            		 ?>

		            		<div class="h-30"></div>
		            	</div>
		            	<?php if($empresas[0]->plano > 1){ ?>
		            	<?php if($tipo_plano > 2){ ?>
		            	<div class="col-md-4">
		            		<h2 class="h-subtitulo">FORMULÁRIO</h2>
		            		<h4>Envie sua mensagem!</h4>
							<div class="row">
								<!--<form action="http://listacampos.com.br/email/index/<?php echo $empresas[0]->codigo_empresa; ?>" method="post">-->
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea name="mensagem" id="mensagem" class="form-control" id="" cols="30" rows="7" placeholder="Escreva aqui sua mensagem"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" name="codigo_empresa" id="codigo_empresa" value="<?php echo $empresas[0]->codigo_empresa; ?>">
											<input type="submit" value="Enviar" id="enviar" class="btn btn-primary btn-modify">
										</div>
									</div>
								<!-- </form> -->
							</div>
							<div class="col-md-12">
								<p class="result"></p>
							</div>
							<div class="h-30"></div>
		            	</div>
		            	<?php } ?>
		            	<?php } ?>
				</div>

				<div class="col-md-12 barback">
					<a href="#" class="backbutton text-center">EDITAR</a>
				</div>
				<div class="col-md-12 sbarback">
					<a href="#" class="backbutton text-center">APROVAR</a>
				</div>
				
				<div class="col-md-12">
					<div class="banner-rodape" style="background-image: url(http://listacampos.com.br/uploads/banner-rodape.jpg); background-position: center; background-size: 100%;"></div>
				</div>

			</div>
		</div>
	</div><!-- END container-wrap -->