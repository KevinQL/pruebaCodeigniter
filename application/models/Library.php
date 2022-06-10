<?php 

class Library extends CI_Model
{
    function __construct(){
        $this->load->database();
    }

    /**
    * consultas a la base de datos
    */
    public function get_data($data){

        $inputisbn = $data['inputisbn'];

        $query = $this->db->query("SELECT l.idLibro, l.ISBN, l.Titulo, l.NumeroEjemplares, a.NombreAutor, e.NombreEditorial, t.NombreTema 
									FROM libro l 
									INNER JOIN autor a ON a.idAutor = l.idAutor 
									INNER JOIN editorial e ON e.idEditorial = l.idEditorial
									INNER JOIN tema t ON t.idTema = l.idTema
									WHERE l.ISBN LIKE '%$inputisbn%'
								");

		return $query->result();
    }


    public function get_item_select_create(){

        $query = $this->db->query("SELECT * FROM autor");
		$data['allautor'] = $query->result();

		$query = $this->db->query("SELECT * FROM editorial");
		$data['alleditorial'] = $query->result();

		$query = $this->db->query("SELECT * FROM tema");
		$data['alltema'] = $query->result();

        return $data;
    }

    public function create_library($data){

        $query = $this->db->insert("libro", $data);

    }

    public function delete_library($id){

        $query = $this->db->delete("libro", array("idLibro" => $id));

    }

    /**
     * Funciones para el controller de Update
     */
    public function getdata_to_update_library($idlib){

        $query = $this->db->query("SELECT l.idLibro, l.ISBN, l.Titulo, l.NumeroEjemplares, a.*, e.*, t.* 
									FROM libro l 
									INNER JOIN autor a ON a.idAutor = l.idAutor 
									INNER JOIN editorial e ON e.idEditorial = l.idEditorial
									INNER JOIN tema t ON t.idTema = l.idTema
									WHERE l.idLibro = $idlib
								");

        return $query->result()[0];
    }

    public function update_ready_Library($data){
        $query = $this->db->query("UPDATE libro SET
									        ISBN = '$data->ISBN', 
                                            Titulo = '$data->Titulo', 
                                            NumeroEjemplares = '$data->NumeroEjemplares',
                                            idAutor = '$data->NombreAutor', 
                                            idEditorial = '$data->NombreEditorial', 
                                            idTema = '$data->NombreTema'
									WHERE idLibro = $data->idLibro
								");
    }

}
