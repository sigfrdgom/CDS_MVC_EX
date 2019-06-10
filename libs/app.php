<?php
    //Referencias
    require_once 'controllers/errores.php';
    class App{
        //metodo constructor
        function __construct(){
            //Obtener la url
            $url=isset($_GET['url'])? $_GET['url']:null;
            //Quitar un caracter innecesario
            $url=rtrim($url,"/");
            //dividir cada parametro a partir del separador /
            $url=explode('/',$url);

            //validar que en el indice 0 de la url exista un controlador
            if(empty($url[0])){
                $archivoController='controllers/main.php';
                require_once $archivoController;
                $controller=new Main();
                //el modelo main
                $controller->loadModel('main');
                $controller->index();
                return false;
            }

            //var_dump($url);
            $archivoController='controllers/'.$url[0].'.php';

            //Validando que el controlador ingresado pertenesca a un archivo 
            //de nuestros controladores
            if(file_exists($archivoController)){
                 //controllers/x.php
                 //Referencia de la ubicacion del archivo
                require_once $archivoController;
                /*Objeto de la clase del controlador recibido*/
                $controller=new $url[0];
                $controller->loadModel($url[0]);

                //obteniendo la cantidad de parametros de la url en el indice 2 
                //------->>>>url/controlador/metodos/parametros

                $nparam=sizeof($url);
                if($nparam>1){
                    if($nparam>2){
                        $param=[];
                        for($i=2;$i<$nparam;$i++){
                            array_push($param,$url[$i]);
                        }
                          //llamando el metodo recibido con sus parametros
                        $controller->{$url[1]}($param);   
                    }else{
                         //llamando el metodo recibido
                        $controller->{$url[1]}();     
                    }
                }else{
                    $controller->index();
                }
            }else{
                //La instancia sera del controlador errores
                $controller=new Errores();
            }
           
        }
    }
?>

<!-- <?php

    // require_once 'controllers/errores.php';
    // class App 
    // {
    //     function __construct(){
    //         // Get url
    //         // $url=$_GET['url']
    //         $url= isset($_GET['url'])?$_GET['url']:null;
            
    //         $url=rtrim($url,'/');
    //         //echo "<h2>$url</h2>";

    //         $url=explode('/',$url);
    //         //print_r($url);
    //         // echo "<br>";
    //         // Validar que en el indice 0 existan un controlador

    //         $archivoController="";
    //         if (empty($url[0])) {
    //             $archivoController="controllers/main.php";
    //             require_once $archivoController;
    //             $controller = new Main();
    //             // charge model main
    //             $controller->loadModel('main');
    //             $controller->index();
    //             return false;
    //         }else{
    //             $archivoController="controllers/".$url[0].".php";
    //             if (file_exists($archivoController)) {
    //                 require_once $archivoController;
    //                 $controller = new $url[0];
    //                 $controller->loadModel($url[0]);

    //                 // obtain quantity of parameters of url in index 2 
    //                 $nparam=sizeof($url);

    //                 if ($nparam>1) {
                        
    //                     if ($nparam>2) {
    //                         $param=[];    
    //                         for ($i=2; $i < $nparam ; $i++) { 
    //                             array_push($param,$url[$i]);
    //                         }
    //                         //lamado al metodo con parametros
    //                         $controller->{$url[1]}($param);
    //                     }else{
    //                         $controller->{$url[1]}();
    //                     }
                        
    //                 } else {
    //                     $controller->index();
    //                 }
                    


    //                 // Verify if exist the method
    //                 if (isset($url[1])) {
    //                     $controller->{$url[1]}();
    //                 }else{
    //                     $controller->index();
    //                 }

    //             } else {
    //                 $controller = new Errores();
    //             }
                
    //         }
            
    //     }
    // }
    

?> -->

<!-- // Validando que el controlador ingresado pertenezca a un arhico de nuestros contraladores, que el controlado exista
            if(file_exists($archivoController)){
                // Se agrega la ubicacion del archivo y se crea una instancia
                require_once $archivoController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                // verificamos la existencia del metodo tomando la posicion 1 de la url y comprobando si el metodo existe
                if (isset($url[1])) {
                    $method = $url[1];
                    // Aca comprobamos si el metodo existe y si existe pues lo ejecutamos
                    if (method_exists($controller,$method)) {
                        // Si la posicion 2 trae un valor posiblemte es el parametro de dicho metodo si no es asi enviamos un mensjae de error
                        if(isset($url[2]))
                        {
                            $controller->{$url[1]}($url[2]);
                        }
                        elseif(isset($url[1]))
                        {
                            $controller->{$url[1]}();
                        }else{
                            $controller->render();
                        }
                        
                    
                    } else {
                        echo "El metodo no existe amiguito, que estas haciendo?";
                    }
                } 

            }else{
                $controller = new Errores();
            } -->

            