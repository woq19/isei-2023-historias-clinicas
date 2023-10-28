<?php

require_once 'response/EliminarResponse.php';
require_once 'request/EliminarRequest.php';
require_once '../../modelo/TipoEventoHistoriaClinica.php';
require_once '../../configuracion/database.php';


header('Content-Type: application/json');


$response=new EliminarResponse ();
$response->isOK=true;
$response->Mensaje []= "";

$json = file_get_contents('php://input',true);
$request = json_decode($json);

$te= new TipoEventoHistoriaClinica();
$te->Id= $request->Id;
$te->Eliminar();

echo json_encode($response);