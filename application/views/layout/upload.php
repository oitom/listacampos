<div class="upload-bar">
	<div class="progress">
		<p>Fazendo upload...</p>
		<img src="http://listacampos.com.br/images/load.gif">
	</div>
</div>

<div class="container-wrap">	
	<div id="fh5co-contact">
		<div class="col-md-8 col-md-offset-2 animate-box">
			<h2 class="txt-center">Carregue uma foto / logo</h2>
			<p class="txt-center">Aconselhamos carregar uma imagem de fácil identificação da sua empresa!</p>
			<div class="row">
				<div class="col-md-12 h-30"></div>
			</div>
		</div>

		<div class="col-md-6">			
			<?php echo form_open_multipart('http://listacampos.com.br/cadastre/preview/');?>
			
				<div class="form-group">
					<input type="file" id="upload-foto" class="form-control uploadfoto" name="userfile" size="20" />
				</div>
				
				<div class="form-group">
					<input type="submit" id="carregar" name="upload-foto" value="Carregar imagem" class="btn btn-primary btn-modify"/>
				</div>
				<div class="col-md-12 h-30"></div>
			</form>
			<h3 class="txt-center">Ou</h2>

			<div class="form-group">
				<form method="post" action="http://listacampos.com.br/cadastre/preview/">
				<div class="exbloco">
					<?php 
						switch ($categoriaSelecionada) {
							case '1': 
								echo '<img clas="img-padrao" title="padrao-alimentos.jpg" src="http://listacampos.com.br/uploads/padrao-alimentos.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-alimentos.jpg">';
							break;
							case '2': 
								echo '<img clas="img-padrao" title="padrao-compras.jpg" src="http://listacampos.com.br/uploads/padrao-compras.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-compras.jpg">';
							break;
							case '3': 
								echo '<img clas="img-padrao" title="padrao-educacao.jpg" src="http://listacampos.com.br/uploads/padrao-educacao.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-educacao.jpg">';
							break;
							case '4': 
								echo '<img clas="img-padrao" title="padrao-saude.jpg" src="http://listacampos.com.br/uploads/padrao-saude.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-saude.jpg">';
							break;
							case '5': 
								echo '<img clas="img-padrao" title="padrao-veiculos.jpg" src="http://listacampos.com.br/uploads/padrao-veiculos.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-veiculos.jpg">';
							break;
							case '6': 
								echo '<img clas="img-padrao" title="padrao-utilidade-publica.jpg" src="http://listacampos.com.br/uploads/padrao-utilidade-publica.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-utilidade-publica.jpg">';
							break;
							case '7': 
								echo '<img clas="img-padrao" title="padrao-servicos.jpg" src="http://listacampos.com.br/uploads/padrao-servicos.jpg">';
								echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-servicos.jpg">';
							break;
						}

					 ?>
					
					<p class="txt-center">A foto padrão é de acordo com a categoria selecionada.</p>
				</div>
				<input type="submit" id="usar-padrao" name="upload-foto" value="Usar imagem padrão" style="margin-top: 23px;" class="btn btn-primary btn-modify"/>
				</form>
			</div>

			<div class="h-30"></div>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<h3>Requisitos</h3>
			<p>A imagem deve ser no formato retangular</p>
			<p>Dimensão: 600 x 240 px</p>
			<p>Tamanho máximo de 8mb</p>
			<p>Tipos de arquivos permitidos: gif | jpg | png </p>
			<p><b>* Caso a imagem não atenda os requisitos necessários, será utilizada a foto padrão da categoria.</b></p>			

			<div class="h-20"></div>

			<h3>Não tem uma imagem personalizada?</h3>
			<p>Criamos uma arte ou foto para sua empresa.</p>
			<form method="post" action="http://listacampos.com.br/cadastre/preview/">
				<?php 
					switch ($categoriaSelecionada) {
					case '1': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-alimentos.jpg">'; break;
					case '2': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-compras.jpg">'; break;
					case '3': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-educacao.jpg">'; break;
					case '4': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-saude.jpg">'; break;
					case '5': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-veiculos.jpg">'; break;
					case '6': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-utilidade-publica.jpg">'; break;
					case '7': echo '<input class="img-padrao-val" name="img-padrao" type="hidden" value="padrao-servicos.jpg">'; break;
					} ?>
				<input name="fotografo" type="hidden" value="1">
				<input type="submit" id="usar-padrao" name="upload-foto" value="Contrate este serviço  R$ 30,00" class="btn btn-primary btn-modify"/>
			</form>
			
		</div>
	</div>