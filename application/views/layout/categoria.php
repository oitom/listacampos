<div class="container-wrap">
	<!--<div class="banner-container">
		<img src="<?php echo IMAGES; ?>banner-3-1060-150.jpeg" style="width: 100%">
	</div>-->
	<div id="fh5co-work" class="fh5co-light-grey">
		<div class="col-xs-12 wpr-search2">
			<div class="form-group wpr-search">
					<input type="text" name="keyword" id="seachcampo" class="form-control search-input" placeholder="Digite aqui empresas, produtos ou serviços" value="<?php echo (isset($keyword) == true ? $keyword: '' ); ?>">
					<button type="submit" class="search-bar"><span class="icon-search"></span> &nbsp;  Pesquisar</button>
			</div>
		</div>
		<div class="h-20"></div>
		<div class="h-20"></div>
		<div class="row animate-box select-searching">
			<div class="col-md-3 col-sm-6 fh5co-heading">
				<div class="form-group">
				<label for="" class="l-filtro">Categoria</label>
					<select id="select-categoria" class="form-select" <?php echo (isset($subcategorias) == true ? "style='background: #d1ead2;'" : " ");?>>
					<?php 
					
						for ($i=0; $i < count($categorias); $i++) { 
							if($categorias[$i] == $categoriaSelecionada)
									echo "<option selected>".$categorias[$i]."</option>";
								else
									echo "<option>".$categorias[$i]."</option>";
						}
					?>
					</select>
				</div>
				
			</div>
			<div class="col-md-3 col-sm-6 fh5co-heading">
				<div class="form-group">
				<label for="" class="l-filtro">Sub Categoria</label>
					<select id="select-subcategoria" class="form-select">
					<?php 
						
						if(isset($subcategorias))
						{
							for ($i=0; $i < count($subcategorias); $i++)
							{ 
								$subcategoriasEdit = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$subcategorias[$i]));
								
								if($subcategoriasEdit == $subcategoria_selecionada)
									echo "<option selected>".$subcategorias[$i]."</option>";
								else
									echo "<option>".$subcategorias[$i]."</option>";
							}
						}
						else
							echo '<option id="select-to-categoria" selected>Primeiro selecione a categoria</option>';
					?>
					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 fh5co-heading">
				<div class="form-group">
				<label for="" class="l-filtro">Bairro</label>
					<select id="select-bairro" class="form-select">
					<?php  if(strlen($bairro_selecionado) == 0){ $bairro_selecionado=""; ?>
					<option selected>Selecione...</option>
					<?php } ?>
					<option <?php echo ($bairro_selecionado == 'Abernessia'? 'selected' : ' '); ?>>Abernessia</option>
					<option <?php echo ($bairro_selecionado == 'Jaguaribe'? 'selected' : ' '); ?>>Jaguaribe</option>
					<option <?php echo ($bairro_selecionado == 'Capivari'? 'selected' : ' '); ?>>Capivari</option>
					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 fh5co-heading">
				<div class="form-group">
				<label for="" class="l-filtro">Classificar</label>
					<select id="select-classificacao" class="form-select">
					<?php  if(strlen($order_by) == 0){ $order_by=""; ?>
						<option selected>Selecione...</option>
					<?php } ?>

					<option <?php echo ($order_by == 'asc' ? 'selected' : ' '); ?> >De A - Z</option>
					<option <?php echo ($order_by == 'desc' ? 'selected' : ' '); ?> >De Z - A</option>
					
					</select>
				</div>
			</div>
		</div>
		<div class="row listagem">
				<div class="num-rows">
					<?php if($numrows > 1){ ?>
						<p>Foram encontrados ( <?php echo $numrows; ?> ) empresas para a sua pesquisa.</p>
					<?php }else if($numrows == 0){ ?>
						<p>Não encontramos nenhuma empresa para sua pesquisa :(</p>
						<a href="http://listacampos.com.br/sugestao/" class="btn-a a-sugestao">Click aqui para fazer uma sugestão!</a>
					<?php }else{ ?>
						<p>Foi encontrado ( <?php echo $numrows; ?> ) empresa para a sua pesquisa.</p>
					<?php } ?>
				
				</div>

				<?php for ($i=0; $i < count($empresas) ; $i++) { ?>
				<div class="col-md-4 col-sm-6 text-center ">
					<a href="<?php echo base_url('home/perfil/'.$empresas[$i]->url.''); ?>" class="work"  style="">
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
									if(strlen($empresas[$i]->logradouro)>0)
										$endereco = $empresas[$i]->logradouro.", ";
									if(strlen($empresas[$i]->numero)>0)
										$endereco.= $empresas[$i]->numero.". ";
									if(strlen($empresas[$i]->bairro)>0)
										$endereco.= $empresas[$i]->bairro;

									if(strlen($endereco) == 0)
										$endereco = "Campos do Jordão - SP";
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
	</div>
</div>