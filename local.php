<?php include_once('base/config.php'); estaLogin(); ?>
<?php include_once('vistas/head.php'); ?>
<body>
  <div class="container">
    <?php include_once('vistas/cabecera.php'); ?>
    <div class="header clearfix">
      <h3 class="text-muted">Lector de Archivos</h3>
    </div>
    <div class="jumbotron">
      <h1>Locales</h1>
      <form class="form-horizontal" action="datas.php" method="POST">
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

    <?php include_once('vistas/footer.php'); ?>
  </div> <!-- /container -->
  <!-- Script -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <!-- /Script -->
</body>
</html>
