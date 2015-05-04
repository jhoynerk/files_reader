<?php

  $index = array('fecha' => 0,
                 'numeroMaquina' => 1,
                 'serialMaquina' => 2,
                 'numeroChapa' => 3,
                 'nombreJuego' => 4,
                 'denominacion' => 5,
                 'mecanicoInicialE' => 6,
                 'mecanicoInicialS' => 7,
                 'electronicoInicialE' => 8,
                 'electronicoInicialS' => 9);

  function open_file($nombre_fichero){
    if (file_exists($nombre_fichero)) {
      $array = [];
      $myfile = fopen($nombre_fichero, "r");
      while (($line = fgets($myfile)) !== false) :
        $array[] = split('#', trim($line));
      endwhile;
      fclose($myfile);
      $result['success'] = true;
      $result['data'] = $array;
    } else {
      $result['success'] = false;
      $result['msg'] = "<div class='alert alert-danger' role='alert'><b>El fichero $nombre_fichero no existe</b></div>";
    }
    return $result;
  }

  function buscar_maquina($datos, $maquina, $index){
    foreach ($datos as $value) {
      if($value[$index] == $maquina)
        return $value;
    }
    return false;
  }

  function generar_cadena($d){
    return $d['fecha'].'#'.$d['maquina'].'#'.$d['mecanicoFinalE'].'#'.$d['mecanicoFinalS'].'#'.$d['electronicoFinalE'].'#'.$d['electronicoFinalS'];
  }

?>
