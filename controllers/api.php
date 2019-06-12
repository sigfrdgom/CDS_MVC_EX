<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
class Api extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    // 
    // These functions to call the necesary REST methods
    // Las funciones para llamar a los metodos rest que sean necearios
    // 

    // Function to read registers from database, return JSON format
    // Funcion para leer registro de la base de datos, retorna en formato JSON
    
    function readAlumno(){
        echo json_encode($this->model->read());
    }

    // Function to delte one register from database, return JSON format
    // Funcion para eliminar un registro de la base de datos, retorna en formato JSON
    function clear($dato=null){
        $id=$dato[0];
        echo json_encode($this->model->clear($id));
    }

}
?>