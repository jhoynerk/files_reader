<?php
// Clase para usuarios
Class usuario {
  protected $usuario, $clave;

  // constructs
  public function __construct($usuario, $clave)
  {
    $this->usuario = $usuario;
    $this->clave = $clave;
  }

  // getters and setters
  public function getUsuario()
  {
    return $this->usuario;
  }

  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
  }

  // functions users
  public function validarUsuario($usuario, $clave)
  {
    return ($this->usuario == $usuario AND $this->clave == $this->encryptarClave($clave)) ? true : false;
  }

  public function esUsuario($usuario)
  {
    return ($this->usuario == $usuario)? true : false;
  }

  public function esClave($clave)
  {
    return ($this->clave == $this->encryptarClave($clave))? true : false;
  }

  private function encryptarClave($clave)
  {
    return sha1(md5($clave));
  }
}
