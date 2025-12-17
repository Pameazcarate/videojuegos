<?php
require_once "conexion.php";

// Consulta todos los videojuegos ordenados por ID
$sql_all = "SELECT id, nombre, genero, precio, anio, calificacion 
            FROM videojuegos 
            ORDER BY id ASC";
$res_all = $conexion->query($sql_all);

// Consulta fragmento 1: Videojuegos económicos (precio <= 600)
$sql_econ = "SELECT id, nombre, genero, precio, anio, calificacion 
             FROM videojuegos 
             WHERE precio <= 600 
             ORDER BY precio ASC";
$res_econ = $conexion->query($sql_econ);

// Consulta fragmento 2: Videojuegos premium (precio > 600)
$sql_prem = "SELECT id, nombre, genero, precio, anio, calificacion 
             FROM videojuegos 
             WHERE precio > 600 
             ORDER BY precio DESC";
$res_prem = $conexion->query($sql_prem);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Videojuegos Fragmentados.</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../html/estilos.css">
  <style>
    .fragmento { display: none; }
    /* Estilo para el navbar, usa el azul oscuro definido en estilos.css */
    .navbar.bg-dark { background-color: #1d3557 !important; }
  </style>
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-info sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">🕹️ Videojuegos Data.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../html/index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="registros.php">Ver Registros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="mb-4 text-center">Fragmentación de Videojuegos.</h1>

    <div class="d-flex justify-content-center gap-3 mb-4">
      <button class="btn btn-primary" onclick="mostrarFragmento('all')">Todos</button>
      <button class="btn btn-success" onclick="mostrarFragmento('econ')">Económicos (≤ $600)</button>
      <button class="btn btn-warning" onclick="mostrarFragmento('prem')">Premium (> $600)</button>
    </div>

    <div id="instruccion" class="text-center p-5 bg-white rounded shadow-sm">
        <h2 class="text-muted">Selecciona una opción de fragmentación</h2>
        <p class="lead text-muted">Haz clic en uno de los botones de arriba para mostrar los registros de videojuegos.</p>
    </div>

    <div id="all" class="fragmento">
      <h2 class="mb-3">Todos los Videojuegos (ordenados por ID).</h2>
      <div class="table-responsive mb-5">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>ID</th><th>Nombre</th><th>Género</th><th>Precio</th><th>Año</th><th>Calificación</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res_all && $res_all->num_rows > 0): ?>
              <?php while($row = $res_all->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['id']) ?></td>
                  <td><?= htmlspecialchars($row['nombre']) ?></td>
                  <td><?= htmlspecialchars($row['genero']) ?></td>
                  <td>$<?= number_format($row['precio'], 2) ?></td>
                  <td><?= htmlspecialchars($row['anio']) ?></td>
                  <td><?= htmlspecialchars($row['calificacion']) ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="6" class="text-center text-danger">No hay registros o la consulta falló.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div id="econ" class="fragmento">
      <h2 class="mb-3">Videojuegos Económicos (≤ $600).</h2>
      <div class="table-responsive mb-5">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>ID</th><th>Nombre</th><th>Género</th><th>Precio</th><th>Año</th><th>Calificación</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res_econ && $res_econ->num_rows > 0): ?>
              <?php while($row = $res_econ->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['id']) ?></td>
                  <td><?= htmlspecialchars($row['nombre']) ?></td>
                  <td><?= htmlspecialchars($row['genero']) ?></td>
                  <td>$<?= number_format($row['precio'], 2) ?></td>
                  <td><?= htmlspecialchars($row['anio']) ?></td>
                  <td><?= htmlspecialchars($row['calificacion']) ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="6" class="text-center text-muted">No hay registros en este fragmento.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div id="prem" class="fragmento">
      <h2 class="mb-3">Videojuegos Premium (> $600).</h2>
      <div class="table-responsive mb-5">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>ID</th><th>Nombre</th><th>Género</th><th>Precio</th><th>Año</th><th>Calificación</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res_prem && $res_prem->num_rows > 0): ?>
              <?php while($row = $res_prem->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['id']) ?></td>
                  <td><?= htmlspecialchars($row['nombre']) ?></td>
                  <td><?= htmlspecialchars($row['genero']) ?></td>
                  <td>$<?= number_format($row['precio'], 2) ?></td>
                  <td><?= htmlspecialchars($row['anio']) ?></td>
                  <td><?= htmlspecialchars($row['calificacion']) ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="6" class="text-center text-muted">No hay registros en este fragmento.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function mostrarFragmento(id) {
      document.getElementById('instruccion').style.display = 'none';
      document.getElementById('all').style.display = 'none';
      document.getElementById('econ').style.display = 'none';
      document.getElementById('prem').style.display = 'none';
      document.getElementById(id).style.display = 'block';
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>