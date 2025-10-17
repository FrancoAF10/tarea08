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
    <h3 class="text-center">Registrar</h3>
  
    <div class="container">
      <form action="<?=base_url('/averias/crear')?>" method="POST">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="cliente" id="cliente" class="form-control">
                    <label for="cliente">Cliente</label>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="problema" id="problema" class="form-control">
                    <label for="problema">Problema</label>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" name="fechahora" id="fechahora" class="form-control">
                    <label for="fechahora">Fecha y Hora</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select name="status" id="status" class="form-select">
                      <option value="Pendiente">Pendiente</option>
                      <option value="Solucionado">Solucionado</option>
                    </select>
                    <label for="status">Status</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </div>
      </form>
    </div>
</body>
</html>