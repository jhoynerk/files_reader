<?php
  include_once('funciones.php');
  $input = $_REQUEST;
  $archivo = "files/".$input['local'].' '.$input['fecha'].'.txt';
  if(!empty($input['maquina'])){
    if (file_exists($archivo)) {
      $abrir = fopen($archivo,'r+');
      $contenido = fread($abrir,filesize($archivo));
      fclose($abrir);
      $contenido = explode("\n",$contenido);
      $existe = false;
      foreach ($contenido as $key => $line) {
        $array = preg_split('#', trim($line));
        if(!empty($array[0])){
          if($array[$index['numeroMaquina']] == $input['maquina']){
            $contenido[$key] = generar_cadena($input);
            $existe = true;
          }
        }else{
          unset($contenido[$key]);
        }
      }
      if(!$existe)
        $contenido[] = generar_cadena($input);
      $file = fopen($archivo,'w');
    }else{
      $contenido[] = generar_cadena($input);
      $file = fopen($archivo,'a');
    }
    foreach($contenido as $line){
      fputs($file,$line);
      fputs($file,"\n");
    }
    fclose($file);
    $respuesta = array('success' => true, 'msg' => 'Se han guardado sus cambios');
  }else{
    $respuesta = array('success' => false, 'msg' => 'No tiene maquina seleccionada');
  }


  echo json_encode($respuesta);

?>
