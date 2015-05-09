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
      <div class="header clearfix">
        <h3 class="text-muted">Lector de Archivos</h3>
      </div>
      <div class="jumbotron">
        <h1>Locales</h1>
        <form class="form-horizontal" action="local.php" method="POST">
          <div class="form-group">
            <label for="local" class="col-sm-2 control-label">Local</label>
            <div class="col-sm-10">
              <select class="form-control" name="local" id="local" required>
                <option value="">Seleccione un local</option>
                <?php $myfile = fopen("files/locales.txt", "r") or die("Tenemos problemas al abrir el archivo locales.txt!");
                while (($line = fgets($myfile)) !== false) : ?>
                  <option value="<?php echo trim($line) ?>"><?php echo trim($line)?></option>
                <?php endwhile;
                fclose($myfile); ?>
               </select>
            </div>
          </div>
          <div class="form-group">
            <label for="fecha" class="col-sm-2 control-label">Fecha</label>
            <div class="col-sm-4">
              <input class="form-control" type="date"  value="<?php echo date('Y-m-d'); ?>" name="fecha" id="fecha" required>
            </div>
            <label for="dias_trabajados" class="col-sm-2 control-label">Días Trabajados</label>
            <div class="col-sm-4">
              <input class="form-control" type="number" min="0" value="0" name="dias_trabajados" id="dias_trabajados" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
              <button type="submit" class="btn btn-success">Buscar</button>
            </div>
          </div>
        </form>
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
    <!-- /Script -->
  </body>
</html>
