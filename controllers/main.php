<?php
    class Main extends Controller //Herencia de la clase
    {
        function __construct()
        {
            // Agregar el constructor de la clase padre
            parent::__construct();
        }

        function index(){
            $this->view->render('main/index');
        }
        
    }
    

?>