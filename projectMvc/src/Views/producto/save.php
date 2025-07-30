<div class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white rounded-lg shadow-lg p-8 w-[400px] text-center space-y-4">

    <div class="text-lg font-semibold text-green-700">
      <?= $resultado ?>
    </div>

    <div class="text-left text-gray-700 text-sm">
      <p><strong>Nombre:</strong> <?= $producto->getNombre() ?></p>
      <p><strong>Precio:</strong> Bs <?= number_format($producto->getPrecio(), 2) ?></p>
      <p><strong>Cantidad:</strong> <?= $producto->getCantidad() ?></p>
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
      <a href="/producto/">Ir al listado</a>
    </button>

  </div>
</div>
