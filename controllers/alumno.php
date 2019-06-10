<?php

class Alumno extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->view->alumnos = [];
        // $this->view->alumno="";
    }

    // function to show the main interface of the entity
    function index(){
        $alumnos=$this->model->get();
        $this->view->alumnos=$alumnos;
        $this->view->render('alumno/index');
    }

    // Function to insert a register in database
    function newRegister(){
        $this->view->render('alumno/newRegister');
    }

    function insert(){
        // Declare vars para recibir los datos provenientes de la vista(Formulario nuevo)
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telefono= $_POST['telefono'];

        $this->model->insert(['nombre'=>$nombre , 'apellido'=>$apellido,'telefono'=>$telefono]);
        // $url= constant('URL')."alumno";
        // header("Location: $url");
        $this->index();
    }

    function delete($dato=null){
        $id=$dato[0];
        $this->model->delete($id);
        $this->render();
    }

    function getById($dato=null){
        $id=$dato[0];
        $alumno=$this->model->getById($id);
       
        session_start();
        $_SESSION['id_alumno']=$alumno->id;
        //renderizar la vista de detalle
        $this->view->alumno=$alumno;
        $this->view->render('alumno/detalle');
    }

    function update(){
        // Declare vars para recibir los datos provenientes de la vista(Formulario nuevo)
        session_start();
        $id=$_SESSION['id_alumno'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telefono= $_POST['telefono'];
        
        unset($_SESSION['id_alumno']);
        $this->model->update(['id'=>$id,'nombre'=>$nombre,'apellido'=>$apellido,'telefono'=>$telefono]);
        $this->index();

        // if ($this->model->update(['id'=>$id,'nombre'=>$nombre , 'apellido'=>$apellido,'telefono'=>$telefono])) {
        //    $alumno = new Alumnos();
        //    $alumno->id=$id;
        //    $alumno->nombre=$nombre;
        //    $alumno->apellido=$apellido;
        //    $alumno->telefono=$telefono;
        //    $this->view->alumno=$alumno;
        //    $this->render();


        // }else{
        //     $this->view->render('errors/index');
        // }
        // $url= constant('URL')."alumno";
        // header("Location: $url");
    }

}


?>