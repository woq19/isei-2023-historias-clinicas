<?php
class TipoEventoHistoriaClinica
{

    public $Id;
    public $Descripcion;

    public $Eliminado;

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from tipoeventohistoriaclinica where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'TipoEventoHistoriaClinica');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }

    public function Eliminar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE tipoeventohistoriaclinica SET Eliminado=1 WHERE Id = :p1";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Id);
        $claseAReemplazar->execute($params);
    }

}