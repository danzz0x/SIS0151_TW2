<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>MVC Tecnologías Web 2</title>
  <link rel="shortcut icon" href="http://sa.updspotosi.edu.bo/img/upds.jpg" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

  <!-- Navbar -->
  <header class="bg-blue-800 text-white">
    <nav class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <h1 class="text-lg font-bold">Gestión de Productos</h1>
      <ul class="flex space-x-4">
        <li>
          <a href="/producto/" class="hover:underline">Productos</a>
        </li>
        <li>
          <a href="/producto/create" class="hover:underline">Crear Producto</a>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Contenido -->
  <main class="max-w-4xl mx-auto mt-8 px-4">
    <?php
    require '../vendor/autoload.php';
    $router = require '../src/Routes/index.php';
    ?>
  </main>

</body>

</html>
