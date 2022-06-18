<?php

class Login extends CI_Controller {

    public function __construct() {  
        parent::__construct();
        $this->load->database();
        $this->load->model('Login_Model');
		$this->load->helper(array('myhelper', 'forms/get_rules'));
		$this->load->library(array('form_validation', 'session'));
    }

    /**
     * 
     */
    public function index() {
    
        $this->load->view('login_view');
    }

    /**
     * 
     */
    public function login_user() {

        $config = array(
            array(
                "field" => "email",
                "label" => "correo electronico",
                "rules" => "required|trim|valid_email",
                "errors" => array(
                    "required" => "Se requiere el %s",
                )
                ),
            array(
                "field" => "password",
                "label" => "contraseña",
                "rules" => "required|trim",
                "errors" => array(
                    "required" => "Se requiere la %s",
                )
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
            $errors = array(
                'email' => form_error('email'),
                'password' => form_error('password')
            );
            $this->output->set_status_header(400);
            echo json_encode($errors);

        }else {
            $data = new stdClass();
            $data->email = $this->input->post('email');
            $data->password = $this->input->post('password');      
            $result = $this->Login_Model->get_user($data);
            if(empty($result)){
                $this->form_validation->set_error_delimiters('', '');
                $errors = array(
                    'msj' => 'No existe el usuario en la base de datos'
                );
                echo json_encode($errors);
                $this->output->set_status_header(401);
                exit;
            }else{
                $row = $result[0];
                $newdata = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'pass' => $row->pass,
                    'is_logged' => TRUE
                );
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('msj_session', 'Bienvenido al sistema ' . $row->email);
                echo json_encode( array( 'url' => base_url('welcome') ) );
            }
        }

    }

    /**
     * 
     */
    public function logout(){
        
        $vars = array('id', 'email', 'pass', 'is_logued');
        $this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect(base_url('login'));

    }

}
