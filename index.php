<?php include_once('base/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <div class="header clearfix">
            <br><br>
            <h3 class="text-muted">Login</h3>
          </div>
          <div class="well">
            <form id="loginForm" method="POST" action="json/login.php">
              <div class="form-group">
                <label for="usuario" class="control-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="" required="" title="Por favor ingrese su usuario" placeholder="usuario">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="clave" class="control-label">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" value="" required="" title="Por favor ingrese su contraseña" placeholder="contraseña">
                <span class="help-block"></span>
              </div>
              <button type="submit" class="btn btn-success btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
      <?php include_once('vistas/footer.php') ?>
    </div> <!-- /container -->
    <!-- Script -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/login.js"></script>
    <!-- /Script -->

  </body>
</html>
