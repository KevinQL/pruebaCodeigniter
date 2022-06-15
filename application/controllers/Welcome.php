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
		
		$this->load->database();
		$this->load->model('Library');
		$this->load->helper(array('myhelper', 'forms/get_rules'));
		$this->load->library('form_validation');
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
		 * Validar campos del form de insersion
		 */
		$config = get_create_rules();
		
		$this->form_validation->set_rules($config);
		
		/**
		 * Consulta para crear un nuevo item libro
		 */
		if ($this->form_validation->run() == FALSE)
		{
			//En el caso de que no se logre la validación de create

			/**
			 * Obtenemos items de las tablas autor editorial y tema.
			 */
			$data = $this->Library->get_item_select_create();
			$this->load->view('create', $data);

		}else
		{
			// Insertar el nuevo registro libro
			$this->Library->create_library($data);
			
			/**
			 * 
			 * Estos parametros se requieren para imprimir la vista principal panel
			 */
			$data['appname'] = get_name();
			$data['inputisbn'] = '';

			/**
			 * Obtenemos los datos del libro autor editorial y tema.
			 */
			$data['allitems'] = $this->Library->get_data($data);
			$this->load->view('panel', $data);
			
			// header("Location: ".base_url() );
		}
		
		
	}


	public function delete($id){

		$this->Library->delete_library($id);

		header("Location: ".base_url() );
	}

}
