<?php

require_once '../obrasSociales/request/nuevoRequest.php';
require_once '../obrasSociales/responses/nuevoResponse.php';

header('Content-Type: application/json');

$resp = new NuevoResponse();

$json = file_get_contents('php://input',true);
$req = json_decode($json);

if ($req->Descripcion==null){
    $resp->IsOk=false;
    $resp->Mensaje='Por favor detallar obra social';
}
else {
    $resp->IsOk=true;
    $resp->Mensaje='';
}

echo json_encode($resp);
