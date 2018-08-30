<?php 

Class Tag_Model extends CI_Model
{
	var $codigo_tag;
	var $hashtag_1;
	var $hashtag_2;
	var $hashtag_3;
	var $hashtag_4;
	var $hashtag_5;
	var $empresa;

	public function search()
	{
		$where = array();

		if ($this->codigo_tag)
			$where['codigo_tag'] = $this->codigo_tag;
		if ($this->hashtag_1)
			$where['hashtag_1'] = $this->hashtag_1;
		if ($this->hashtag_2)
			$where['hashtag_2'] = $this->hashtag_2;
		if ($this->hashtag_3)
			$where['hashtag_3'] = $this->hashtag_3;
		if ($this->hashtag_4)
			$where['hashtag_4'] = $this->hashtag_4;
		if ($this->hashtag_5)
			$where['hashtag_5'] = $this->hashtag_5;

		$query = $this->db->get_where('TAG', $where);
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
		$query = $this->db->get('TAG');
		return $query->result();
	}

	public function join($tabela)
	{
		$tag = $this->get();

		if(isset($tabela['EMPRESA']))
		{
			$this->load->model("Empresa_model", "Empresa");
			$this->Empresa->codigo_tag = $tag->codigo_tag;
			$empresa = $this->Empresa->get();
			$tag->empresa = $empresa;
		}
		return $tag;
	}

	public function delete()
	{
		$this->db->delete('TAG', $this->codigo_tag);
	}

	public function update()
	{
		$data = array();

		if ($this->hashtag_1)
			$data['hashtag_1'] = $this->hashtag_1;
		if ($this->hashtag_2)
			$data['hashtag_2'] = $this->hashtag_2;
		if ($this->hashtag_3)
			$data['hashtag_3'] = $this->hashtag_3;
		if ($this->hashtag_4)
			$data['hashtag_4'] = $this->hashtag_4;
		if ($this->hashtag_5)
			$data['hashtag_5'] = $this->hashtag_5;

		$this->db->where('codigo_tag', $this->codigo_tag);
		$this->db->update('TAG', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_tag' => $this->codigo_tag,
			'hashtag_1' => $this->hashtag_1,
			'hashtag_2' => $this->hashtag_2,
			'hashtag_3' => $this->hashtag_3,
			'hashtag_4' => $this->hashtag_4,
			'hashtag_5' => $this->hashtag_5
		);
		$this->db->insert('TAG', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}

	public function like($parametro_especifico=null)
	{
		$parametro = $parametro_especifico;
		$this->db->like('hashtag_1', $parametro, 'after');
		$this->db->or_like('hashtag_2', $parametro, 'after');
		$this->db->or_like('hashtag_3', $parametro, 'after');
		$this->db->or_like('hashtag_4', $parametro, 'after');
		$this->db->or_like('hashtag_5', $parametro, 'after');
		
		$resultado = $this->db->get('TAG');
		
		return $resultado->result();
	}
}