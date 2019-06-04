<?php

    class Main extends Controller //Herencia de la clase
    {
        function __construct()
        {
            // Agregar el constructor de la clase padre
            parent::__construct();
            $this->view->render('main/index');
        }

        // function saludo()
        // {
        //     echo "Bienvenido seas al descuajeringe <br>";
        // }

        // function hola()
        // {
        //     echo "<h1>Bienvenido seas sr Sad, en que te puedo servir? </h1> <br>";
        // }

        // function mostrar($msg)
        // {
        //     echo "<h1>Hola $msg </h1> <br>";
        // }
    }
    

?>