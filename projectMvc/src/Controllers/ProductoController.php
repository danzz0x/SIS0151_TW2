<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Producto;
use App\Util\DatabaseConn;

class ProductoController extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = DatabaseConn::getConn();
  }

  public function index()
  {
    $resultados = $this->db->table('productos')->fetchAll();
    $productos = [];

    foreach ($resultados as $prod) {
      $productos[] = new Producto(
        $prod->id,
        $prod->nombre,
        $prod->cantidad,
        $prod->precio,
        $prod->descripcion,
        $prod->imagen,
        $prod->disponible
      );
    }

    $this->render('producto/index', ['productos' => $productos]);
  }

  public function create()
  {
    $this->render('producto/create');
  }

  public function addOrUpdate()
  {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $cantidad = $_POST['cantidad'] ?? 0;
    $descripcion = $_POST['descripcion'] ?? '';
    $disponible = $_POST['disponible'] ?? 1;

    $imagen = null;

    // Procesar imagen si se subió
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
      $tmp = $_FILES['imagen']['tmp_name'];
      $nombreOriginal = basename($_FILES['imagen']['name']);
      $ext = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
      $nombreFinal = uniqid('img_') . '.' . $ext;

      $rutaDestino = __DIR__ . '/../../public/uploads/' . $nombreFinal;

      if (move_uploaded_file($tmp, $rutaDestino)) {
        $imagen = 'uploads/' . $nombreFinal;
      }
    }

    // Si es actualización, obtenemos el producto anterior para eliminar imagen vieja si se cambió
    if ($id) {
      $productoActual = $this->db->table('productos')->get($id);
      $imagenAnterior = $productoActual->imagen;

      if (!$imagen) {
        $imagen = $imagenAnterior; // No se subió imagen nueva
      } else {
        // Se subió una nueva imagen, borramos la anterior
        if ($imagenAnterior && file_exists(__DIR__ . '/../../public/' . $imagenAnterior)) {
          unlink(__DIR__ . '/../../public/' . $imagenAnterior);
        }
      }

      $this->db->table('productos')
        ->where('id', $id)
        ->update([
          'nombre' => $nombre,
          'precio' => $precio,
          'cantidad' => $cantidad,
          'descripcion' => $descripcion,
          'imagen' => $imagen,
        ]);
    } else {
      // Nuevo producto
      $this->db->table('productos')->insert([
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'descripcion' => $descripcion,
        'imagen' => $imagen,
      ]);
    }
    $data = ['producto' => new Producto(
      $nombre,
      $cantidad,
      $precio,
      $descripcion,
      $imagen,
      $disponible,
    )];
    $this->render('producto/save', ['producto' => $data['producto'], 'resultado' => 'Producto guardado correctamente']);
  }
  public function isDisponible()
  {
    $id = $_POST['id'];
    $producto = $this->db->table('productos')->get($id);
    $this->db->table('productos')
      ->where('id', $id)
      ->update(['disponible' => !$producto->disponible]);
    $data = ['resultado' => 'Producto ' . (!$producto->disponible ? 'habilitado' : 'deshabilitado')];
    $this->render('producto/estado', ['data' => $data]);
  }
  public function edit()
  {
    $id = $_POST['id'];
    $result = $this->db->table('productos')->get($id);
    $producto = new Producto(
      $result->id,
      $result->nombre,
      $result->cantidad,
      $result->precio,
      $result->descripcion,
      $result->imagen,
      $result->disponible
    );
    $this->render('producto/create', ['producto' => $producto]);
  }
}
