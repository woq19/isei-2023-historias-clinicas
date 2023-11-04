<?php

class Paciente{
    public $Id;
    public $Nombre;
    public $Apellido;
    public $Dni;
    public $Email;
    public $Clave;
    public $GrupoSanguineo;
    public $ObraSocialId;

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from paciente where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Paciente');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }

    public static function BuscarTodos()
    {
        $con  = Database::getInstance();
        $sql = "select * from paciente";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Paciente');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;                
        }

        return $claseAReemplazarADevolver;
        
    }
}