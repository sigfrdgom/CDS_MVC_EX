<?php

require_once "alumnos.php";
class AlumnoModel extends Model
{
    public function __construct(Type $var = null)
    {
        parent::__construct();

    }
    // A function to insert row in a database
    function insert($data){
        
        try {
            
            $query=$this->db->conn()->prepare("INSERT INTO alumno(nombre,apellido,telefono) VALUES(:nombre,:apellido,:telefono);");  
            $query->execute(['nombre'=>$data['nombre'],'apellido'=>$data['apellido'],'telefono'=>$data['telefono']]);  
            return true;

        } catch (PDOException $pdo) {
            
            echo "Ocurrio un error en el insert";
            return false;

        }

    }

    // Find registers from database
    function get(){
        $items=[];

        try {
            $query=$this->db->conn()->query("SELECT * FROM alumno");    
            while ($row=$query->fetch()) {
               
                //Crear objeto de la clase alumnos//
                $item=new Alumnos();
                $item->id=$row['id_alumno'];
                $item->nombre=$row['nombre'];
                $item->apellido=$row['apellido'];
                $item->telefono=$row['telefono'];

                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $pdo) {
            echo "la rego $pdo";
            return [];
            
        }
    }
}


?>