<?php 

Class Usuario_Model extends CI_Model
{
	var $codigo_usuario;
	var $nome;
	var $email;
	var $senha;
	var $status;
	var $empresa;

	public function search()
	{
		$where = array();

		if ($this->codigo_usuario)
			$where['codigo_usuario'] = $this->codigo_usuario;
		if ($this->nome)
			$where['nome'] = $this->nome;
		if ($this->email)
			$where['email'] = $this->email;
		if ($this->senha)
			$where['senha'] = $this->senha;
		if ($this->status)
			$where['status'] = $this->status;

		$query = $this->db->get_where('USUARIO', $where);
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
		$query = $this->db->get('USUARIO');
		return $query->result();
	}

	public function join($tabela)
	{
		$usuario = $this->get();

		if(isset($tabela['EMPRESA']))
		{
			$this->load->model("Empresa_model", "Empresa");
			$this->Empresa->codigo_usuario = $usuario->codigo_usuario;
			$empresa = $this->Empresa->get();
			$usuario->empresa = $empresa;
		}
		return $usuario;
	}

	public function delete()
	{
		$this->db->delete('USUARIO', $this->codigo_usuario);
	}

	public function update()
	{
		$data = array();

		if ($this->nome)
			$data['nome'] = $this->nome;
		if ($this->email)
			$data['email'] = $this->email;
		if ($this->senha)
			$data['senha'] = $this->senha;
		if ($this->status)
			$data['status'] = $this->status;
		
		$this->db->where('codigo_usuario', $this->codigo_usuario);
		$this->db->update('USUARIO', $data);
	}

	public function insert()
	{
		$data = array(
			'codigo_usuario' => $this->codigo_usuario,
			'nome' => $this->nome,
			'email' => $this->email,
			'senha' => $this->senha,
			'status' => $this->status
		);
		$this->db->insert('USUARIO', $data);

		$lastid = $this->db->insert_id();

		return $lastid;
	}
}