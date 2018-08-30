<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if(isset($description)){?>
		<meta name="description" content="<?php echo $description; ?>" />
	<?php }else{ ?>
		<meta name="keywords" content="Lista de empresas e comércios em Campos do Jordão. O mais novo portal da cidade, encontre aqui tudo o que você procura sobre Campos do jordão." />
	<?php } ?>
	
	<?php if(isset($keywords)){?>
		<meta name="keywords" content="<?php echo $keywords; ?>" />
	<?php }else{?>
		<meta name="keywords" content="lista de empresas, campos do jordão, lista telefonica" />
	<?php }?>

	<meta name="author" content="freehtml5.co" />
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Lista Campos"/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content="listacampos.com.br"/>
	<meta property="og:site_name" content="Lista Campos"/>
	<meta property="og:description" content="Lista de empresas e comércios em Campos do Jordão"/>

	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
	
	<link rel="shortcut icon" href="favicone.ico">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo CSS; ?>animate.css">
	<!-- Icons Fonts-->
	<link rel="stylesheet" href="<?php echo CSS; ?>icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo CSS; ?>bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo CSS; ?>magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo CSS; ?>flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo CSS; ?>jquery.bxslider.css">
	
	<link rel="stylesheet" href="<?php echo CSS; ?>style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111819134-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-111819134-1');
	</script>
	
	<!-- Modernizr JS -->
	<script src="<?php echo JS; ?>modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo JS; ?>respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container-wrap">
			<div class="top-menu">
				<div class="row">
					<div class="col-xs-12">
						<div id="fh5co-logo">
							<a href="http://listacampos.com.br/">
								<img class="logo-main" src="<?php echo IMAGES; ?>logo.png">
							</a>
						</div>
					</div>

					<?php 
						if($categoriaSelecionada == "Início" || $subcategoria_selecionada == "perfil"){
					 ?>
					<div class="col-xs-12 text-center">
						<div class="col-xs-12">
							<div class="form-group wpr-search">
									<input type="text" name="keyword" id="seachcampo" class="form-control search-input" placeholder="Digite aqui empresas, produtos ou serviços" >
									<button type="submit" class="search-bar"><span class="icon-search"></span> &nbsp;  Pesquisar</button>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="col-xs-12 h-30"></div>
					<div class="col-xs-12 text-center menu-1">
						<ul class="ul-menu-home">
							<li <?php echo ($categoriaSelecionada == "Início" ? "class='active'" : " " ); ?>><a href="http://listacampos.com.br/">Início</a></li>
							<li <?php echo ($categoriaSelecionada == "Alimentos" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/alimentos/'); ?>">Alimentos</a></li>
							<li <?php echo ($categoriaSelecionada == "Compras" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/compras/'); ?>">Compras</a></li>
							<li <?php echo ($categoriaSelecionada == "Educação" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/educacao/'); ?>">Educação</a></li>
							<li <?php echo ($categoriaSelecionada == "Saúde" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/saude/'); ?>">Saúde</a></li>
							<li <?php echo ($categoriaSelecionada == "Veículos" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/veiculos/'); ?>">Veículos</a></li>
							<li <?php echo ($categoriaSelecionada == "Utilidade públicas" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/utilidade-publica/'); ?>">Utilidade pública</a></li>
							<li <?php echo ($categoriaSelecionada == "Serviços" ? "class='active'" : " " ); ?>><a href="<?php echo base_url('home/categoria/servicos/'); ?>">Serviços</a></li>
							<li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
						</ul>
					</div>
					<div class="col-xs-12 h-30"></div>
				</div>
				
			</div>
		</div>
	</nav>