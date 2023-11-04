<?php

require_once 'response/NuevoResponse.php';
require_once 'request/NuevoRequest.php';
require_once '../../modelo/Paciente.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/ObraSocial.php';

header('Content-Type: application/json');


$response=new NuevoResponse ();
$response->isOK=true;
$response->Mensaje []= "";

$json = file_get_contents('php://input',true);
$request = json_decode($json);

$Pa= new Paciente();
$Pa->Nombre= $request->Nombre;
$Pa->Apellido= $request->Apellido;
$Pa->Dni= $request->Dni;
$Pa->Email= $request->Email;
$Pa->GrupoSanguineo= $request->GrupoSanguineo;
$Pa->ObraSocial= $request->ObraSocialId;

$ObraSocialDb=ObraSocial::Buscar($request->ObraSocialId);
if($request->$ObraSocialDb==null){
    $response->isOK=true;
    $response->Mensaje []= "";

}
else{
    $response->isOK=false;
    $response->Mensaje []= "la obra social no existe";

}

$Pa->Agregar();

echo json_encode($response);