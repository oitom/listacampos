<?php

class Email extends CI_Controller {

	public function index()
	{
		$this->load->library('email');

		$nome  = $this->input->post('nome');
		$email = $this->input->post('email');
		$mensagem = $this->input->post('mensagem');
		$codigo_empresa = $this->input->post('codigo_empresa');

		$this->load->model("Empresa_model", "Empresas");
		$this->Empresas->codigo_empresa = $codigo_empresa;

		$tabelas = array('TAG' => true, 'GALERIA' => true, 'HRFUNCIONAMENTO' => true, 'CATEGORIA' => true, 'SUBCATEGORIA' => true);
		$empresas = $this->Empresas->searchJoin($tabelas, 0, null, 'asc');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->email->from($email, $nome);
		$this->email->to($empresas[0]->email);

		$this->email->subject('E-mail do portal Lista Campos');
		
		$html = $this->html($email);
		$this->email->message($mensagem);
		$this->email->send();
	}
	
	public function html()
    {
    	$html = file_get_contents("http://listacampos.com.br/uploads/e-mail_listacampos_visitante.html");
        return $html;
    }
    
    public function send()
    {
    	$this->load->library('email');

    	$nome  = $this->input->post('nome');
		$email = $this->input->post('email');
		
		$this->load->model("Cadastro_model", "Cadastro");
		$this->Cadastro->nome  = $nome;
		$this->Cadastro->email = $email;
		$this->Cadastro->insert();

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		
		$mensagem = "Nome: ".$nome."<br>E-mail: ".$email;

		$this->email->initialize($config);
		$this->email->from($email, $nome);
		$this->email->to('contato@listacampos.com.br');
		$this->email->subject('Cadastro no site Lista Campos');
		$this->email->message($mensagem);
		$this->email->send();

		
		$this->email->initialize($config);
		$this->email->from("contato@listacampos.com.br", "Lista Campos");
		$this->email->to($email);
		$this->email->subject('Cadastro no site Lista Campos');
		
		$html = $this->html();

		$this->email->message($html);
		$this->email->send();
	}
}
