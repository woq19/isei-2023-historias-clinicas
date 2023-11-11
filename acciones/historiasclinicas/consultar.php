<?php

require_once '../../modelo/eventoHistoriaClinica.php';
require_once '../../configuracion/database.php';
require_once 'responses/nuevoResponse.php';

header('Content-Type: application/json');
$resp = new nuevoResponse();

$resp->eventoHistoriaClinica = EventoHistoriaClinica::Buscar($_GET['Id']);


echo json_encode($resp);