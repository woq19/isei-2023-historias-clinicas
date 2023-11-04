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