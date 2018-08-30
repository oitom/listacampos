<?php 

Class Categoria_Model extends CI_Model
{
	var $codigo_categoria;
	var $categoria;
	var $subcategoria;

	public function search()
	{
		$where = array();

		if ($this->codigo_categoria)
			$where['codigo_categoria'] = $this->codigo_categoria;
		if ($this->categoria)
			$where['categoria'] = $this->categoria;

		$query = $this->db->get_where('CATEGORIA', $where);
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
		$query = $this->db->get('CATEGORIA');
		return $query->result();
	}

	public function join($tabela)
	{
		$categoria = $this->get();

		if(isset($tabela['SUBCATEGORIA']))
		{
			$this->load->model("Subcategoria_model", "Subcategoria");
			$this->Subcategoria->codigo_categoria = $categoria->codigo_categoria;
			$subcategoria = $this->Subcategoria->get();
			$categoria->subcategoria = $subcategoria;
		}
		return $categoria;
	}

	public function delete()
	{
		$this->db->delete('CATEGORIA', $this->codigo_categoria);
	}

	public function update()
	{
		$data = array();

		if ($this->categoria)
			$data['categoria'] = $this->categoria;
		
		$this->db->where('codigo_categoria', $this->codigo_categoria);
		$this->db->update('CATEGORIA', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_categoria' => $this->codigo_categoria,
			'categoria' => $this->categoria,
		);
		$this->db->insert('CATEGORIA', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}