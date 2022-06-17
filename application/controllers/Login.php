<?php

class Login extends CI_Controller {

    public function __construct() {  
        parent::__construct();
        
        $this->load->model('Login_Model');
		$this->load->helper(array('myhelper', 'forms/get_rules'));
		$this->load->library('form_validation');
    }

    public function index() {
    
        $this->load->view('login_view');
    }

}
