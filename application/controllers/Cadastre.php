<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastre extends CI_Controller {
	
  	public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
    }

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
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		
		$data = array('titulo' => "Lista Campos | Cadastre sua empresa", 'categoriaSelecionada'=> $categoriaSelecionada, 'subcategoria_selecionada'=> $subcategoria_selecionada, 'categorias'=>$categorias);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/cadastre', $data);
		$this->load->view('layout/footer');
	}

	public function upload()
	{
		if(count($_POST) > 0)
		{
			$this->load->model("Empresa_model", "Empresas");
			$this->load->model("Categoria_model", "Categoria");
			$this->load->model("Subcategoria_model", "Subcategoria");
			$this->load->model("Tag_model", "PalavraChave");
			$this->load->model("Hrfuncionamento_model", "Hrfuncionamento");

			if(isset($_POST['nome-empresa'])){
				$this->Empresas->nome = $_POST['nome-empresa'];
			}

			if(isset($_POST['categoria'])){
			
				if(isset($_POST['subcategoria'])){
					$this->Subcategoria->subcategoria = $_POST['subcategoria'];
					$codigo_subcategoria = $this->Subcategoria->get();
			    	$this->Empresas->codigo_subcategoria = $codigo_subcategoria->codigo_subcategoria;
			    	$this->Empresas->codigo_categoria = $codigo_subcategoria->codigo_categoria;
			    	$codigo_categoria_selecionado = $codigo_subcategoria->codigo_categoria;
				}
			}

			if(isset($_POST['telefone']))
			    $this->Empresas->telefone = $_POST['telefone'];
			
			if(isset($_POST['whatsapp']))
			    $this->Empresas->whatsapp = $_POST['whatsapp'];
			
			if(isset($_POST['email']))
			    $this->Empresas->email = $_POST['email'];
			
			if(isset($_POST['site']))
			    $this->Empresas->site = $_POST['site'];
			
			if(isset($_POST['facebook']))
			    $this->Empresas->facebook = $_POST['facebook'];
			
			if(isset($_POST['instagram']))
			    $this->Empresas->instagram = $_POST['instagram'];
			
			if(isset($_POST['endereco']))
			    $this->Empresas->logradouro = $_POST['endereco'];
			
			if(isset($_POST['numero']))
			    $this->Empresas->numero = $_POST['numero'];
			
			if(isset($_POST['bairro']))
			    $this->Empresas->bairro = $_POST['bairro'];

			if(isset($_POST['complemento']))
			    $this->Empresas->complemento = $_POST['complemento'];

			// HORARIO DE FUNCIONAMENTO
			if(!isset($_POST['nao-abre-segunda'])){
				if(strlen($_POST['hr-segunda-abre']) == 0 && strlen($_POST['hr-segunda-fecha'])==0)
			    	$segunda =  "Fechado";
			    else
			    	$segunda =  $_POST['hr-segunda-abre']." às ".$_POST['hr-segunda-fecha'];
			}
			else
				$segunda = "Fechado";

			if(!isset($_POST['nao-abre-terca'])){
				if(strlen($_POST['hr-terca-abre']) == 0 && strlen($_POST['hr-terca-fecha'])==0)
			    	$terca =  "Fechado";
			    else
			    	$terca =  $_POST['hr-terca-abre']." às ".$_POST['hr-terca-fecha'];
			}
			else
				$terca = "Fechado";

			if(!isset($_POST['nao-abre-quarta'])){
				if(strlen($_POST['hr-quarta-abre']) == 0 && strlen($_POST['hr-quarta-fecha'])==0)
			    	$quarta =  "Fechado";
			    else
			    	$quarta =  $_POST['hr-quarta-abre']." às ".$_POST['hr-quarta-fecha'];
			}
			else
				$quarta = "Fechado";			

			if(!isset($_POST['nao-abre-quinta'])){
				if(strlen($_POST['hr-quinta-abre']) == 0 && strlen($_POST['hr-quinta-fecha'])==0)
			    	$quinta =  "Fechado";
			    else
			    	$quinta =  $_POST['hr-quinta-abre']." às ".$_POST['hr-quinta-fecha'];
			}
			else
				$quinta = "Fechado";	

			if(!isset($_POST['nao-abre-sexta'])){
				if(strlen($_POST['hr-sexta-abre']) == 0 && strlen($_POST['hr-sexta-fecha'])==0)
			    	$sexta =  "Fechado";
			    else
			    	$sexta =  $_POST['hr-sexta-abre']." às ".$_POST['hr-sexta-fecha'];
			}
			else
				$sexta = "Fechado";		

			if(!isset($_POST['nao-abre-sabado'])){
				if(strlen($_POST['hr-sabado-abre']) == 0 && strlen($_POST['hr-sabado-fecha'])==0)
			    	$sabado =  "Fechado";
			    else
			    	$sabado =  $_POST['hr-sabado-abre']." às ".$_POST['hr-sabado-fecha'];
			}
			else
				$sabado = "Fechado";

			if(!isset($_POST['nao-abre-domingo'])){
				if(strlen($_POST['hr-domingo-abre']) == 0 && strlen($_POST['hr-domingo-fecha'])==0)
			    	$domingo =  "Fechado";
			    else
			    	$domingo =  $_POST['hr-domingo-abre']." às ".$_POST['hr-domingo-fecha'];
			}
			else
				$domingo = "Fechado";		
					
			$this->Hrfuncionamento->segunda = $segunda;
			$this->Hrfuncionamento->terca = $terca;
			$this->Hrfuncionamento->quarta = $quarta;
			$this->Hrfuncionamento->quinta = $quinta;
			$this->Hrfuncionamento->sexta = $sexta;
			$this->Hrfuncionamento->sabado = $sabado;
			$this->Hrfuncionamento->domingo = $domingo;
			
			// PALAVRAS CHAVE
			if(isset($_POST['palavrachave1'])){
				$palavrachave1 = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$_POST['palavrachave1']));
			    $this->PalavraChave->hashtag_1 = $palavrachave1;
			}
			if(isset($_POST['palavrachave2'])){
				$palavrachave2 = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$_POST['palavrachave2']));
			    $this->PalavraChave->hashtag_2 = $palavrachave2;
			}
			if(isset($_POST['palavrachave3'])){
				$palavrachave3 = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$_POST['palavrachave3']));
			    $this->PalavraChave->hashtag_3 = $palavrachave3;
			}
			if(isset($_POST['palavrachave4'])){
				$palavrachave4 = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$_POST['palavrachave4']));
			    $this->PalavraChave->hashtag_4 = $palavrachave4;
			}
			if(isset($_POST['palavrachave5'])){
				$palavrachave5 = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$_POST['palavrachave5']));
			    $this->PalavraChave->hashtag_5 = $palavrachave5;
			}

			$this->Empresas->cidade = "Campos do Jordão";
			$this->Empresas->estado = "SP";
			$this->Empresas->plano = "1";
			$this->Empresas->status = "0";
			$this->Empresas->codigo_usuario = "1";
			$this->Empresas->url = strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç)/", "/( )/"), explode(" ","a A e E i I o O u U n N c -"),$_POST['nome-empresa']));
			
			// SET SESSAO
			$newdata = array(
				'empresa' => $this->Empresas,
				'palavraschave' => $this->PalavraChave,
				'hr_funcionamento' => $this->Hrfuncionamento
			);
			$this->session->set_userdata($newdata);
			
			$categoria = "";
			$categoriaSelecionada = $this->Empresas->codigo_categoria;
			$subcategoria_selecionada ="";
			$bairro_selecionado ="";
			$classificacao_selecionada = "";
			$subcategorias = null;
			$order_by = "asc";
			$numrows=0;

			$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
			$data = array('titulo' => "Lista Campos | Cadastre sua empresa", 'categoriaSelecionada'=> $categoriaSelecionada, 'subcategoria_selecionada'=> $subcategoria_selecionada, 'categorias'=>$categorias);

			$this->load->view('layout/header', $data);
			$this->load->view('layout/upload', $data);
			$this->load->view('layout/footer');

		}
		else
			header("location: http://listacampos.com.br/cadastre/");
	}

	public function session()
	{
		$this->load->library('session');
		if($this->session->userdata('empresa'))
		{
			echo "<pre>";
			print_r($this->session->userdata('empresa'));
			print_r($this->session->userdata('hr_funcionamento'));
			print_r($this->session->userdata('palavraschave'));
			echo "</pre>";	
		}
	}


	public function preview()
    {
    	$empresa =  (array)$this->session->userdata('empresa');
		$hr_funcionamento =  (array)$this->session->userdata('hr_funcionamento');
		$palavraschave =  (array)$this->session->userdata('palavraschave');
		$fotografo = "0";

    	if(isset($_FILES['userfile']))
    	{
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|GIF|JPEG';
			$config['max_size']             = 1000;
			$config['max_width']            = 3024;
			$config['max_height']           = 3024;

			$this->load->library('upload', $config);
			$this->load->library('image_lib');

	        if (!$this->upload->do_upload('userfile'))
	        {
	            if($empresa["codigo_categoria"] == 1) $ft_miniatura = 'padrao-alimentos.jpg';
	            if($empresa["codigo_categoria"] == 2) $ft_miniatura = 'padrao-compras.jpg';
	            if($empresa["codigo_categoria"] == 3) $ft_miniatura = 'padrao-educacao.jpg';
	            if($empresa["codigo_categoria"] == 4) $ft_miniatura = 'padrao-saude.jpg';
	            if($empresa["codigo_categoria"] == 5) $ft_miniatura = 'padrao-veiculos.jpg';
	            if($empresa["codigo_categoria"] == 6) $ft_miniatura = 'padrao-utilidade-publica.jpg';
	            if($empresa["codigo_categoria"] == 7) $ft_miniatura = 'padrao-servicos.jpg';
	        
	        }
	        else
	        {
	           	$imgupload = array('upload_data' => $this->upload->data());

	            $img = substr($imgupload["upload_data"]["full_path"], 51);
				$config['image_library'] = 'gd2';
				$config['source_image'] = $imgupload["upload_data"]["full_path"];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['new_image'] = $imgupload["upload_data"]["full_path"];
				$config['width']        = 600;
				$config['height']       = 0;
				

				$this->image_lib->clear();
				$this->image_lib->initialize($config);

				if (!$this->image_lib->resize())
				{
					if($empresa["codigo_categoria"] == 1) $ft_miniatura = 'padrao-alimentos.jpg';
		            if($empresa["codigo_categoria"] == 2) $ft_miniatura = 'padrao-compras.jpg';
		            if($empresa["codigo_categoria"] == 3) $ft_miniatura = 'padrao-educacao.jpg';
		            if($empresa["codigo_categoria"] == 4) $ft_miniatura = 'padrao-saude.jpg';
		            if($empresa["codigo_categoria"] == 5) $ft_miniatura = 'padrao-veiculos.jpg';
		            if($empresa["codigo_categoria"] == 6) $ft_miniatura = 'padrao-utilidade-publica.jpg';
		            if($empresa["codigo_categoria"] == 7) $ft_miniatura = 'padrao-servicos.jpg';

					$erros =  $this->image_lib->display_errors();
				}
				else{
					$ft_miniatura = $imgupload["upload_data"]["file_name"];
				}
			}
		}
		else{			
			$ft_miniatura = $_POST['img-padrao'];

			if(isset($_POST['fotografo']))
				$fotografo = "1";
		}

		// PREVIEW
		$this->load->model("Empresa_model", "Empresas");
		$this->load->model("Categoria_model", "Categoria");
		$this->load->model("Subcategoria_model", "Subcategoria");
		$this->load->model("Tag_model", "PalavraChave");
		$this->load->model("Hrfuncionamento_model", "Hrfuncionamento");

		$empresa["ft_miniatura"] = $ft_miniatura;
		// -------------------------------------------------------
		// cadastra foto na tabela aux
		
		$this->load->model("Aux_model", "Aux");
		$this->Aux->foto = $ft_miniatura;
		$this->Aux->fotografo = $fotografo;
		$this->Aux->url_empresa = $empresa["url"];
		$codigo_aux = $this->Aux->insert();

		// -------------------------------------------------------
		$newdata = array(
			'empresa' => $empresa,
			'palavraschave' => $palavraschave,
			'hr_funcionamento' => $hr_funcionamento,
		);

		$this->session->set_userdata($newdata);

		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;
		$order_by = "asc";
		$numrows=0;

		$this->Subcategoria->codigo_subcategoria = $empresa['codigo_subcategoria'];
		$subcategoria = $this->Subcategoria->get();
    	$subcategoria_selecionada = $subcategoria->subcategoria;

    	$this->Categoria->codigo_categoria = $empresa['codigo_categoria'];
		$categoria = $this->Categoria->get();
    	$categoria_selecionada = $categoria->categoria;

		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$data = array('titulo' => "Lista Campos | Cadastre sua empresa", 'categoriaSelecionada'=> $categoriaSelecionada, 'subcategoria_selecionada'=> $subcategoria_selecionada, 'categoria_selecionada'=> $categoria_selecionada, 'categorias'=>$categorias, 'empresa'=> $empresa, 'ft_miniatura'=>$ft_miniatura, 'hr_funcionamento'=>$hr_funcionamento, 'palavraschave'=> $palavraschave);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/preview', $data);
		$this->load->view('layout/footer');
	}

    public function finalizar()
    {	
    	if($this->session->userdata('empresa') != null){
	    	$empresa =  (array)$this->session->userdata('empresa');
			$hr_funcionamento =  (array)$this->session->userdata('hr_funcionamento');
			$palavraschave =  (array)$this->session->userdata('palavraschave');
			$ft_miniatura = (array)$this->session->userdata('ft_miniatura');
			$fotografo = (array)$this->session->userdata('fotografo');

	    	$this->load->model("Empresa_model", "Empresas");
			$this->load->model("Categoria_model", "Categoria");
			$this->load->model("Subcategoria_model", "Subcategoria");
			$this->load->model("Tag_model", "PalavraChave");
			$this->load->model("Hrfuncionamento_model", "Hrfuncionamento");
			$this->load->model("Aux_model", "Aux");
		
			// LOAD DATA
			$this->Empresas->url = 	$empresa["url"];
			$this->Empresas->nome = $empresa["nome"];
			$this->Empresas->telefone = $empresa["telefone"];
			$this->Empresas->whatsapp = $empresa["whatsapp"];
			$this->Empresas->email = $empresa["email"];
			$this->Empresas->site = $empresa["site"];
			$this->Empresas->facebook = $empresa["facebook"];
			$this->Empresas->instagram = $empresa["instagram"];
			$this->Empresas->logradouro = $empresa["logradouro"];
			$this->Empresas->numero = $empresa["numero"];
			$this->Empresas->bairro = $empresa["bairro"];
			$this->Empresas->complemento = $empresa["complemento"];
			$this->Empresas->cidade = $empresa["cidade"];
			$this->Empresas->estado = $empresa["estado"];

			$this->Aux->url_empresa = $empresa["url"];
			$aux = $this->Aux->search();
			$this->Empresas->ft_miniatura = $aux[0]->foto;

			$this->Empresas->ft_capa = $empresa["ft_capa"];
			$this->Empresas->plano = $empresa["plano"];
			$this->Empresas->status = $empresa["status"];
			$this->Empresas->codigo_tag = $empresa["codigo_tag"];
			$this->Empresas->codigo_usuario = $empresa["codigo_usuario"];
			$this->Empresas->codigo_galeria = $empresa["codigo_galeria"];
			$this->Empresas->codigo_hr_funcionamento = $empresa["codigo_hr_funcionamento"];
			$this->Empresas->codigo_subcategoria = $empresa["codigo_subcategoria"];
			$this->Empresas->codigo_categoria = $empresa["codigo_categoria"];

			if(strlen($palavraschave['hashtag_1']) > 0){
				$this->PalavraChave->hashtag_1 = $palavraschave['hashtag_1'];
				$this->PalavraChave->hashtag_2 = $palavraschave['hashtag_2'];
				$this->PalavraChave->hashtag_3 = $palavraschave['hashtag_3'];
				$this->PalavraChave->hashtag_4 = $palavraschave['hashtag_4'];
				$this->PalavraChave->hashtag_5 = $palavraschave['hashtag_5'];
				$codigo_tags = $this->PalavraChave->insert();
				$this->Empresas->codigo_tag = $codigo_tags;
			}

			if(strlen($hr_funcionamento['segunda']) > 6){
				$this->Hrfuncionamento->segunda = $hr_funcionamento['segunda'];
				$this->Hrfuncionamento->terca = $hr_funcionamento['terca'];
				$this->Hrfuncionamento->quarta = $hr_funcionamento['quarta'];
				$this->Hrfuncionamento->quinta = $hr_funcionamento['quinta'];
				$this->Hrfuncionamento->sexta = $hr_funcionamento['sexta'];
				$this->Hrfuncionamento->sabado = $hr_funcionamento['sabado'];
				$this->Hrfuncionamento->domingo = $hr_funcionamento['domingo'];
				$codigo_hr = $this->Hrfuncionamento->insert();
				$this->Empresas->codigo_hr_funcionamento = $codigo_hr;
				
			}

			$codigo_empresa = $this->Empresas->insert();
			$this->session->unset_userdata('empresa');
			$this->session->unset_userdata('hr_funcionamento');
			$this->session->unset_userdata('palavraschave');
			
			//$this->Aux->codigo_aux = $aux[0]->codigo_aux;
			//$this->Aux->delete();

			$empresa = null;
			$hr_funcionamento = null;
			$palavraschave = null;

			// SEND EMAIL
			$this->load->library('email');

			$nome  = "Lista Campos";
			$email = "contato@listacampos.com.br";

			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset']  = 'utf-8';
			$config['mailtype'] = 'html';

			$this->email->initialize($config);
			$this->email->from($email, $nome);
			$this->email->to('wcosta@lhotse.com.br');
			$this->email->cc('sidney@lhotse.com.br');

			$msg = "";
			if($aux[0]->fotografo == '1')
				$msg = "O cliente solicitou uma imagem personalizada";

			$mensagem = "A empresa ".$this->Empresas->nome." cadastrou no site. Link: <a href='http://listacampos.com.br/home/perfil/".$this->Empresas->url."'>Ver perfil</a><br><br><br>".$msg."<br><br>";
			$this->email->subject('Novo cadastro no Lista Campos');
			$this->email->message($mensagem);
			$this->email->send();
		}

		$categoria = "";
		$categoriaSelecionada = "";
		$subcategoria_selecionada ="";
		$bairro_selecionado ="";
		$classificacao_selecionada = "";
		$subcategorias = null;
		$order_by = "asc";
		$numrows=0;
		$categorias = array("Selecione...", "Alimentos", "Compras", "Educação", "Saúde", "Veículos", "Utilidade públicas", "Serviços");
		$data = array('titulo' => "Lista Campos | Cadastro feito com sucesso!", 'categoriaSelecionada'=> $categoriaSelecionada, 'subcategoria_selecionada'=> $subcategoria_selecionada, 'categorias'=>$categorias);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/finalizar', $data);
		$this->load->view('layout/footer');
    }

}
