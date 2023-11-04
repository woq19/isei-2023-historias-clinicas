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

    public static function Buscar($id)
{
    $con  = Database::getInstance();
    $sql = "select * from eventohistoriaclinica where Id = :p1";
    $queryClaseAReemplazar = $con->db->prepare($sql);
    $params = array("p1" => $id);
    $queryClaseAReemplazar->execute($params);
    $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'EventoHistoriaClinica');
    foreach ($queryClaseAReemplazar as $m) {
        return $m;
    }
}

}

