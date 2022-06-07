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
	}

	public function index()
	{	
		$data['appname'] = get_name();

		$query = $this->db->query('SELECT l.idLibro, l.ISBN, l.Titulo, l.NumeroEjemplares, a.NombreAutor, e.NombreEditorial, t.NombreTema 
									FROM libro l 
									INNER JOIN autor a ON a.idAutor = l.idAutor 
									INNER JOIN editorial e ON e.idEditorial = l.idEditorial
									INNER JOIN tema t ON t.idTema = l.idTema'
								);

		$data['allitems'] = $query->result();

		$this->load->view('panel', $data);
		
	}

	public function create(){

		$query = $this->db->query("SELECT * FROM autor");
		$data['allautor'] = $query->result();

		$query = $this->db->query("SELECT * FROM editorial");
		$data['alleditorial'] = $query->result();

		$query = $this->db->query("SELECT * FROM tema");
		$data['alltema'] = $query->result();
		
		$this->load->view('create', $data);
	}

	public function create_ready(){

		$ISBN = $this->input->post('ISBN');
		$Titulo = $this->input->post('Titulo');
		$NumeroEjemplares = $this->input->post('NumeroEjemplares');
		$NombreAutor = $this->input->post('NombreAutor');
		$NombreEditorial = $this->input->post('NombreEditorial');
		$NombreTema = $this->input->post('NombreTema');
		
		echo "creado " . $NombreTema ;

		$query = $this->db->query("INSERT INTO libro
									SET Titulo = '$Titulo', 
										ISBN = '$ISBN', 
										NumeroEjemplares = '$NumeroEjemplares', 
										idAutor = '$NombreAutor', 
										idEditorial = '$NombreEditorial', 
										idTema = '$NombreTema'
								");

		header("Location: ".base_url() );
		
	}


	public function delete($id){

		$query = $this->db->query("DELETE l.* FROM libro l 
									JOIN autor a ON a.idAutor = l.idAutor 
									JOIN editorial e ON e.idEditorial = l.idEditorial
									JOIN tema t ON t.idTema = l.idTema
									WHERE l.idLibro = $id
							");

		header("Location: ".base_url() );
	}

}
