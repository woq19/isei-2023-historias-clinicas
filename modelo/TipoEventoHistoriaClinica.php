<?php
class TipoEventoHistoriaClinica{ 

    public $Id;
    public $Descripcion;

    public $Eliminado;
public function Eliminar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE tipoeventohistoriaclinica SET Eliminado=1 WHERE Id = :p1";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Id);
        $claseAReemplazar->execute($params);
    }

}