<form method="post" action="save" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white shadow-md rounded px-8 py-6 space-y-4">
  <h2 class="text-xl font-semibold text-gray-800">Formulario de Producto</h2>

  <div>
    <label for="nombre" class="block font-medium text-gray-700 mb-1">Nombre del producto:</label>
    <input type="text" id="nombre" name="nombre" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
      <?php if (isset($producto)) echo "value='" . $producto->getNombre() . "'"; ?> required>
  </div>

  <div>
    <label for="precio" class="block font-medium text-gray-700 mb-1">Precio del producto:</label>
    <input type="number" step="0.1" min="1" id="precio" name="precio" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
      <?php if (isset($producto)) echo "value='" . $producto->getPrecio() . "'"; ?> required>
  </div>

  <div>
    <label for="cantidad" class="block font-medium text-gray-700 mb-1">Cantidad:</label>
    <input type="number" min="0" id="cantidad" name="cantidad" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
      <?php if (isset($producto)) echo "value='" . $producto->getCantidad() . "'"; ?> required>
  </div>

  <div>
    <label for="descripcion" class="block font-medium text-gray-700 mb-1">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500" required><?php if (isset($producto)) echo $producto->getDescripcion(); ?></textarea>
  </div>

  <div>
    <label for="imagen" class="block font-medium text-gray-700 mb-1">Imagen:</label>
    <input type="file" id="imagen" name="imagen" class="block w-full text-sm text-gray-700">
  </div>

  <?php if (isset($producto)): ?>
    <input type="hidden" name="id" value="<?= $producto->getId(); ?>">
  <?php endif; ?>

  <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
    Enviar
  </button>
</form>
