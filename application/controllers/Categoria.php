<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function index($nomeCategoria = NULL, $nomeSubcategoria = NULL, $bairro = NULL, $classificar = NULL)
	{
		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;
		$order_by = "asc";
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
					$subcategorias = array("Selecione...", "Açougue","Cafés", "Carrinho de lanches", "Chocolates", "Confeitarias", "Geléia/Doces", "Hortifrut", "Peixaria", "Lanchonetes", "Queijo", "Pizzaria", "Padaria", "Mercados", "Supermercados", "Restaurantes", "Vinhos");
					$this->Empresas->codigo_categoria = 1;
					break;
				case 'compras':
					// select empresa categoria = compras
					$categoriaSelecionada = "Compras";
					$subcategorias = array("Selecione...", "Bebê e Gestante", "Bijouterias", "Boutiques", "Brinquedos", "Calçados", "Cama", "CD/DVD", "Floricultura", "Jóias", "Langerie", "Livrarias", "Lojas", "Magazines", "Malharias", "Materiais esportivos", "Meias", "Mesa e Banho", "Móveis", "Otica", "Perfumaria", "Pijama", "Presentes", "Relógio", "Selarias", "Shoppings");
					$this->Empresas->codigo_categoria = 2;
					break;
				case 'educacao':
					// select empresa categoria = educacao
					$categoriaSelecionada = "Educação";
					$subcategorias = array("Selecione...", "Infantil", "Fundamental","Médio","Superior","Idioma","Técnica","Curso Profissionalizante");
					$this->Empresas->codigo_categoria = 3;
					break;
				case 'saude':
					// select empresa categoria = saude
					$categoriaSelecionada = "Saúde";
					$subcategorias = array("Selecione...", "Posto de saúde", "Cardiologia", "Cirurgia Vascular", "Clínicas", "Clínico Geral", "Farmácias", "Fisioterapia", "Ginecologia", "Homeopatia", "Hospitais", "Laboratório", "Neurologia", "Nutricionista", "Odontologia", "Ortopedia", "Otorrinolaringologia", "Pediatria", "Podologista", "Psicologia", "Urologia");
					$this->Empresas->codigo_categoria = 4;
					break;
				case 'veiculos':
					// select empresa categoria = veiculos
					$categoriaSelecionada = "Veículos";
					$subcategorias = array("Selecione...", "Acessórios", "Auto Elétrica", "Bicicletarias", "Borracharias", "Lava Autos", "Locação", "Mecânicas", "Motos", "Oficinas Mecânicas", "Pneus", "Postos de Combustíveis", "Revendedores", "Som Automotivo");
					$this->Empresas->codigo_categoria = 5;
					break;
				case 'utilidade-publica':
					// select empresa categoria = utilidade publica
					$categoriaSelecionada = "Utilidade públicas";
					$subcategorias = array("Selecione...", "Associações","Bancos","Entidades Religiosas","ONGs","Ponto de Táxi","Prefeitura","Rodoviária","Telefones de Emergência","Telefones Úteis");
					$this->Empresas->codigo_categoria = 6;
					break;
				case 'servicos':
					// select empresa categoria = servicos
					$categoriaSelecionada = "Serviços";
					$subcategorias = array("Selecione...", "Advogados", "Arquitetos", "Baby Sitter", "Dentistas", "Despachantes", "Eletricista", "Engenheiros", "Historiador", "Pintor", "Veterinários");
					$this->Empresas->codigo_categoria = 7;
					break;
				case 'asc':
					$order_by = $nomeCategoria;
				break;
				case 'desc':
					$order_by = $nomeCategoria;
				break;
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
			else if($nomeSubcategoria == "asc" || $nomeSubcategoria == "desc")
				$order_by = $nomeSubcategoria;	
			else{
				$this->Empresas->codigo_subcategoria = $this->getSubcategoriaCodigo($nomeSubcategoria);
				$subcategoria_selecionada = $nomeSubcategoria;
			}
		}
		
		if(isset($classificar)){
			if($classificar == "asc" || $classificar == "desc")
				$order_by = $classificar;	
		}
		
		if(isset($bairro)){
			if($bairro != "asc" && $bairro != "desc"){
				if($bairro == "Abernessia")
					$bairro = "Abernéssia";

				$this->Empresas->bairro = $bairro;
				$bairro_selecionado = $bairro;
			}
			else{
				$order_by = $bairro;
			}
		}

		$empresas = $this->Empresas->searchJoin($tabelas, 0, null, $order_by);
		
		$numrows = count($empresas);
		$data = array('titulo' => "Lista Campos | ".$categoriaSelecionada, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresas, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows);
		
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/categoria');
		$this->load->view('layout/footer');
	}

	public function getSubcategoriaCodigo($url="")
	{
		$this->load->model("Urlsubcategoria_model", "Url");
		$this->Url->url = $url;
		$codigoSubcategoria = $this->Url->search();
		return $codigoSubcategoria[0]->codigo_subcategoria;
	}

}
