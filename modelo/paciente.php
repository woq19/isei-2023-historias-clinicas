<?php
class Paciente {

    public $Id;
    public $Nombre;
    public $Apellido;
    public $Dni;
    public $Email;
    public $Clave;
    public $GrupoSanguineo;
    public $ObraSocialId;


    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into paciente (Nombre,Apellido,Dni,Email,Clave,GrupoSanguineo,ObraSocialId) values (:p1,:p2,:p3,:p4,:p5,:p6,:p7)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido); // terminar
        $claseAReemplazar->execute($params);
    }






}