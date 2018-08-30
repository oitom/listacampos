<?php 

Class Aux_Model extends CI_Model
{
	var $codigo_aux;
	var $foto;
	var $fotografo;
	var $url_empresa;
	var $empresa;

	public function search()
	{
		$where = array();

		if ($this->codigo_aux)
			$where['codigo_aux'] = $this->codigo_aux;
		if ($this->foto)
			$where['foto'] = $this->foto;
		if ($this->fotografo)
			$where['fotografo'] = $this->fotografo;
		if ($this->url_empresa)
			$where['url_empresa'] = $this->url_empresa;

		$query = $this->db->get_where('AUX', $where);
		return $query->result();
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
		$query = $this->db->get('AUX');
		return $query->result();
	}

	public function join($tabela)
	{
		$aux = $this->get();

		if(isset($tabela['EMPRESA']))
		{
			$this->load->model("Empresa_model", "Empresa");
			$this->Empresa->url = $aux->url_empresa;
			$empresa = $this->Empresa->get();
			$aux->empresa = $empresa;
		}
		return $aux;
	}

	public function delete()
	{
		$this->db->delete('AUX', $this->codigo_aux);
	}

	public function update()
	{
		$data = array();

		if ($this->foto)
			$data['foto'] = $this->foto;
		if ($this->fotografo)
			$data['fotografo'] = $this->fotografo;
		if ($this->url_empresa)
			$data['url_empresa'] = $this->url_empresa;

		$this->db->where('codigo_aux', $this->codigo_aux);
		$this->db->update('AUX', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_aux' => $this->codigo_aux,
			'foto' => $this->foto,
			'fotografo' => $this->fotografo,
			'url_empresa' => $this->url_empresa
		);

		$this->db->insert('AUX', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}

	public function like($parametro_especifico=null)
	{
		$parametro = $parametro_especifico;
		$this->db->like('foto', $parametro);
		$this->db->or_like('fotografo', $parametro);
		$this->db->or_like('url_empresa', $parametro);
		
		$resultado = $this->db->get('AUX');
		
		return $resultado->result();
	}
}