<?php

class EventoHistoriaClinica{
    
    public $Id;
    public $PacienteId;
    public $FechaAlta;
    public $Observaciones;
    public $NombreEstudio;
    public $Diagnostico;
    public $PatologiaATratar;
    public $Medicamentos;
    public $TipoEventoId;




public static function BuscarTodosPaciente($idpaciente)
    {
        $con  = Database::getInstance();
        $sql = "select * from eventohistoriaclinica where PacienteId = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $idpaciente);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'EventoHistoriaClinica');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;                
        }

        return $claseAReemplazarADevolver;
        
    }
}