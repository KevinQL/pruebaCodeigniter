<?php

class Login_Model extends CI_Model{

    function __construct(){
        $this->load->database();
    }

    public function get_user($data) {
        $query = $this->db->get_where('usuarios',  
                            array(
                                'email' => $data->email, 
                                'pass' => $data->password 
                            )
                );
        return $query->result();
    }

}