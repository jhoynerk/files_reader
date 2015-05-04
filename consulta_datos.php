<?php
  include_once('funciones.php');
  $input = $_REQUEST;
  $fichero = "files/".$input['local'].' '.$input['fecha'].'.txt';
  $datosGuardados = open_file($fichero);
  $fichero = "files/".$input['local'].'.txt';
  $datosLocal = open_file($fichero);
  if($datosLocal['success'])
    $datos['local'] = buscar_maquina($datosLocal['data'], $input['maquina'], 1);
  if($datosGuardados['success'])
    $datos['edit'] = buscar_maquina($datosGuardados['data'], $input['maquina'], 1);

  echo json_encode($datos);


?>
