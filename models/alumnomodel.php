<?php

require_once "models/alumnos.php";
class AlumnoModel extends Model
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
    }
    // A function to insert row in a database
    // Una funcion para ingresar un nuevo registro a la base de datos
    function insert($data)
    {
        try 
        {   // La query a utilizar para insertar datos en la tabla alumno de al base de datos
            $query=$this->db->conn()->prepare("INSERT INTO alumno(nombre,apellido,telefono) VALUES(:nombre,:apellido,:telefono);");  
            $query->execute(['nombre'=>$data['nombre'],'apellido'=>$data['apellido'],'telefono'=>$data['telefono']]);  
            return true;
        } catch (PDOException $pdo) 
        {
            echo "Ocurrio un error en el insert debido a: ". $pdo->getMessage();
            return false;
        }
    }

    // Find all registers from database
    // Una funciona para traer todos los registros de la base de datos
    function get()
    {
        $items=[];
        try {
            $query=$this->db->conn()->query("SELECT * FROM alumno");    
            while ($row=$query->fetch()) {
                // Make a alumnos object fom alumnos class
                // Crear objeto de la clase alumnos//
                $item=new Alumnos();
                $item->id=$row['id_alumno'];
                $item->nombre=$row['nombre'];
                $item->apellido=$row['apellido'];
                $item->telefono=$row['telefono'];
                // Ingresamos cada item dentro del arreglo
                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $pdo) 
        {
            echo "Ocurrio un error en la obtencion debido a: ". $pdo->getMessage();
            return [];   
        }
    }

    // A function to delete row in a database
    // Una funcion para eliminar una registro de la base de datos
    function delete($param){
        try 
        {
            $query=$this->db->conn()->prepare("DELETE FROM alumno WHERE id_alumno=:id;");  
            $query->execute(['id'=>$param]);  
            return true;
        }catch (PDOException $pdo) 
        {
            echo "Ocurrio un error en la eliminacion debido a: ". $pdo->getMessage();
            return false;
        }
    }

    // Function to get a single register from database
    // Funcion para obtener un solo registro de la base de datos
    function getById($id)
    {
        $item=new Alumnos();
        $query=$this->db->conn()->prepare('SELECT * FROM ALUMNO WHERE id_alumno=:id');
        try
        {
            $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
                $item->id=$row['id_alumno'];
                $item->nombre=$row['nombre'];
                $item->apellido=$row['apellido'];
                $item->telefono=$row['telefono'];
            }
            return $item;
       }catch(PDOException $pdo)
       {
            echo "Ocurrio un error en la obtencion debido a: ". $pdo->getMessage();
            return [];
       }
    }


    // Function to update a information of one register of the database
    // Funcion para actualizar la informacion de un registro de la base datos
    public function update($item)
    {
        $query=$this->db->conn()->prepare('UPDATE ALUMNO SET 
                                                nombre=:nombre,
                                                apellido=:apellido,
                                                telefono=:telefono 
                                                WHERE id_alumno=:id');
        try{
            $query->execute(['id'=>$item['id'],
                             'nombre'=>$item['nombre'],
                             'apellido'=>$item['apellido'],
                             'telefono'=>$item['telefono']
                             ]);
            return true;
       }catch(PDOException $pdo)
       {
            echo "Ocurrio un error en la actualizacion debido a: ". $pdo->getMessage();
            return false;
       }
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