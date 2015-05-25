<?php
  session_start();
  function open_file($nombre_fichero){
    if (file_exists($nombre_fichero)) {
      $array = [];
      $myfile = fopen($nombre_fichero, "r");
      while (($line = fgets($myfile)) !== false) :
        $array[] = preg_split("(#)", trim($line));
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

  function path($ruta)
  {
    return "files/".trim($ruta).'.txt';
  }

  function validarUsuario(){
    if(empty($_SESSION['usuario'])){
      return false;
    }
    $fichero = TXT_USUARIO;
    $usuarios = open_file($fichero);
    foreach($usuarios['data'] as $key => $u ){
      $usuarios['data'][$key] = New Usuario($u[0], $u[1]);
      if ( $usuarios['data'][$key]->validarUsuario($_SESSION['usuario']['0'], $_SESSION['usuario']['1']) ){
        return true;
      }
    }
    return false;
  }

  function estaLogin(){
    if(validarUsuario() === false){
      header('Location: index.php');
    }
  }

  function logout(){
    session_destroy();
    header('Location: index.php');
  }

?>
