<?php

require_once '../pacientes/responses/consultarTodosResponse.php';
require_once '../../modelo/paciente.php';
require_once '../../configuracion/database.php';

$resp= new ConsultarTodosResponse();

$resp->ListPacientes = Paciente::BuscarTodos();

echo json_encode($resp);