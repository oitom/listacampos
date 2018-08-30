<?php 

Class Count_Model extends CI_Model
{
	var $codigo;
	var $codigo_empresa;
	var $qtd;

	public function search()
	{
		$where = array();

		if ($this->codigo)
			$where['codigo'] = $this->codigo;
		if ($this->codigo_empresa)
			$where['codigo_empresa'] = $this->codigo_empresa;
		if ($this->qtd)
			$where['qtd'] = $this->qtd;

		$query = $this->db->get_where('COUNT', $where);
		
		//$registros = $query->result();

		return $query->num_rows();
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
		$query = $this->db->get('COUNT');
		return $query->result();
	}

	public function delete()
	{
		$this->db->delete('COUNT', $this->codigo);
	}

	public function insert()
	{
		$data = array(
			'codigo' => $this->codigo,
			'codigo_empresa' => $this->codigo_empresa,
			'qtd' => $this->qtd
		);
		$this->db->insert('COUNT', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}