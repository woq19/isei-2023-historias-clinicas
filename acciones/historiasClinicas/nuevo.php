<?php

require_once '../historiasClinicas/request/nuevoRequest.php';
require_once '../historiasClinicas/responses/nuevoResponse.php';
require_once '../../modelo/eventoHistoriaClinica.php';
require_once '../../modelo/paciente.php';
require_once '../../configuracion/database.php';

header('Content-Type: application/json');
$resp = new NuevoResponse();
$json = file_get_contents('php://input',true);
$req = json_decode($json);

$ehc= new EventoHistoriaClinica();

$ehc->PacienteId=$req->PacienteId;
$ehc->Observaciones=$req->Observaciones;
$ehc->FechaAlta=date();
$ehc->NombreEstudio=$req->NombreEstudio;
$ehc->Diagnostico=$req->Diagnostico;
$ehc->PatologiaATratar=$req->PatologiaATratar;
$ehc->Medicamentos=$req->Medicamentos;
$ehc->TipoEventoId=$req->TipoEventoId;

$resp->IsOk=true;
$resp->Mensaje[]=" ";



if ($req->PacienteId==null){
    $resp->IsOk=false;
    $resp->Mensaje []='El paciente no existe';
} else {}

if ($req->Observaciones==null){
    $resp->IsOk=false;
    $resp->Mensaje []='Debe indicar una observación';
} else {}

if ($req->TipoEventoId==null && $req->TipoEventoId->Eliminado==0){
    $resp->IsOk=false;
    $resp->Mensaje []='El tipo de evento no existe';
} else {}

$ehc->Agregar();

echo json_encode($resp);