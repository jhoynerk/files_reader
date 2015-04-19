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
        <h3 class="text-muted">Project name</h3>
      </div>

      <div class="jumbotron">
        <h1>Locales</h1>
        <form class="form-horizontal" action="">
          <div class="form-group">
            <div class="col-sm-12">
              <select class="form-control" name="local" id="local">
              <option value="">Seleccione un local</option>
          <?php $myfile = fopen("files/locales.txt", "r") or die("Tenemos problemas al abrir el archivo locales.txt!");
                while (($line = fgets($myfile)) !== false) : ?>
                  <option value="<?php echo $line ?>"><?php echo $line ?></option>
          <?php endwhile;
                fclose($myfile); ?>
               </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success">Buscar</button>
            </div>
          </div>
        </form>
      </div>

      <footer class="footer">
        <p>© Company 2015</p>
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
