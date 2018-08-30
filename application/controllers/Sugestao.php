<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sugestao extends CI_Controller {
	
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
		$this->load->view('layout/sugestao', $data);
		$this->load->view('layout/footer');
	}

	public function enviar()
	{
		$this->load->library('email');

		$nome  = $this->input->post('nome');
		$email = $this->input->post('email');
		$mensagem = $this->input->post('mensagem');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->email->from($email, $nome);
		$this->email->to('contato@listacampos.com.br');

		$this->email->subject('Contato via site - Sugestão');
		
		$this->email->message($mensagem);
		$this->email->send();
	}

}
