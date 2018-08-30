<?php 

Class Urlsubcategoria_Model extends CI_Model
{
	var $codigo_subcategoria;
	var $url;
	var $subcategoria;

	public function search()
	{
		$where = array();

		if ($this->codigo_subcategoria)
			$where['codigo_subcategoria'] = $this->codigo_subcategoria;
		if ($this->url)
			$where['url'] = $this->url;

		$query = $this->db->get_where('URLSUBCATEGORIA', $where);
		
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
		$query = $this->db->get('URLSUBCATEGORIA');
		return $query->result();
	}

	public function join($tabela)
	{
		$urlsubcategoria = $this->get();

		if(isset($tabela['SUBCATEGORIA']))
		{
			$this->load->model("Subcategoria_model", "Subcategoria");
			$this->Subcategoria->codigo_subcategoria = $urlsubcategoria->codigo_subcategoria;
			$subcategoria = $this->Subcategoria->get();
			$urlsubcategoria->subcategoria = $subcategoria;
		}
		return $urlsubcategoria;
	}

	public function delete()
	{
		$this->db->delete('URLSUBCATEGORIA', $this->codigo_subcategoria);
	}

	public function update()
	{
		$data = array();

		if ($this->url)
			$data['url'] = $this->url;
		
		$this->db->where('codigo_subcategoria', $this->codigo_subcategoria);
		$this->db->update('URLSUBCATEGORIA', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_subcategoria' => $this->codigo_subcategoria,
			'url' => $this->url,
		);
		$this->db->insert('URLSUBCATEGORIA', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}