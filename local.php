<?php
  include_once('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Files</title>

    <!-- css -->
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
    <!-- /css -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <?php
        $input = $_REQUEST;
        $fichero = "files/".trim($input['local']).'.txt';
        $datos = open_file($fichero);
        if(!$datos['success']):
          echo $datos['msg'];
        endif;
      ?>
      <div class="header clearfix">
        <h3 class="text-muted">Lector de Archivos</h3>
      </div>
      <div class="jumbotron">
        <a class="btn btn-default" href="index.php">Regresar</a>
        <h1>Local <small><?php echo $input['local'].' '; echo $input['fecha'] ?></small> </h1>
        <div class="form-horizontal">
          <div class="form-group">
            <label for="maquina" class="col-sm-2 control-label">Máquina</label>
            <div class="col-sm-4">
              <select class="form-control" id="select-maquina" required>
              <option value="">Seleccione una maquina</option>
              <?php
                if($datos['success']):
                  foreach($datos['data'] as $valor):
                    echo "<option value='".$valor[$index['numeroMaquina']]."'>".$valor[$index['numeroMaquina']]."</option>";
                  endforeach;
                endif;
              ?>
              </select>
            </div>
            <label for="dias_recaudados" class="col-sm-2 control-label">Días a Recaudar</label>
            <div class="col-sm-4">
              <input class="form-control" type="number" min="0" value="0" name="dias_recaudados" id="dias_recaudados" required>
            </div>
          </div>
        </div>
          <br><br>
        <form class="form-horizontal" action="generar_archivo.php" method="POST" id="save_file">
          <input type="hidden" name="local" value="<?php echo $input['local'] ?>">
          <input type="hidden" name="fecha" value="<?php echo $input['fecha'] ?>">
          <input type="hidden" name="maquina" id="maquina">
          <div id="cargar_planilla">
            <div class="col-sm-2" id="fecha"><b>Fecha: </b></div>
            <div class="col-sm-6" id="titulo1"><b>Titulo 1</b></div>
            <div class="col-sm-4" id="titulo3"><b>Titulo 3</b></div>
            <div class="col-sm-6 col-sm-offset-2" id="titulo2"><b>Titulo 2</b></div>
            <div class="col-sm-4" id="titulo4"><b>Titulo 4</b></div>
            <div class="col-sm-4" id="maquina-nro"><b>Maquina nro: </b></div>
            <div class="col-sm-4" id="modelo"><b>Modelo: </b></div>
            <div class="col-sm-4" id="denom"><b>Denom: </b></div>
            <div class="col-sm-12 col-md-8">
              <div class="table-responsive">
                <table class="table">
                  <tr class="titulo">
                    <th colspan="3">Contadores Mecanicos:</th>
                    <th colspan="3">Contadores Electronicos:</th>
                  </tr>
                  <tr>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-1">ENTRADA</td>
                    <td class="col-sm-1">SALIDA</td>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-1">ENTRADA</td>
                    <td class="col-sm-1">SALIDA</td>
                  </tr>
                  <tr>
                    <td class="col-sm-1">Finales: </td>
                    <td class="col-sm-1"><input type="text" id="mecanicoFinalE" name="mecanicoFinalE" class="form-control inputs"></td>
                    <td class="col-sm-1"><input type="text" id="mecanicoFinalS" name="mecanicoFinalS" class="form-control inputs"></td>
                    <td class="col-sm-1">Finales: </td>
                    <td class="col-sm-1"><input type="text" id="electronicoFinalE" name="electronicoFinalE" class="form-control inputs"></td>
                    <td class="col-sm-1"><input type="text" id="electronicoFinalS" name="electronicoFinalS" class="form-control inputs"></td>
                  </tr>
                  <tr>
                    <td class="col-sm-1">Iniciales: </td>
                    <td id="mecanicoInicialE">----</td>
                    <td id="mecanicoInicialS">----</td>
                    <td class="col-sm-1">Iniciales: </td>
                    <td id="electronicoInicialE">----</td>
                    <td id="electronicoInicialS">----</td>
                  </tr>
                  <tr>
                    <td class="col-sm-1">Total: </td>
                    <td id="mecanicoTotalE">----</td>
                    <td id="mecanicoTotalS">----</td>
                    <td class="col-sm-1">Total: </td>
                    <td id="electronicoTotalE">----</td>
                    <td id="electronicoTotalS">----</td>
                  </tr>
                  <tr>
                    <td class="col-sm-1">Utilidad: </td>
                    <td class="col-sm-1">----</td>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-1">Utilidad: </td>
                    <td class="col-sm-1">----</td>
                    <td class="col-sm-1"></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td>Colectado:</td>
                    <td id="colectado">-----</td>
                  </tr>
                  <tr>
                    <td>Premios:</td>
                    <td id="premios">-----</td>
                  </tr>
                  <tr>
                    <td>Devol:</td>
                    <td id="devolucion">-----</td>
                  </tr>
                  <tr>
                    <td>R. Bruta:</td>
                    <td id="rBruta">-----</td>
                  </tr>
                  <tr>
                    <td>J.C.J:</td>
                    <td id="jcj">-----</td>
                  </tr>
                  <tr>
                    <td>Dividendo:</td>
                    <td id="dividendo">-----</td>
                  </tr>
                  <tr>
                    <td>50%:</td>
                    <td id="porcentaje1">-----</td>
                  </tr>
                  <tr>
                    <td>50%:</td>
                    <td id="porcentaje2">-----</td>
                  </tr>
                  <tr>
                    <td>Cliente:</td>
                    <td id="cliente">-----</td>
                  </tr>
                  <tr>
                    <td>Empresa:</td>
                    <td id="empresa">-----</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
              <label for="observaciones" class="control-label">Observaciones: </label>
              <textarea class="form-control" rows="3" name="observaciones" id="observaciones"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </form>
        <div class="clearfix"></div>
      </div>

      <footer class="footer">
        <p>© BY ARV SYSTEM 2015</p>
      </footer>
    </div> <!-- /container -->
    <!-- Script -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script>
        var fecha = "<?php echo $input['fecha'] ?>"
        var local = "<?php echo $input['local'] ?>"
      </script>
      <script src="js/form_file.js"></script>
      <script src="js/operaciones.js"></script>
    <!-- /Script -->
  </body>
</html>
