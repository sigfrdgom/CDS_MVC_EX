<?php

    class View
    {
        function __construct()
        {
           // echo "<h1>Prueba las vistas que pertenezcan a acada controlador en su momento</h1>";
        }

        function render($nombre)
        {
            require_once "views/".$nombre.".php";
            // si nombre es igual a index.php se formatia la ubicacion views/index.php
        }

        
    }

?>