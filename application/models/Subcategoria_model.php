<?php 

Class Subcategoria_Model extends CI_Model
{
	var $codigo_subcategoria;
	var $subcategoria;

	public function search()
	{
		$where = array();

		if ($this->codigo_subcategoria)
			$where['codigo_subcategoria'] = $this->codigo_subcategoria;
		if ($this->subcategoria)
			$where['subcategoria'] = $this->subcategoria;

		$query = $this->db->get_where('SUBCATEGORIA', $where);
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
		$query = $this->db->get('SUBCATEGORIA');
		return $query->result();
	}

	public function join($tabela)
	{
		$subcategoria = $this->get();

		if(isset($tabela['CATEGORIA']))
		{
			$this->load->model("Categoria_model", "Categoria");
			$this->Categoria->codigo_categoria = $subcategoria->codigo_categoria;
			$categoria = $this->Categoria->get();
			$subcategoria->categoria = $categoria;
		}
		return $subcategoria;
	}

	public function delete()
	{
		$this->db->delete('SUBCATEGORIA', $this->codigo_subcategoria);
	}

	public function update()
	{
		$data = array();

		if ($this->subcategoria)
			$data['subcategoria'] = $this->subcategoria;
		
		$this->db->where('codigo_subcategoria', $this->codigo_subcategoria);
		$this->db->update('SUBCATEGORIA', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_subcategoria' => $this->codigo_subcategoria,
			'subcategoria' => $this->subcategoria,
		);
		$this->db->insert('SUBCATEGORIA', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}