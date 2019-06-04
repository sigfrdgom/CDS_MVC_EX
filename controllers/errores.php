<?php

class Errores extends Controller
{
    function __construct(){
        parent::__construct();
        
        $this->view->sms='Archivo no encontrado';
        $this->view->render('errors/index');
    }

    function metodo(){
        echo "Amiguito el metodo no existe!";
    }

}


?>