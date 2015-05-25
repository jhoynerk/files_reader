<?php
// configuraciones

// constantes

define('TXT_USUARIO', 'files/usuarios.txt');
$index = array('fecha'                => 0,
               'numeroMaquina'        => 1,
               'serialMaquina'        => 2,
               'numeroChapa'          => 3,
               'nombreJuego'          => 4,
               'denominacion'         => 5,
               'mecanicoInicialE'     => 6,
               'mecanicoInicialS'     => 7,
               'electronicoInicialE'  => 8,
               'electronicoInicialS'  => 9);

include_once('funciones.php');
include_once('usuario.php');
include_once('files.php');
?>
