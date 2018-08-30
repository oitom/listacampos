<?php

class Aprovacao extends CI_Controller {

	public function index($nomePerfil = "", $tipo_plano = "")
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

		if($tipo_plano == "")
			$tipo_plano = $empresas[0]->plano;
		
		$description = $empresas[0]->nome." em Campos do Jordão";
		if($empresas[0]->descricao != "")
			$description = $empresas[0]->descricao;

		$keywords =  $empresas[0]->tag->hashtag_1. ", " .$empresas[0]->tag->hashtag_2. ", " .$empresas[0]->tag->hashtag_3. ", " .$empresas[0]->tag->hashtag_4. ", " .$empresas[0]->tag->hashtag_5. ", ".$empresas[0]->nome." em Campos do Jordão";

		$numrows = count($empresas);
		$data = array('titulo' => "Lista Campos | ".$empresas[0]->nome, 'categoriaSelecionada'=> $categoriaSelecionada,'categorias'=> $categorias, 'subcategorias'=>$subcategorias, 'empresas'=>$empresas, 'subcategoria_selecionada'=>$subcategoria_selecionada, 'bairro_selecionado'=>$bairro_selecionado, 'classificacao_selecionada'=> $classificacao_selecionada, 'order_by'=>$order_by, 'numrows'=>$numrows, 'tipo_plano'=>$tipo_plano, 'description'=>$description, 'keywords'=>$keywords);

		if($numrows > 0){
			$this->load->view('layout/header', $data);
			$this->load->view('layout/aprovar');
			$this->load->view('layout/footer');
		}
		else{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/fall');
			$this->load->view('layout/footer');
		}
	}

	public function update()
	{

	}

	public function publicar()
	{
		
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
