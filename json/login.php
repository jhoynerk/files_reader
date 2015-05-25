<?php
  include_once('../base/config.php');
  $fichero = TXT_USUARIO;
  $usuarios = open_file('../'.$fichero);
  $data = $_REQUEST;

  $usuario = null;
  foreach($usuarios['data'] as $key => $u ){
    $usuarios['data'][$key] = New Usuario($u[0], $u[1]);
    if ( $usuarios['data'][$key]->validarUsuario($data['usuario'], $data['clave']) ){
      $usuario = $u;
      continue;
    }
  }
  if(is_null($usuario)){
    $response['success'] = false;
    $response['msg'] = 'El usuario no coincide';
  }else{
    $response['success'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['usuario']['usuario'] = $data['usuario'];
    $_SESSION['usuario']['clave'] = $data['clave'];
  }
  echo json_encode($response);
?>
