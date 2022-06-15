<?php

/**
 * Retorna las reglas para el formulario de creación de libros
 */
function get_create_rules(){
    return array(
        array(
                'field' => 'ISBN',
                'label' => 'ISBN',
                'rules' => 'required|integer',
                'errors' => array(
                    'required' => 'Se requiere el %s del libro.',
                ),
        ),
        array(
                'field' => 'Titulo',
                'label' => 'Titulo del libro',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Se debe proveer el campo %s.',
                ),
        ),
        array(
                'field' => 'NumeroEjemplares',
                'label' => 'numero de ejemplares',
                'rules' => 'required|integer',
                'errors' => array(
                    'required' => 'Ingresar el %s como un valor entero.',
                ),
        )
    );
}