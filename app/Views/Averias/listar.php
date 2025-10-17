<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<body>
  <h3 class="text-center my-5">Listado de Averias</h3>
<div class="container">
  <a href="<?=base_url('/averias/registrar')?>">Registrar</a>
  <table class="table table-bordered">
    <thead>
        <tr>
          <th>Cliente</th>
          <th>Problema</th>
          <th>Fecha y Hora</th>
          <th>Status</th>
        </tr>
    </thead>
    <tbody id="averias-listar">
      <?php foreach($averias as $av): ?>
        <tr>
          <td><?=$av['cliente']?></td>
          <td><?=$av['problema']?></td>
          <td><?=$av['fechahora']?></td>
          <td><?=$av['status']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>
</body>
</html>