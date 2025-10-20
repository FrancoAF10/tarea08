<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
  <h3 class="text-center my-5">Listado de Averias Pendientes</h3>
<div class="container">
  <a href="<?=base_url('/averias/registrar')?>">Registrar</a>
  <a href="<?=base_url('/averias/solucionado')?>">solucionado</a>
  <table class="table table-bordered">
    <thead>
        <tr>
          <th>Cliente</th>
          <th>Problema</th>
          <th>Fecha y Hora</th>
          <th>Status</th>
          <th>Opción</th>
        </tr>
    </thead>
    <tbody id="averias-listar">
      <?php foreach($averias as $av): ?>
        <tr>
          <td><?=$av['cliente']?></td>
          <td><?=$av['problema']?></td>
          <td><?=$av['fechahora']?></td>
          <td><?=$av['status']?></td>
          <td>
            <button class="btn btn-primary btn-solucionar" data-id="<?=$av['id']?>">Solucionado</button>
          </td>
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>
<script>
let conn = null;

function connect(){
    conn = new WebSocket('ws://localhost:8080');
    
    conn.onopen = function(e){
        console.log("Conectado al servidor de notificaciones");
    }
    
    conn.onmessage = function(e){
        const data = JSON.parse(e.data);
        
        if(data.type === 'nueva_averia'){

          const tbody = document.getElementById('averias-listar');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${data.averia.cliente}</td>
                <td>${data.averia.problema}</td>
                <td>${data.averia.fechahora}</td>
                <td>Pendiente</td>
                <td><button class="btn btn-primary">Solucionado</button></td>
            `;
            tbody.appendChild(tr);
        }
    }
    
    conn.onclose = function(e){
        console.log("Desconectado, reconectando...");
        setTimeout(connect, 3000);
    }
}

connect();

document.addEventListener('click', async function(e) {
  if (e.target.classList.contains('btn-solucionar')) {
    const id = e.target.getAttribute('data-id');

    const result = await Swal.fire({
      title: '¿Se solucionó el problema?',
      text: "Esta acción actualizará el estado a 'Solucionado'.",
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sí, solucionado',
      cancelButtonText: 'No, cancelar'
    });

    if (result.isConfirmed) {
      const formData = new FormData();
      formData.append('status', 'Solucionado');

      fetch(`<?=base_url('/averias/actualizarestado')?>/${id}`, {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          Swal.fire('¡Actualizado!', 'El estado ha sido cambiado a Solucionado.', 'success');
          e.target.closest('tr').querySelector('td:nth-child(4)').textContent = 'Solucionado';
          e.target.remove();
        } else {
          Swal.fire('Error', 'No se pudo actualizar el estado.', 'error');
        }
      })
      .catch(() => Swal.fire('Error', 'Hubo un problema en la solicitud.', 'error'));
    }

  }
});

</script>
</body>
</html>