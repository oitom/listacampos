<div class="container-wrap">	
	<div id="fh5co-contact">
		<div class="row">
			<h1 class="txt-center">Pré-Visualização</h1>
			<hr>
			<div class="col-md-8">
				<h3><?php echo $empresa['nome']; ?></h3>
				<span class="categori-sub"><?php echo $categoria_selecionada; ?> > <?php echo $subcategoria_selecionada; ?></span>
				
				
				<?php if(isset($ft_miniatura)){ ?>
					<div class="imgpreview">
						<img src="http://listacampos.com.br/uploads/<?php echo $ft_miniatura; ?>">
					</div>
				<?php } ?>

				<div class="h-20"></div>
				<?php if(strlen($empresa['telefone']) > 0 || strlen($empresa['whatsapp']) > 0 || strlen($empresa['email']) > 0){ ?>

				<h2 class="h-subtitulo">CONTATO</h2>
				
				<?php if(strlen($empresa['telefone'])>0){ ?>
				<h4><span class="icon-wrp"><i class="icon-phone-hang-up"></i></span>
					<a href="tel://<?php echo $empresa['telefone']; ?>" class="a-icon"><?php echo $empresa['telefone']; ?>
				</h4>
				<?php } ?>
				<?php if(strlen($empresa['whatsapp'])>0){ ?>
				<h4><span class="icon-wrp"><i class="icon-whatsapp"></i></span>
					<a href="tel://<?php echo $empresa['whatsapp']; ?>" class="a-icon"><?php echo $empresa['whatsapp']; ?>
				</h4>
				<?php } ?>
				<?php if(strlen($empresa['email'])>0){ ?>
				<h4><span class="icon-wrp"><i class="icon-envelop"></i></span>
					<a href="mailto:<?php echo $empresa['email']; ?>" class="a-icon" target="_blank"><?php echo $empresa['email']; ?>
				</h4>
				<?php } ?>
				<?php } ?>
				<div class="h-30"></div>
				<?php if(strlen($empresa['facebook']) > 0  || strlen($empresa['instagram']) > 0  || strlen($empresa['site']) > 0){ ?>
				<h2 class="h-subtitulo">REDES SOCIAIS</h2>
				<?php if(strlen($empresa['facebook']) > 0){ ?>
				<h4><span class="icon-wrp"><i class="icon-facebook2"></i></span>
					<a href="<?php echo "http://".$empresa['facebook']; ?>" class="a-icon" target="_blank"><?php echo $empresa['facebook']; ?></a></h4>
				<?php } ?>
				<?php if(strlen($empresa['instagram']) > 0){ ?>
				<h4><span class="icon-wrp"><i class="icon-instagram"></i></span>
					<a href="<?php echo "http://".$empresa['instagram']; ?>" class="a-icon" target="_blank"><?php echo $empresa['instagram']; ?></a></h4>
				<?php } ?>
				<?php if(strlen($empresa['site']) > 0){ ?>
				<h4><span class="icon-wrp"><i class="icon-earth"></i></span>
					<a href="<?php echo "http://".$empresa['site']; ?>" class="a-icon" target="_blank"><?php echo $empresa['site']; ?></a></h4>
				<?php } ?>
				<?php } ?>
				<div class="h-30"></div>
			</div>
			<div class="col-md-4">
				<?php if(strlen($hr_funcionamento['segunda']) > 6){ ?>
					<h3 class="text-center">Horário de atendimento</h3>
					<ul class="hr-func">
						<li><p class="p-hr-func"><span>Segunda-feira:</span><i><?php echo $hr_funcionamento['segunda']; ?></i></p></li>
						<li><p class="p-hr-func"><span>Terça-feira:</span><i><?php echo $hr_funcionamento['terca']; ?></i></p></li>
						<li><p class="p-hr-func"><span>Quarta-feira:</span><i><?php echo $hr_funcionamento['quarta']; ?></i></p></li>
						<li><p class="p-hr-func"><span>Quinta-feira:</span><i><?php echo $hr_funcionamento['quinta']; ?></i></p></li>
						<li><p class="p-hr-func"><span>Sexta-feira:</span><i><?php echo $hr_funcionamento['sexta']; ?></i></p></li>
						<li><p class="p-hr-func"><span>Sábado:</span><i><?php echo $hr_funcionamento['sabado']; ?></i></p></li>
						<li><p class="p-hr-func"><span>Domingo:</span><i><?php echo $hr_funcionamento['domingo']; ?></i></p></li>
					</ul>
				<?php } ?>
				<div class="h-30"></div>
				
				<?php if(strlen($palavraschave['hashtag_1']) > 0){ ?>
				<h3 class="text-center">Palavra-chave</h3>
					<ul class="hr-func colsm-4">
						<?php if(strlen($palavraschave['hashtag_1']) > 0){ ?>
						<li class="text-center">
							<span>
								<a href="http://listacampos.com.br/home/pesquisar/<?php echo $palavraschave['hashtag_1']; ?>">
								<?php echo $palavraschave['hashtag_1']; ?>
								</a>
							</span>
						</li>
						<?php } ?>
						<?php if(strlen($palavraschave['hashtag_2']) > 0){ ?>
						<li class="text-center">
							<span>
								<a href="http://listacampos.com.br/home/pesquisar/<?php echo $palavraschave['hashtag_2']; ?>">
								<?php echo $palavraschave['hashtag_2']; ?>
								</a>
							</span>
						</li>
						<?php } ?>
						<?php if(strlen($palavraschave['hashtag_3']) > 0){ ?>
						<li class="text-center">
							<span>
								<a href="http://listacampos.com.br/home/pesquisar/<?php echo $palavraschave['hashtag_3']; ?>">
								<?php echo $palavraschave['hashtag_3']; ?>
								</a>
							</span>
						</li>
						<?php } ?>
						<?php if(strlen($palavraschave['hashtag_4']) > 0){ ?>
						<li class="text-center">
							<span>
								<a href="http://listacampos.com.br/home/pesquisar/<?php echo $palavraschave['hashtag_4']; ?>">
								<?php echo $palavraschave['hashtag_4']; ?>
								</a>
							</span>
						</li>
						<?php } ?>
						<?php if(strlen($palavraschave['hashtag_5']) > 0){ ?>
						<li class="text-center">
							<span>
								<a href="http://listacampos.com.br/home/pesquisar/<?php echo $palavraschave['hashtag_5']; ?>">
								<?php echo $palavraschave['hashtag_5']; ?>
								</a>
							</span>
						</li>
						<?php } ?>
					</ul>
					<div class="h-30"></div>
					<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6 text-center ">
				<h4 class="txt-center">Miniatura</h4>
				<a href="" class="work"  style="min-height: 250px;">
					<div class="icon-work">
						<?php if(isset($ft_miniatura)){ ?>
						<img src="http://listacampos.com.br/uploads/<?php echo $ft_miniatura; ?>">
						<?php }else{ ?>
						<img src="http://listacampos.com.br/uploads/padrao.jpg">
						<?php } ?>
					</div>
					<div class="info-work">
						<h4><?php echo $empresa['nome']; ?></h4>
						<?php if(strlen($empresa['logradouro']) > 0){ ?>
						<p>
							<span class="icon-work-info"><i class="icon-location"></i></span>
							<span class="text-work-info">
							<?php

								$endereco = "";
								if($empresa['logradouro'] !="")
									$endereco = $empresa['logradouro'].", ";
								if($empresa['numero'] !="")
									$endereco.= $empresa['numero'].". ";
								if($empresa['bairro'] !="")
									$endereco.= $empresa['bairro'];

								echo $endereco;
							?>		
							</span>
						</p>
						<?php } ?>
						<?php $preencher = false; ?>
						
						<?php if($empresa['whatsapp'] != ""){ $preencher=true;?>
						<p>
							<span class="icon-work-info"><i class="icon-whatsapp"></i></span>
							<span class="text-work-info"><?php echo $empresa['whatsapp']; ?></span>
						</p>

						<?php }else if($empresa['telefone'] != ""){ $preencher=true;?>
						<p>
							<span class="icon-work-info"><i class="icon-phone-hang-up"></i></span>
							<span class="text-work-info"><?php echo $empresa['telefone']; ?></span>
						</p>
						
						<?php }else if($preencher== false){ ?>
						<p>
							<span class="icon-work-info"><i class="icon-bookmark"></i></span>
							<span class="text-work-info"><?php echo $categoria_selecionada ." > ".$subcategoria_selecionada; ?></span>
						</p>
						<?php } ?>
					</div>
					
				</a>
			</div>

			<div class="col-md-8">
				<h3 class="txt-center">Concluir cadastro</h3>
				<p class="txt-center">Ao finalizar o seu cadastro, pode levar até 3 dias úteis para ser publicado!<p>
				<div class="h-30"></div>
				<a href="http://listacampos.com.br/cadastre/finalizar/" class="btn btn-cadastro">Concluir cadastro</a>
				<div class="h-30"></div>

			</div>
		</div>
	</div>