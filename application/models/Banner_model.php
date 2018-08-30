<?php 

Class Banner_Model extends CI_Model
{
	var $codigo_banner;
	var $foto;
	var $url;
	var $nome;
	var $legenda;
	var $codigo_empresa;
	var $empresa;

	public function search()
	{
		$where = array();

		if ($this->codigo_banner)
			$where['codigo_banner'] = $this->codigo_banner;
		if ($this->foto)
			$where['foto'] = $this->foto;
		if ($this->url)
			$where['url'] = $this->url;
		if ($this->nome)
			$where['nome'] = $this->nome;
		if ($this->legenda)
			$where['legenda'] = $this->legenda;
		if ($this->codigo_empresa)
			$where['codigo_empresa'] = $this->codigo_empresa;

		$query = $this->db->get_where('BANNER', $where);
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
		$query = $this->db->get('BANNER');
		return $query->result();
	}

	public function join($tabela)
	{
		$banner = $this->get();

		if(isset($tabela['EMPRESA']))
		{
			$this->load->model("Empresa_model", "Empresa");
			$this->Empresa->codigo_empresa = $banner->codigo_empresa;
			$empresa = $this->Empresa->get();
			$banner->empresa = $empresa;
		}
		return $banner;
	}

	public function delete()
	{
		$this->db->delete('BANNER', $this->codigo_banner);
	}

	public function update()
	{
		$data = array();

		if ($this->foto)
			$data['foto'] = $this->foto;
		if ($this->url)
			$data['url'] = $this->url;
		if ($this->nome)
			$data['nome'] = $this->nome;
		if ($this->legenda)
			$data['legenda'] = $this->legenda;
		if ($this->codigo_empresa)
			$data['codigo_empresa'] = $this->codigo_empresa;

		$this->db->where('codigo_banner', $this->codigo_banner);
		$this->db->update('BANNER', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_banner' => $this->codigo_banner,
			'foto' => $this->foto,
			'url' => $this->url,
			'nome' => $this->nome,
			'legenda' => $this->legenda,
			'codigo_empresa' => $this->codigo_empresa
		);
		$this->db->insert('BANNER', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}