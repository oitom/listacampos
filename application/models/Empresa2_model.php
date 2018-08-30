<?php 

Class Empresa_Model extends CI_Model
{
	var $codigo_empresa;
	var $url;
	var $nome;
	var $descricao;
	var $telefone;
	var $whatsapp;
	var $email;
	var $site;
	var $facebook;
	var $instagram;
	var $logradouro;
	var $numero;
	var $bairro;
	var $complemento;
	var $cidade;
	var $estado;
	var $ft_miniatura;
	var $ft_capa;
	var $plano;
	var $status;
	var $codigo_tag;
	var $codigo_usuario;
	var $codigo_galeria;
	var $codigo_hr_funcionamento;
	var $codigo_subcategoria;
	var $codigo_categoria;
	var $tag;
	var $galeria;
	var $hr_funcionamento;
	var $url_mapa;

	public function search($inicio = 0, $limite = null, $order="")
	{
		$where = array();

		if ($this->codigo_empresa)
			$where['codigo_empresa'] = $this->codigo_empresa;
		if ($this->url)
			$where['url'] = $this->url;
		if ($this->nome)
			$where['nome'] = $this->nome;
		if ($this->descricao)
			$where['descricao'] = $this->descricao;
		if ($this->telefone)
			$where['telefone'] = $this->telefone;
		if ($this->whatsapp)
			$where['whatsapp'] = $this->whatsapp;
		if ($this->email)
			$where['email'] = $this->email;
		if ($this->site)
			$where['site'] = $this->site;
		if ($this->facebook)
			$where['facebook'] = $this->facebook;
		if ($this->instagram)
			$where['instagram'] = $this->instagram;
		if ($this->logradouro)
			$where['logradouro'] = $this->logradouro;
		if ($this->numero)
			$where['numero'] = $this->numero;
		if ($this->bairro)
			$where['bairro'] = $this->bairro;
		if ($this->complemento)
			$where['complemento'] = $this->complemento;
		if ($this->cidade)
			$where['cidade'] = $this->cidade;
		if ($this->estado)
			$where['estado'] = $this->estado;
		if ($this->ft_miniatura)
			$where['ft_miniatura'] = $this->ft_miniatura;
		if ($this->ft_capa)
			$where['ft_capa'] = $this->ft_capa;
		if ($this->codigo_categoria)
			$where['codigo_categoria'] = $this->codigo_categoria;
		if ($this->codigo_subcategoria)
			$where['codigo_subcategoria'] = $this->codigo_subcategoria;
		if ($this->plano)
			$where['plano'] = $this->plano;
		if ($this->status)
			$where['status'] = $this->status;
		if ($this->codigo_tag)
			$where['codigo_tag'] = $this->codigo_tag;
		if ($this->codigo_galeria)
			$where['codigo_galeria'] = $this->codigo_galeria;
		if ($this->codigo_hr_funcionamento)
			$where['codigo_hr_funcionamento'] = $this->codigo_hr_funcionamento;
		if ($this->codigo_usuario)
			$where['codigo_usuario'] = $this->codigo_usuario;
		if ($this->url_mapa)
			$where['url_mapa'] = $this->url_mapa;

		$this->db->order_by("nome", $order);
		$qry = $this->db->get_where('EMPRESA', $where, $limite, $inicio);
		$empresa = $qry->result(); 

		return $empresa;
	}

	public function searchJoin($tabela = null, $inicio = 0, $limite = null, $order="plano")
	{
		$empresa = $this->search($inicio, $limite, $order);
		$i = 0;

		while ($i < count($empresa)) {
			
			if(isset($tabela['TAG']))
			{
				$this->load->model("Tag_model", "Tag");
				$this->Tag->codigo_tag = $empresa[$i]->codigo_tag;

				if($empresa[$i]->codigo_tag != ""){
					if (is_array($tabela['TAG']))
						$tag = $this->Tag->join($tabela['TAG']);	
					else	
						$tag = $this->Tag->get();			

					$empresa[$i]->tag = $tag;
				}
			}
			if (isset($tabela['GALERIA']))
			{
				$this->load->model("Galeria_model", "Galeria");
				$this->Galeria->codigo_galeria = $empresa[$i]->codigo_galeria;
				
				if($empresa[$i]->codigo_galeria != ""){
					if (is_array($tabela['GALERIA']))
						$galeria = $this->Galeria->join($tabela['GALERIA']);
					else	
						$galeria = $this->Galeria->get();
					$empresa[$i]->galeria = $galeria;
				}		
			}
			if (isset($tabela['HRFUNCIONAMENTO']))
			{
				$this->load->model("Hrfuncionamento_model", "Hrfuncionamento");
				$this->Hrfuncionamento->codigo_hr_funcionamento = $empresa[$i]->codigo_hr_funcionamento;
				
				if($empresa[$i]->codigo_hr_funcionamento != ""){
					if (is_array($tabela['HRFUNCIONAMENTO']))
						$hr_funcionamento = $this->Hrfuncionamento->join($tabela['HRFUNCIONAMENTO']);
					else	
						$hr_funcionamento = $this->Hrfuncionamento->get();
					$empresa[$i]->hr_funcionamento = $hr_funcionamento;
				}		
			}
			if (isset($tabela['CATEGORIA']))
			{
				$this->load->model("Categoria_model", "Categoria");
				$this->Categoria->codigo_categoria = $empresa[$i]->codigo_categoria;
				
				if (is_array($tabela['CATEGORIA']))
					$categoria = $this->Categoria->join($tabela['CATEGORIA']);
				else	
					$categoria = $this->Categoria->get();
				$empresa[$i]->codigo_categoria = $categoria;
			}
			if (isset($tabela['SUBCATEGORIA']))
			{
				$this->load->model("Subcategoria_model", "Subcategoria");
				$this->Subcategoria->codigo_subcategoria = $empresa[$i]->codigo_subcategoria;
				
				if (is_array($tabela['SUBCATEGORIA']))
					$subcategoria = $this->Subcategoria->join($tabela['SUBCATEGORIA']);
				else	
					$subcategoria = $this->Subcategoria->get();
				
				$empresa[$i]->codigo_subcategoria = $subcategoria;
			}
			$i++;
		}	
		return $empresa;
	}

	public function get()
	{
		$resultados = $this->search();
		
		if(!empty($resultados))
			return $this->search()[0];
		else
			return null;
	}

	public function getAll()
	{
		$query = $this->db->get('EMPRESA');
		return $query->result();
	}

	public function join($tabela)
	{
		$empresa = $this->get();

		if(isset($tabela['TAG']))
		{
			$this->load->model("Tag_model", "Tag");
			$this->Tag->codigo_tag = $empresa->codigo_tag;
			if(count($empresa->codigo_tag) > 0){
				$tag = $this->Tag->get();
				$empresa->tag = $tag;
			}
		}
		if(isset($tabela['GALERIA']))
		{
			$this->load->model("Galeria_model", "Galeria");
			$this->Galeria->codigo_galeria = $empresa->codigo_galeria;
			$galeria = $this->Galeria->get();
			$empresa->galeria = $galeria;
		}
		if(isset($tabela['HRFUNCIONAMENTO']))
		{
			$this->load->model("Hrfuncionamento_model", "Hrfuncionamento");
			$this->Hrfuncionamento->codigo_hr_funcionamento = $empresa->codigo_hr_funcionamento;
			$hr_funcionamento = $this->Hrfuncionamento->get();
			$empresa->hr_funcionamento = $hr_funcionamento;
		}
		if(isset($tabela['CATEGORIA']))
		{
			$this->load->model("Categoria_model", "Categoria");
			$this->Categoria->codigo_categoria = $empresa->codigo_categoria;
			$categoria = $this->Categoria->get();
			$empresa->codigo_categoria = $categoria;
		}
		if(isset($tabela['SUBCATEGORIA']))
		{
			$this->load->model("Subcategoria_model", "Subcategoria");
			$this->Subcategoria->codigo_subcategoria = $empresa->codigo_subcategoria;
			$subcategoria = $this->Subcategoria->get();
			$empresa->codigo_subcategoria = $subcategoria;
		}
		return $empresa;
	}

	public function delete()
	{
		$this->db->delete('EMPRESA', $this->codigo_empresa);
	}

	public function update()
	{
		$data = array();

		if ($this->codigo_empresa)
			$data['codigo_empresa'] = $this->codigo_empresa;
		if ($this->url)
			$data['url'] = $this->url;
		if ($this->nome)
			$data['nome'] = $this->nome;
		if ($this->descricao)
			$data['descricao'] = $this->descricao;
		if ($this->telefone)
			$data['telefone'] = $this->telefone;
		if ($this->whatsapp)
			$data['whatsapp'] = $this->whatsapp;
		if ($this->email)
			$data['email'] = $this->email;
		if ($this->site)
			$data['site'] = $this->site;
		if ($this->facebook)
			$data['facebook'] = $this->facebook;
		if ($this->instagram)
			$data['instagram'] = $this->instagram;
		if ($this->logradouro)
			$data['logradouro'] = $this->logradouro;
		if ($this->numero)
			$data['numero'] = $this->numero;
		if ($this->bairro)
			$data['bairro'] = $this->bairro;
		if ($this->complemento)
			$data['complemento'] = $this->complemento;
		if ($this->cidade)
			$data['cidade'] = $this->cidade;
		if ($this->estado)
			$data['estado'] = $this->estado;
		if ($this->ft_miniatura)
			$data['ft_miniatura'] = $this->ft_miniatura;
		if ($this->ft_capa)
			$data['ft_capa'] = $this->ft_capa;
		if ($this->codigo_categoria)
			$data['codigo_categoria'] = $this->codigo_categoria;
		if ($this->codigo_subcategoria)
			$data['codigo_subcategoria'] = $this->codigo_subcategoria;
		if ($this->plano)
			$data['plano'] = $this->plano;
		if ($this->status)
			$data['status'] = $this->status;
		if ($this->codigo_tag)
			$data['codigo_tag'] = $this->codigo_tag;
		if ($this->codigo_galeria)
			$data['codigo_galeria'] = $this->codigo_galeria;
		if ($this->codigo_hr_funcionamento)
			$data['codigo_hr_funcionamento'] = $this->codigo_hr_funcionamento;
		if ($this->codigo_usuario)
			$data['codigo_usuario'] = $this->codigo_usuario;
		if ($this->url_mapa)
			$data['url_mapa'] = $this->url_mapa;

		$this->db->where('codigo_empresa', $this->codigo_empresa);
		$this->db->update('EMPRESA', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_empresa' => $this->codigo_empresa,
			'url' => $this->url,
			'nome' => $this->nome,
			'descricao' => $this->descricao,
			'telefone' => $this->telefone,
			'whatsapp' => $this->whatsapp,
			'email' => $this->email,
			'site' => $this->site,
			'facebook' => $this->facebook,
			'instagram' => $this->instagram,
			'logradouro' => $this->logradouro,
			'numero' => $this->numero,
			'bairro' => $this->bairro,
			'complemento' => $this->complemento,
			'cidade' => $this->cidade,
			'estado' => $this->estado,
			'ft_miniatura' => $this->ft_miniatura,
			'ft_capa' => $this->ft_capa,
			'codigo_categoria' => $this->codigo_categoria,
			'codigo_subcategoria' => $this->codigo_subcategoria,
			'plano' => $this->plano,
			'status' => $this->status,
			'codigo_tag' => $this->codigo_tag,
			'codigo_galeria' => $this->codigo_galeria,
			'codigo_hr_funcionamento' => $this->codigo_hr_funcionamento,
			'codigo_usuario' => $this->codigo_usuario,
			'url_mapa' => $this->url_mapa
		);
		
		$this->db->insert('EMPRESA', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}

	public function like($parametro_especifico=null)
	{
		$parametro = $parametro_especifico;
		$this->db->like('url', $parametro);
		$this->db->or_like('nome', $parametro);
		$this->db->or_like('descricao', $parametro);
		$this->db->or_like('telefone', $parametro);
		$this->db->or_like('whatsapp', $parametro);
		$this->db->or_like('email', $parametro);
		$this->db->or_like('site', $parametro);
		$this->db->or_like('facebook', $parametro);
		$this->db->or_like('instagram', $parametro);
		$this->db->or_like('logradouro', $parametro);
		$this->db->or_like('numero', $parametro);
		$this->db->or_like('bairro', $parametro);
		$this->db->or_like('complemento', $parametro);
		$this->db->or_like('cidade', $parametro);
		$this->db->or_like('estado', $parametro);
		
		$resultado = $this->db->get('EMPRESA');
		
		return $resultado->result();
	}

	public function likeJoin($tabela, $value)
	{
		$empresa = $this->like($value);
		$i = 0;

		while ($i < count($empresa)) {
			
			if(isset($tabela['TAG']))
			{
				$this->load->model("Tag_model", "Tag");
				$this->Tag->codigo_tag = $empresa[$i]->codigo_tag;

				if (is_array($tabela['TAG']))
					$tag = $this->Tag->join($tabela['TAG']);	
				else	
					$tag = $this->Tag->get();			

				$empresa[$i]->tag = $tag;
			}
			if (isset($tabela['GALERIA']))
			{
				$this->load->model("Galeria_model", "Galeria");
				$this->Galeria->codigo_galeria = $empresa[$i]->codigo_galeria;
				
				if (is_array($tabela['GALERIA']))
					$galeria = $this->Galeria->join($tabela['GALERIA']);
				else	
					$galeria = $this->Galeria->get();
				$empresa[$i]->galeria = $galeria;
			}
			if (isset($tabela['HRFUNCIONAMENTO']))
			{
				$this->load->model("Hrfuncionamento_model", "Hrfuncionamento");
				$this->Hrfuncionamento->codigo_hr_funcionamento = $empresa[$i]->codigo_hr_funcionamento;
				
				if (is_array($tabela['HRFUNCIONAMENTO']))
					$hr_funcionamento = $this->Hrfuncionamento->join($tabela['HRFUNCIONAMENTO']);
				else	
					$hr_funcionamento = $this->Hrfuncionamento->get();
				$empresa[$i]->hr_funcionamento = $hr_funcionamento;
			}
			if (isset($tabela['CATEGORIA']))
			{
				$this->load->model("Categoria_model", "Categoria");
				$this->Categoria->codigo_categoria = $empresa[$i]->codigo_categoria;
				
				if (is_array($tabela['CATEGORIA']))
					$categoria = $this->Categoria->join($tabela['CATEGORIA']);
				else	
					$categoria = $this->Categoria->get();
				$empresa[$i]->codigo_categoria = $categoria;
			}
			if (isset($tabela['SUBCATEGORIA']))
			{
				$this->load->model("Subcategoria_model", "Subcategoria");
				$this->Subcategoria->codigo_subcategoria = $empresa[$i]->codigo_subcategoria;
				
				if (is_array($tabela['SUBCATEGORIA']))
					$subcategoria = $this->Subcategoria->join($tabela['SUBCATEGORIA']);
				else	
					$subcategoria = $this->Subcategoria->get();
				
				$empresa[$i]->codigo_subcategoria = $subcategoria;
			}
			$i++;
		}	
		return $empresa;
	}

}