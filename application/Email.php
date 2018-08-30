<?php

class Email extends CI_Controller {

	public function index()
	{
		$this->load->library('email');

		$nome  = "joao";//$this->input->post('nome');
		$email = "contato@camposoficial.com.br"; //$this->input->post('email');
		$this->load->database();
		$this->load->model("Email_model", "clientes");

/*
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->email->from($email, $nome);
		$this->email->to('wcosta.ale@gmail.com');

		$this->email->subject('Cadastro no Campos Oficial');
		$this->email->message('Parabens, cadastro feito com sucesso!');

		$this->email->send();
*/
	}
	
}
