<?php

require_once '../../modelo/paciente.php';
require_once '../../configuracion/database.php';
require_once 'responses/nuevoResponse.php';

header('Content-Type: application/json');
$resp = new ConsultarPaciente();

$resp->Paciente = Paciente::Buscar($_GET['Id']);


echo json_encode($resp);
