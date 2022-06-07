<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('myhelper');
		$this->load->database();
	}

	public function index($idlib)
	{	
		$data['appname'] = get_name();
		$data['idlib'] = $idlib;

		$query = $this->db->query("SELECT l.idLibro, l.ISBN, l.Titulo, l.NumeroEjemplares, a.NombreAutor, e.NombreEditorial, t.NombreTema 
									FROM libro l 
									INNER JOIN autor a ON a.idAutor = l.idAutor 
									INNER JOIN editorial e ON e.idEditorial = l.idEditorial
									INNER JOIN tema t ON t.idTema = l.idTema
									WHERE l.idLibro = $idlib
								");

		$data['allitems'] = $query->result()[0];

		$this->load->view('update', $data);
	}

	public function update_ready(){

		$idLibro = $this->input->post('idLibro');
		$ISBN = $this->input->post('ISBN');
		$Titulo = $this->input->post('Titulo');
		$NumeroEjemplares = $this->input->post('NumeroEjemplares');
		$NombreAutor = $this->input->post('NombreAutor');
		$NombreEditorial = $this->input->post('NombreEditorial');
		$NombreTema = $this->input->post('NombreTema');


		$query = $this->db->query("UPDATE libro l INNER JOIN autor a ON a.idAutor = l.idAutor 
									INNER JOIN editorial e ON e.idEditorial = l.idEditorial
									INNER JOIN tema t ON t.idTema = l.idTema
									SET l.ISBN = '$ISBN', l.Titulo = '$Titulo', l.NumeroEjemplares = '$NumeroEjemplares', a.NombreAutor = '$NombreAutor', e.NombreEditorial = '$NombreEditorial', t.NombreTema = '$NombreTema'
									WHERE l.idLibro = $idLibro
								");

		echo "update ready " . $idLibro;

		header("Location: ".base_url() );
		exit;
	}

}
