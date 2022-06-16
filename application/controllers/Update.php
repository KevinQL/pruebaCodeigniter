<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('myhelper');
		$this->load->database();
		$this->load->model('Library');
	}

	public function index($idlib)
	{	
		$data['appname'] = get_name();
		$data['idlib'] = $idlib;

		$data['items_table'] = $this->Library->get_item_select_create();
		$data['allitems'] = $this->Library->getdata_to_update_library($idlib);

		$this->load->view('update', $data);
	}

	/**
	 * Funcion api de prueba
	 */
	public function api2(){
		echo "this is a test";
	}

	public function update_ready(){

		$data = new stdClass();

		$data->idLibro = $this->input->post('idLibro');
		$data->ISBN = $this->input->post('ISBN');
		$data->Titulo = $this->input->post('Titulo');
		$data->NumeroEjemplares = $this->input->post('NumeroEjemplares');
		$data->NombreAutor = $this->input->post('NombreAutor');
		$data->NombreEditorial = $this->input->post('NombreEditorial');
		$data->NombreTema = $this->input->post('NombreTema');

		$this->Library->update_ready_Library($data);

		header("Location: ".base_url() );
		exit;
	}

}
