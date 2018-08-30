<?php

Class Email_model extends CI_Model {

    var $nome;
    var $email;

    public function insert()
    {
        $data = array(
            'nome'=> $this->nome,
            'email'=> $this->email
        );

        $this->db->insert('emails', $data);
    }

    public function remove()
    {
        $this->db->delete('emails', array('email' => $this->email));
    }
}