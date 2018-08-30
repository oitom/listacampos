<div class="container-wrap">	
	<div id="fh5co-contact">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<h2 class="txt-center">Cadastre sua empresa no mais novo portal</h2>
				<h3 class="txt-center upper">É rápido, fácil e <span>gratuito</span></h3>
				<div class="row">
					<div class="col-md-12">
					<p class="txt-center">
						Aumente a visibilidade da sua empresa, ganhe novos clientes e converta mais vendas. 
					</p>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2 animate-box">
				<h4 class="txt-center"></h4>
				<form method="post" action="http://listacampos.com.br/cadastre/upload/">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control" name="nome-empresa" id="nome-empresa" placeholder="Nome da empresa">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label for="" class="l-filtro">Categoria</label>
							<select id="select-categoriaa" name="categoria" class="form-select">
								<?php 
									for ($i=0; $i < count($categorias); $i++) { 
										echo "<option>".$categorias[$i]."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label for="" class="l-filtro">Sub Categoria</label>
							<select id="select-subcategoriaa" name="subcategoria" class="form-select">
								<option selected="">Selecione a categoria primeiro</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="telefone" id="telefone" onkeypress="return mask(event, this, '(##) ####-####')" maxlength="14" placeholder="Telefone">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="whatsapp" id="whatsapp" onkeypress="return mask(event, this, '(##) #-####-####')" maxlength="16" placeholder="Whatsapp">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="site" id="site" placeholder="Site">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="facebook" id="facebook" placeholder="Link do Facebook">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="instagram" id="instagram" placeholder="Link do Instagram">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="numero" id="numero" placeholder="Número">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
						</div>
					</div>

					<div class="col-md-12">
						<h3 class="txt-center">Horário de atendimento:</h3>
						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Domingo:</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-domingo-abre" class="horario" name="hr-domingo-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-domingo-fecha" class="horario" name="hr-domingo-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-domingo" id="nao-abre-domingo" value="1"> Não abre
								</label>
							</div>
						</div>

						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Segunda-feira:</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-segunda-abre" class="horario" name="hr-segunda-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-segunda-fecha" class="horario" name="hr-segunda-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-segunda" id="nao-abre-segunda" value="1"> Não abre
								</label>
							</div>
						</div>

						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Terça-feira</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-terca-abre" class="horario" name="hr-terca-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-terca-fecha" class="horario" name="hr-terca-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-terca" id="nao-abre-terca" value="1"> Não abre
								</label>
							</div>
						</div>

						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Quarta-feira</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-quarta-abre" class="horario" name="hr-quarta-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-quarta-fecha" class="horario" name="hr-quarta-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-quarta" id="nao-abre-quarta" value="1"> Não abre
								</label>
							</div>
						</div>

						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Quinta-feira</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-quinta-abre" class="horario" name="hr-quinta-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-quinta-fecha" class="horario" name="hr-quinta-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-quinta" id="nao-abre-quinta" value="1"> Não abre
								</label>
							</div>
						</div>

						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Sexta-feira</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-sexta-abre" class="horario" name="hr-sexta-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-sexta-fecha" class="horario" name="hr-sexta-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-sexta" id="nao-abre-sexta" value="1"> Não abre
								</label>
							</div>
						</div>

						<div class="row line-hr" >
							<div class="col-md-3 col-sm-3">
								<p class="hr-semana">Sábado</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-sabado-abre" class="horario" name="hr-sabado-abre" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<input id="time-sabado-fecha" class="horario" name="hr-sabado-fecha" type="time">
							</div>
							<div class="col-md-3 col-sm-3">
								<label class="l-check"> 
									<input type="checkbox" name="nao-abre-sabado" id="nao-abre-sabado" value="1"> Não abre
								</label>
							</div>
						</div>
					</div>
					
					<div class="col-md-12 h-30"></div>

					<div class="col-md-12">
						<h3 class="txt-center">Palavras chave:</h3>
						<h4 class="txt-center">As palavras chave ajudam a sua empresa a ser encontrada!</h4>
						<p class="txt-center">* Escreva um Produto ou Serviço<br>Exemplo: caneta, canetas-coloridas</p>
						<div class="col-md-6">
							<input type="text" class="form-control palavrachave" name="palavrachave1" id="palavrachave1" placeholder="Palavra chave 1">
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control palavrachave" name="palavrachave2" id="palavrachave2" placeholder="Palavra chave 2">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control palavrachave" name="palavrachave3" id="palavrachave3" placeholder="Palavra chave 3">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control palavrachave" name="palavrachave4" id="palavrachave4" placeholder="Palavra chave 4">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control palavrachave" name="palavrachave5" id="palavrachave5" placeholder="Palavra chave 5">
						</div>

					</div>
					
					<div class="col-md-12 h-30"></div>

					<div class="col-md-12">
						<div class="form-group">
							<input type="submit" value="IR PARA PRÓXIMA ETAPA >>"  id="avancar-form" class="btn btn-primary btn-modify">
						</div>
					</div>
					<div class="col-md-12">
						<p class="result"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>