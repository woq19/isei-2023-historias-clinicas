<?php
class TipoEventoHistoriaClinica {

    public $Id;
    public $Descripcion;
    public $Eliminado;

    public static function BuscarTodosActivos()
    {
        $con  = Database::getInstance();
        $sql = "select * from tipoeventohistoriaclinica where Eliminado=0";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'TipoEventoHistoriaClinica');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;                
        }

        return $claseAReemplazarADevolver;
    }

}
