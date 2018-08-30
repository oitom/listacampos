<?php 

Class Hrfuncionamento_Model extends CI_Model
{
	var $codigo_hr_funcionamento;
	var $segunda;
	var $terca;
	var $quarta;
	var $quinta;
	var $sexta;
	var $sabado;
	var $domingo;
	var $empresa;

	public function search()
	{
		$where = array();

		if ($this->codigo_hr_funcionamento)
			$where['codigo_hr_funcionamento'] = $this->codigo_hr_funcionamento;
		if ($this->segunda)
			$where['segunda'] = $this->segunda;
		if ($this->terca)
			$where['terca'] = $this->terca;
		if ($this->quarta)
			$where['quarta'] = $this->quarta;
		if ($this->quinta)
			$where['quinta'] = $this->quinta;
		if ($this->sexta)
			$where['sexta'] = $this->sexta;
		if ($this->sabado)
			$where['sabado'] = $this->sabado;
		if ($this->domingo)
			$where['domingo'] = $this->domingo;

		$query = $this->db->get_where('HRFUNCIONAMENTO', $where);
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
		$query = $this->db->get('HRFUNCIONAMENTO');
		return $query->result();
	}

	public function join($tabela)
	{
		$hr_funcionamento = $this->get();

		if(isset($tabela['EMPRESA']))
		{
			$this->load->model("Empresa_model", "Empresa");
			$this->Empresa->codigo_hr_funcionamento = $hr_funcionamento->codigo_hr_funcionamento;
			$empresa = $this->Empresa->get();
			$hr_funcionamento->empresa = $empresa;
		}
		return $hr_funcionamento;
	}

	public function delete()
	{
		$this->db->delete('HRFUNCIONAMENTO', $this->codigo_hr_funcionamento);
	}

	public function update()
	{
		$data = array();

		if ($this->segunda)
			$data['segunda'] = $this->segunda;
		if ($this->terca)
			$data['terca'] = $this->terca;
		if ($this->quarta)
			$data['quarta'] = $this->quarta;
		if ($this->quinta)
			$data['quinta'] = $this->quinta;
		if ($this->sexta)
			$data['sexta'] = $this->sexta;
		if ($this->sabado)
			$data['sabado'] = $this->sabado;
		if ($this->domingo)
			$data['domingo'] = $this->domingo;

		$this->db->where('codigo_hr_funcionamento', $this->codigo_hr_funcionamento);
		$this->db->update('HRFUNCIONAMENTO', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_hr_funcionamento' => $this->codigo_hr_funcionamento,
			'segunda' => $this->segunda,
			'terca' => $this->terca,
			'quarta' => $this->quarta,
			'quinta' => $this->quinta,
			'sexta' => $this->sexta,
			'sabado' => $this->sabado,
			'domingo' => $this->domingo
		);

		$this->db->insert('HRFUNCIONAMENTO', $data);
		$lastid = $this->db->insert_id();

		return $lastid;
	}
}