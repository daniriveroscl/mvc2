<!doctype html>
<html lang="es">

<head>
  <?php require "../app/views/parts/head.php" ?>
</head>

<body>

  <?php require "../app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">

    <h1>Alta de Jugador</h1>
    <form method="post" action="/jugador/store">

        <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group">
        <label>F.nacimiento</label>
        <input type="text" name="nacimiento" class="form-control">
        </div>
        <div class="form-group">
        <label>Puesto</label>
        <select name="puesto" id="puesto">
          <option value="portero">Portero</option>
          <option value="defensa">Defensa</option>
          <option value="centrocampista">Centrocampista</option>
          <option value="delantero">Delantero</option>
        </select>
        <input type="text" name="puesto" class="form-control">
        </div>
        <div class="form-group">
        <label>Foto</label>
        <button type="file" name="foto">Browse...</button>
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>

    </form>
      
  </div>

  </main><!-- /.container -->
  <?php require "../app/views/parts/footer.php" ?>

</body>
<?php require "../app/views/parts/scripts.php" ?>

</html>