<?php

class EventoHistoriaClinica{
    public $PacienteId;
    public $Observaciones;
    public $FechaAlta;
    public $NombreEstudio;
    public $Diagnostico;
    public $PatologiaATratar;
    public $Medicamentos;
    public $TipoEventoId;

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into eventohistoriaclinica (PacienteId, Observaciones, FechaAlta, NombreEstudio, Diagnostico, 
        PatologiaATratar, Medicamentos, TipoEventoId) values (:p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->PacienteId, "p2" => $this->Observaciones, "p3" => $this->FechaAlta, 
        "p4" => $this->NombreEstudio, "p5" => $this->Diagnostico, "p6" => $this->PatologiaATratar, 
        "p7" => $this->Medicamentos, "p8" => $this->TipoEventoId);
        $claseAReemplazar->execute($params);
    }
}