<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
	
	public function index($nomePerfil = "")
	{
		$categoria = "perfil";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="perfil";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;
		$order_by = "asc";
		$numrows=0;
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);

		$this->load->model("Empresa_model", "Empresas");

		$this->Empresas->url = $nomePerfil;
		$empresas = $this->Empresas->searchJoin($tabelas, 0, null, $order_by);
		
		$categoriaSelecionada = $empresas[0]->codigo_categoria->categoria;

		$numrows = count($empresas);
		$data = array('titulo' => "Lista Campos | ".$empresas[0]->nome, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresas, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows);
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/perfil');
		$this->load->view('layout/footer');
	}

}
