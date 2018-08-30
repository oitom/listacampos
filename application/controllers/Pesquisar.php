<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisar extends CI_Controller {
	
	public function index($keyword = null)
	{
		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$subcategorias = null;
		$order_by = "asc";
		$numrows = 0;
		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);
		
		$this->load->model("Empresa_model", "EmpresasPesquisa");
		$this->load->model("Empresa_model", "EmpresasPesquisaTag");
		$this->load->model("Tag_model", "TagPesquisa");

		if(isset($keyword))
		{
			$empresas = $this->EmpresasPesquisa->likeJoin($tabelas, $keyword);
			$tags = $this->TagPesquisa->like($keyword);
			$empresasTotais = array();
			$empresasEncontradas = array();
			$empresasSelect = array();
			$empresasResultado = array();

			for($i = 0; $i < count($tags); $i++)
			{
				$this->EmpresasPesquisaTag->codigo_tag = $tags[$i]->codigo_tag;
				$empresasTag = $this->EmpresasPesquisaTag->searchJoin($tabelas, 0, null, $order_by);
				array_push($empresasTotais, $empresasTag[0]);
			}

			for($i = 0; $i < count($empresas); $i++)
				array_push($empresasTotais, $empresas[$i]);

			for($i = 0; $i < count($empresasTotais); $i++)
				array_push($empresasEncontradas, $empresasTotais[$i]->codigo_empresa);

			if(count($empresasEncontradas) > 0){
				$empresasSelect = array_unique($empresasEncontradas);
				$empresasSelect = array_values($empresasSelect);
			}
			
			for($i = 0; $i < count($empresasSelect); $i++)
			{
				$this->load->model("Empresa_model", "EmpresasResultado");
				$this->EmpresasResultado->codigo_empresa = $empresasSelect[$i];
				$resultado = $this->EmpresasResultado->searchJoin($tabelas, 0, null, $order_by);
				array_push($empresasResultado, $resultado[0]);
			}
		}
		else
			$msg = "sem parametro de pesquisa";

		$numrows = count($empresasResultado);
		$data = array('titulo' => "Lista Campos | Pesquisar ".$keyword, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresasResultado, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows);
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/categoria');
		$this->load->view('layout/footer');
	}

}
