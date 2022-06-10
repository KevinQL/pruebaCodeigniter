<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->helper('myhelper');
		$this->load->database();
		$this->load->model('Library');
	}

	public function index($inputisbn='')
	{	
		$data['appname'] = get_name();
		$data['inputisbn'] = $inputisbn;

		/**
		 * Obtenemos los datos del libro autor editorial y tema.
		 */
		$data['allitems'] = $this->Library->get_data($data);

		$this->load->view('panel', $data);
		
	}

	public function create(){

		/**
		 * Obtenemos items de las tablas autor editorial y tema.
		 */
		$data = $this->Library->get_item_select_create();
		
		$this->load->view('create', $data);
	}

	public function create_ready(){
		
		$data = array(
			'ISBN' => $this->input->post('ISBN'),
			'Titulo' => $this->input->post('Titulo'),
			'NumeroEjemplares' => $this->input->post('NumeroEjemplares'),
			'idAutor' => $this->input->post('NombreAutor'),
			'idEditorial' => $this->input->post('NombreEditorial'),
			'idTema' => $this->input->post('NombreTema')
		);
		
		/**
		 * Consulta para crear un nuevo item libro
		 */
		$this->Library->create_library($data);

		header("Location: ".base_url() );
		
	}


	public function delete($id){

		$this->Library->delete_library($id);

		header("Location: ".base_url() );
	}

}
