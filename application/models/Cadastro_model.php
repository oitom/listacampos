<?php

Class Cadastro_model extends CI_Model {

    var $codigo;
    var $nome;
    var $email;

    public function insert()
    {
        $data = array(
            'codigo'=> $this->codigo,
            'nome'=> $this->nome,
            'email'=> $this->email
        );

        $this->db->insert('CADASTROSITE', $data);
    }

    public function remove()
    {
        $this->db->delete('CADASTROSITE', array('email' => $this->email));
    }
}