<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index2()
	{	
		$categoriaSelecionada = "Início";
		
		$this->load->model("Empresa_model", "Empresas");

		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);
		// pega 15 empresas ordenadas pelo plano 3
		//$empresas = $this->Empresas->searchJoin($tabelas, 0, 15);
		
		// pega somente as empresas do plano 3
		//$this->Empresas->plano = 3;
		$this->Empresas->codigo_categoria = 6;
		//$this->Empresas->status = 1;
		$empresasPlano3 = $this->Empresas->search(0, null, "plano", "DESC");

		for ($i=0; $i < count($empresasPlano3) ; $i++) { 
			$codigosEmpresas[] = $empresasPlano3[$i]->codigo_empresa;			
		}

		$i = 1;
		$numerosSortidos = array();

		while($i <= 15) // 15 empresas aleatorias
		{
			$random = rand(0, count($codigosEmpresas)-1);
			if(!in_array($codigosEmpresas[$random], $numerosSortidos))
			{
			   	array_push($numerosSortidos,$codigosEmpresas[$random]);
			   	$codigosRandomicos[] =  $codigosEmpresas[$random];
			   	$i++;
			}
		}
		foreach ($codigosRandomicos as $codigoSelecionado) {
			$this->Empresas->codigo_empresa = $codigoSelecionado;
			$empresas[] = $this->Empresas->join($tabelas);		
		}

		// if(count($empresas) < 15)
		// {	$total = 15;
		// 	$quantidade_faltando = $total - count($empresas);
		// 	echo "<pre>";
		// 	print_r($quantidade_faltando);
		// 	echo "</pre>";
		// }

		$data = array('titulo' => "Lista Campos | Home", 'categoriaSelecionada'=> $categoriaSelecionada, 'empresas'=>$empresas);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/home', $data);
		$this->load->view('layout/footer');
	}

	public function index()
	{	
		$categoriaSelecionada = "Início";
		
		$this->load->model("Empresa_model", "Empresas");

		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);
		// pega 15 empresas ordenadas pelo plano 3
		//$empresas = $this->Empresas->searchJoin($tabelas, 0, 15);
		
		// pega somente as empresas do plano 3
		$this->Empresas->plano = 3;
		//$this->Empresas->codigo_categoria = 6;
		//$this->Empresas->status = 1;
		$empresasPlano3 = $this->Empresas->search(0, null, "plano", "DESC");

		for ($i=0; $i < count($empresasPlano3) ; $i++) { 
			$codigosEmpresas[] = $empresasPlano3[$i]->codigo_empresa;			
		}

		if(count($codigosEmpresas) > 15){
			
			$i = 1;
			$numerosSortidos = array();
			while($i <= 15)
			{
				$random = rand(0, count($codigosEmpresas)-1);

				if($random == 0){
					$codigosRandomicos[] = $codigosEmpresas[0];
					break;
				}

				if(!in_array($codigosEmpresas[$random], $numerosSortidos))
				{
				   	array_push($numerosSortidos,$codigosEmpresas[$random]);
				   	$codigosRandomicos[] =  $codigosEmpresas[$random];
				   	$i++;
				}
			}
			
			foreach ($codigosRandomicos as $codigoSelecionado)
			{
				$this->Empresas->codigo_empresa = $codigoSelecionado;
				$empresas[] = $this->Empresas->join($tabelas);		
			}

		}
		else{
			foreach ($codigosEmpresas as $codigoSelecionado)
			{
				$this->Empresas->codigo_empresa = $codigoSelecionado;
				$empresas[] = $this->Empresas->join($tabelas);		
			}
		}

		$quantidade_faltando = 0;

		if(count($empresas) < 15)
		{	
			$total = 15;
			$quantidade_faltando = $total - count($empresas);

			$this->load->model("Empresa_model", "EmpresasAleatorias");
			$this->EmpresasAleatorias->codigo_categoria = 6;
			$empresasRandom = $this->EmpresasAleatorias->search(0, null, "plano", "DESC");

			$codigosEmpresas2 = array();

			for ($i=0; $i < count($empresasRandom) ; $i++) { 
				$codigosEmpresas2[] = $empresasRandom[$i]->codigo_empresa;			
			}

			$i = 1;
			$numerosSortidos2 = array();
			
			while($i <= $quantidade_faltando) // empresas aleatorias
			{
				$random = rand(0, count($empresasRandom)-1);

				if(!in_array($codigosEmpresas2[$random], $numerosSortidos2))
				{
				   	array_push($numerosSortidos2, $codigosEmpresas2[$random]);
				   	$codigosRandomicos[] =  $codigosEmpresas2[$random];
				   	$i++;
				}
			}

			$this->load->model("Empresa_model", "EmpresasRandon");

			foreach ($codigosRandomicos as $codigoSelecionado) {
				$this->EmpresasRandon->codigo_empresa = $codigoSelecionado;
				$empresas[] = $this->EmpresasRandon->join($tabelas);		
			}
			
		}

		$data = array('titulo' => "Lista Campos | Home", 'categoriaSelecionada'=> $categoriaSelecionada, 'empresas'=>$empresas);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/home', $data);
		$this->load->view('layout/footer');
	}

	public function getSubcategoriaCodigo($url="")
	{
		$this->load->model("Urlsubcategoria_model", "Url");
		$this->Url->url = $url;
		$codigoSubcategoria = $this->Url->search(0, null, "plano", "DESC");
		return $codigoSubcategoria[0]->codigo_subcategoria;
	}

	public function categoria($nomeCategoria = NULL, $nomeSubcategoria = NULL, $bairro = NULL, $classificar = NULL)
	{
		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;

		$order="plano";
		$class="DESC";

		$order_by = "";
		$numrows=0;
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);
		
		$this->load->model("Empresa_model", "Empresas");

		if(isset($nomeCategoria))
		{
			switch ($nomeCategoria) {
				case 'alimentos':
					// select empresa categoria = alimentos
					$categoriaSelecionada = "Alimentos";
					$subcategorias = array("Selecione...", "Açougue","Cafés", "Carrinho de lanches", "Chocolates", "Confeitarias", "Geléia/Doces", "Hortifrut", "Peixaria", "Lanchonetes", "Queijo", "Pizzaria", "Padaria", "Mercados", "Supermercados", "Restaurantes", "Vinhos", "Outros");
					$this->Empresas->codigo_categoria = 1;
					break;
				case 'compras':
					// select empresa categoria = compras
					$categoriaSelecionada = "Compras";
					$subcategorias = array("Selecione...", "Bebê e Gestante", "Bijouterias", "Boutiques", "Brinquedos", "Calçados", "Cama", "CD/DVD", "Casa e Construção", "Floricultura", "Jóias", "Lingerie", "Livrarias", "Lojas", "Magazines", "Malharias", "Materiais esportivos", "Meias", "Mesa e Banho", "Móveis", "Otica", "Perfumaria", "Pijama", "Presentes", "Relógio", "Selarias", "Shoppings", "Outros");
					$this->Empresas->codigo_categoria = 2;
					break;
				case 'educacao':
					// select empresa categoria = educacao
					$categoriaSelecionada = "Educação";
					$subcategorias = array("Selecione...", "Infantil", "Fundamental","Médio","Superior","Idioma","Técnica","Curso Profissionalizante", "Outros");
					$this->Empresas->codigo_categoria = 3;
					$order="codigo_empresa";
					break;
				case 'saude':
					// select empresa categoria = saude
					$categoriaSelecionada = "Saúde";
					$subcategorias = array("Selecione...", "Posto de saúde", "Cardiologia", "Cirurgia Vascular", "Clínicas", "Clínico Geral", "Farmácias", "Fisioterapia", "Ginecologia", "Homeopatia", "Hospitais", "Laboratório", "Neurologia", "Nutricionista", "Odontologia", "Ortopedia", "Otorrinolaringologia", "Pediatria", "Podologista", "Psicologia", "Urologia", "Academia", "Outros");
					$this->Empresas->codigo_categoria = 4;
					break;
				case 'veiculos':
					// select empresa categoria = veiculos
					$categoriaSelecionada = "Veículos";
					$subcategorias = array("Selecione...", "Acessórios", "Auto Elétrica", "Bicicletarias", "Borracharias", "Lava Autos", "Locação", "Mecânicas", "Motos", "Oficinas Mecânicas", "Pneus", "Postos de Combustíveis", "Revendedores", "Som Automotivo", "Outros");
					$this->Empresas->codigo_categoria = 5;
					break;
				case 'utilidade-publica':
					// select empresa categoria = utilidade publica
					$categoriaSelecionada = "Utilidade públicas";
					$subcategorias = array("Selecione...", "Associações","Bancos","Entidades Religiosas","ONGs","Ponto de Táxi","Prefeitura","Rodoviária","Telefones de Emergência","Telefones Úteis", "Vereadores", "Outros");
					$this->Empresas->codigo_categoria = 6;
					break;
				case 'servicos':
					// select empresa categoria = servicos
					$categoriaSelecionada = "Serviços";
					$subcategorias = array("Selecione...", "Advogados", "Arquitetos", "Baby Sitter", "Dentistas", "Despachantes", "Eletricista", "Engenheiros", "Historiador", "Pintor", "Veterinários", "Comunicação", "Músico", "Contador", "Costureira", "Professor", "Jardineiro", "Pedreiro", "Motorista", "Encanador", "Taxista", "Faxineira", "Marceneiro", "Carpinteiro", "Administração", "Consultor de beleza", "Vendedor", "Eventos", "Turismo", "Construção Civil", "Beleza", "Estética", "Direito", "Fotógrafo", "Outros");
					$this->Empresas->codigo_categoria = 7;
					break;
				case 'asc':
					$order = "nome";
					$class = $nomeCategoria;
				break;
				case 'desc':
					$order = "nome";
					$class = $nomeCategoria;
				break;
			}

			if($nomeCategoria == "Abernessia" || $nomeCategoria == "Jaguaribe" || $nomeCategoria == "Capivari")
			{
				if($nomeCategoria == "Abernessia")
					$nomeCategoria = "Abernéssia";

				$this->Empresas->bairro = $nomeCategoria;
				$bairro_selecionado = $nomeCategoria;
			}
		}

		if(isset($nomeSubcategoria))
		{
			if($nomeSubcategoria == "Abernessia" || $nomeSubcategoria == "Jaguaribe" || $nomeSubcategoria == "Capivari")
			{
				if($nomeSubcategoria == "Abernessia")
					$nomeSubcategoria = "Abernéssia";

				$this->Empresas->bairro = $nomeSubcategoria;
				$bairro_selecionado = $nomeSubcategoria;
			}
			else if($nomeSubcategoria == "asc" || $nomeSubcategoria == "desc"){
				$order = "nome";
				$class = $nomeSubcategoria;	
			}
			else{
				$this->Empresas->codigo_subcategoria = $this->getSubcategoriaCodigo($nomeSubcategoria);
				$subcategoria_selecionada = $nomeSubcategoria;
			}
		}
		
		if(isset($classificar)){
			if($classificar == "asc" || $classificar == "desc"){
				$order = "nome";
				$class = $classificar;	
			}
		}
		
		if(isset($bairro)){
			if($bairro != "asc" && $bairro != "desc"){
				if($bairro == "Abernessia")
					$bairro = "Abernéssia";

				$this->Empresas->bairro = $bairro;
				$bairro_selecionado = $bairro;
			}
			else{
				$order = "nome";
				$class = $bairro;
			}
		}

		$this->Empresas->status = 1;
		$empresas = $this->Empresas->searchJoin($tabelas, 0, null, $order, $class);
		
		$numrows = count($empresas);
		
		if($categoriaSelecionada == "")
			$titulo = "Categorias";
		else
			$titulo = $categoriaSelecionada;

		$data = array('titulo' => "Lista Campos | ".$titulo, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresas, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows);
		
		// echo "<pre>";
		// print_r($this->Empresas);
		// echo "</pre>";
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/categoria');
		$this->load->view('layout/footer');
	}

	public function pesquisar($keyword = null)
	{
		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$subcategorias = null;

		$order = "plano";
		$class = "DESC";
		
		$numrows = 0;
		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);
		
		$this->load->model("Empresa_model", "EmpresasPesquisa");
		$this->load->model("Empresa_model", "EmpresasPesquisaTag");
		$this->load->model("Tag_model", "TagPesquisa");
		$this->EmpresasPesquisa->status = 1;
		$this->EmpresasPesquisaTag->status = 1;

		if(isset($keyword))
		{
			$empresas = $this->EmpresasPesquisa->likeJoin($tabelas, $keyword);
			$tags = (array)$this->TagPesquisa->like($keyword);
			$empresasTotais = array();
			$empresasEncontradas = array();
			$empresasSelect = array();
			$empresasResultado = array();
			
			for($i = 0; $i < count($empresas); $i++)
				array_push($empresasTotais, $empresas[$i]);


			for($i = 0; $i < count($tags); $i++)
			{
				$this->EmpresasPesquisaTag->codigo_tag = $tags[$i]->codigo_tag;
				$empresasTag = $this->EmpresasPesquisaTag->searchJoin($tabelas, 0, null, $order, $class);
				array_push($empresasTotais, $empresasTag[0]);
			}

		
			for($i = 0; $i < count($empresasTotais); $i++)
				array_push($empresasEncontradas, $empresasTotais[$i]->codigo_empresa);

			


			if(count($empresasEncontradas) > 0){
				$empresasSelect = array_unique($empresasEncontradas);
				$empresasSelect = array_values($empresasSelect);
			}
			


			for($i = 0; $i < count($empresasSelect); $i++)
			{
				if(strlen($empresasSelect[$i])>0){
					$this->load->model("Empresa_model", "EmpresasResultado");
					$this->EmpresasResultado->codigo_empresa = $empresasSelect[$i];
					$resultado = $this->EmpresasResultado->searchJoin($tabelas, 0, null, $order, $class);
						
					if($resultado[0]->status == 1)
						array_push($empresasResultado, $resultado[0]);
				}
			}
			
		}
		else
			$msg = "sem parametro de pesquisa";
		// echo "<pre>";
		// print_r($tags);
		// print_r($empresasTag);
		// print_r($empresasSelect);
		// print_r($empresasResultado);
		// echo "</pre>";

		$numrows = count($empresasResultado);
		$data = array('titulo' => "Lista Campos | Pesquisar ".$keyword, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresasResultado, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows);
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/categoria');
		$this->load->view('layout/footer');
	}
	
	public function perfil($nomePerfil = "", $tipo_plano = "")
	{
		$categoria = "perfil";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="perfil";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;
		
		$order="plano";
		$class="DESC";

		$numrows=0;
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);

		$this->load->model("Empresa_model", "Empresas");

		$this->Empresas->url = $nomePerfil;
		$empresas = $this->Empresas->searchJoin($tabelas, 0, null, $order, $class);
		
		$categoriaSelecionada = $empresas[0]->codigo_categoria->categoria;

		if($tipo_plano == "")
			$tipo_plano = $empresas[0]->plano;
		
		$description = $empresas[0]->nome." em Campos do Jordão";
		if($empresas[0]->descricao != "")
			$description = $empresas[0]->descricao;

		$keywords =  $empresas[0]->tag->hashtag_1. ", " .$empresas[0]->tag->hashtag_2. ", " .$empresas[0]->tag->hashtag_3. ", " .$empresas[0]->tag->hashtag_4. ", " .$empresas[0]->tag->hashtag_5. ", ".$empresas[0]->nome." em Campos do Jordão";

		$numrows = count($empresas);
		$data = array('titulo' => "Lista Campos | ".$empresas[0]->nome, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresas, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows, 'tipo_plano'=>$tipo_plano, 'description'=>$description, 'keywords'=>$keywords);

		
		if($numrows > 0)
		{
			$this->load->model("Count_model", "Count");
			// $this->Count->codigo_empresa = $empresas[0]->codigo_empresa;
			// $this->Count->qtd = 1;
			// $this->Count->insert();
			
			// $qtd = $this->Count->search();
			// $data["qtd"]=$qtd;

			$this->load->view('layout/header', $data);
			$this->load->view('layout/perfil');
			$this->load->view('layout/footer');
		}
		else{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/fall');
			$this->load->view('layout/footer');
		}
	}

}
