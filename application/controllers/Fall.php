<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fall extends CI_Controller {
	
	public function index()
	{	
		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;
		$order_by = "asc";
		$numrows=0;

		$data = array('titulo' => "Lista Campos | Sugestão", 'categoriaSelecionada'=> $categoriaSelecionada, 'subcategoria_selecionada'=> $subcategoria_selecionada);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/fall', $data);
		$this->load->view('layout/footer');
	}

}
