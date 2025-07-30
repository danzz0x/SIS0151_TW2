<div class="overflow-x-auto mt-8 max-w-6xl mx-auto">
  <table class="min-w-full border border-gray-200 bg-white shadow-md rounded">
    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
      <tr>
        <th class="px-4 py-2 border">ID</th>
        <th class="px-4 py-2 border">Nombre</th>
        <th class="px-4 py-2 border">Precio</th>
        <th class="px-4 py-2 border">Cantidad</th>
        <th class="px-4 py-2 border">Descripción</th>
        <th class="px-4 py-2 border">Imagen</th>
        <th class="px-4 py-2 border">Disponible</th>
        <th class="px-4 py-2 border">Acciones</th>
      </tr>
    </thead>
    <tbody class="text-sm text-gray-700">
      <?php foreach ($productos as $p): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border text-center"><?= $p->getId(); ?></td>
          <td class="px-4 py-2 border"><?= $p->getNombre(); ?></td>
          <td class="px-4 py-2 border">Bs <?= number_format($p->getPrecio(), 2); ?></td>
          <td class="px-4 py-2 border"><?= $p->getCantidad(); ?></td>
          <td class="px-4 py-2 border"><?= $p->getDescripcion(); ?></td>
          <td class="px-4 py-2 border text-center">
            <?php if ($p->getImagen()): ?>
              <img src="/<?= htmlspecialchars($p->getImagen()) ?>" alt="Imagen del producto" class="w-12 h-12 object-cover mx-auto rounded">
            <?php else: ?>
              <span class="text-gray-500 italic">Sin imagen</span>
            <?php endif; ?>
          </td>
          <td class="px-4 py-2 border text-center"><?= $p->isDisponible() ? 'Sí' : 'No'; ?></td>
          <td class="px-4 py-2 border space-x-2 text-center flex">
            <form method="POST" action="/producto/edit" class="inline">
              <input type="hidden" name="id" value="<?= $p->getId(); ?>">
              <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                Editar
              </button>
            </form>
            <form method="post" action="/producto/estado" class="inline">
              <input type="hidden" name="id" value="<?= $p->getId(); ?>">
              <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                <?= $p->isDisponible() ? 'Deshabilitar' : 'Habilitar'; ?>
              </button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
