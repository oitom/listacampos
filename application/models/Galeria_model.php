<?php 

Class Galeria_Model extends CI_Model
{
	var $codigo_galeria;
	var $foto_1;
	var $foto_2;
	var $foto_3;
	var $foto_4;
	var $foto_5;
	var $empresa;

	public function search()
	{
		$where = array();

		if ($this->codigo_galeria)
			$where['codigo_galeria'] = $this->codigo_galeria;
		if ($this->foto_1)
			$where['foto_1'] = $this->foto_1;
		if ($this->foto_2)
			$where['foto_2'] = $this->foto_2;
		if ($this->foto_3)
			$where['foto_3'] = $this->foto_3;
		if ($this->foto_4)
			$where['foto_4'] = $this->foto_4;
		if ($this->foto_5)
			$where['foto_5'] = $this->foto_5;

		$query = $this->db->get_where('GALERIA', $where);
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
		$query = $this->db->get('GALERIA');
		return $query->result();
	}

	public function join($tabela)
	{
		$galeria = $this->get();

		if(isset($tabela['EMPRESA']))
		{
			$this->load->model("Empresa_model", "Empresa");
			$this->Empresa->codigo_galeria = $galeria->codigo_galeria;
			$empresa = $this->Empresa->get();
			$galeria->empresa = $empresa;
		}
		return $galeria;
	}

	public function delete()
	{
		$this->db->delete('GALERIA', $this->codigo_galeria);
	}

	public function update()
	{
		$data = array();

		if ($this->foto_1)
			$data['foto_1'] = $this->foto_1;
		if ($this->foto_2)
			$data['foto_2'] = $this->foto_2;
		if ($this->foto_3)
			$data['foto_3'] = $this->foto_3;
		if ($this->foto_4)
			$data['foto_4'] = $this->foto_4;
		if ($this->foto_5)
			$data['foto_5'] = $this->foto_5;

		$this->db->where('codigo_galeria', $this->codigo_galeria);
		$this->db->update('GALERIA', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_galeria' => $this->codigo_galeria,
			'foto_1' => $this->foto_1,
			'foto_2' => $this->foto_2,
			'foto_3' => $this->foto_3,
			'foto_4' => $this->foto_4,
			'foto_5' => $this->foto_5
		);
		$this->db->insert('GALERIA', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}