<?php

class AlumnoModel extends Model
{
    public function __construct(Type $var = null)
    {
        parent::__construct();

    }
    // A function to insert row in a database
    function insert(){
        echo "Test to insert data";
    }

    // Find registers from database
    function get(){
        $items=[];

        try {
            $query=$this->db->conn()->query("SELECT * FROM alumno");    
            while ($row=$query->fetch()) {
                $item=new Alumno;
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