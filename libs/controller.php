<?php

    class Controller
    {
        function __construct()
        {
            // Crear las vistas que pertenezcan al controlador invocado
            $this->view= new View();

        }

        function loadModel($model)
        {   
            // creating direction for model
            $url="models/".$model."model.php";
            //  valide that model exists
            if (file_exists($url)) {
                // if exist call it with require
                require $url;
                $modelName=$model.'Model';
                // instance of class that received model
                $this->model= new $modelName;
            }
        }
    }

?>