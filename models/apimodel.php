<?php

require_once "models/alumnos.php";
class ApiModel extends Model
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
    }
    // Then the list of funcitons, will use these to manage thi API_REST in the app
    // A continuacion la lista de funciones que usaremos para manejar API_REST en la aplicacion
    // 

    // Function to obtain registers and codify these in JSON format
    // Funcion para obtener registros  codificarlos en formato JSON
    function read()
    {
        try 
        {
            $query=$this->db->conn()->query("SELECT * FROM alumno"); 
            $alumnos['alumnos'] = array();
            $item=new Alumnos();
            while ($row=$query->fetch()) {
                //Crear objeto de la clase alumnos//
                extract($row);
                $alumno = array(
                  'id_alumno' => $item->id=$row['id_alumno'],
                  'nombre' =>$item->nombre=$row['nombre'],
                  'apellido' => $item->apellido=$row['apellido'],
                  'telefono' => $item->telefono=$row['telefono']
                );
                // Push el alumno al arreglo alumnos
                array_push($alumnos, $alumno);
            }
            return $alumnos;
        } catch (PDOException $pdo)
        {
            echo "Ocurrio un error en la obtencion debido a: ". $pdo->getMessage();
            return [];
            // next steep, i will make a validation over this part of code
        }
    }

    // Function to delete registers using the REST function
    // Funcion para eliminar registros usando REST
    // function clear($param){
        
    //     try 
    //     {
    //         $alumnos['alumnos'] = array();
           
    //             $alumno = array(
    //               'id_alumno' => 'el alumno fui eliminado'
    //             );
    //             // Push to "data"
    //             array_push($alumnos, $alumno);
            
    //         return $alumnos;

    //     } catch (PDOException $pdo) {
            
    //         echo "Ocurrio un error en el delete $pdo";
    //         return false;

    //     }

    // }
}

?>