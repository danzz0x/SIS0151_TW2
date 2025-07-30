<?php

namespace App\Models;

class Producto
{

  private int $id;
  private string $nombre;
  private int $cantidad;
  private float $precio;
  private string $descripcion;
  private string $imagen;
  private bool $disponible;
  public function __construct($id = 0, $nombre, $cantidad, $precio, $descripcion = '', $imagen = '', $disponible = true)
  {
    $this->id = (int)$id;
    $this->nombre = $nombre;
    $this->cantidad = $cantidad;
    $this->precio = (float)$precio;
    $this->descripcion = $descripcion;
    $this->imagen = $imagen;
    $this->disponible = $disponible;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
  public function getCantidad()
  {
    return $this->cantidad;
  }
  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;
  }
  public function getPrecio()
  {
    return $this->precio;
  }
  public function setPrecio($precio)
  {
    $this->precio = $precio;
  }
  public function getDescripcion()
  {
    return $this->descripcion;
  }
  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }
  public function getImagen()
  {
    return $this->imagen;
  }
  public function setImagen($imagen)
  {
    $this->imagen = $imagen;
  }
  public function isDisponible()
  {
    return $this->disponible;
  }
  public function setDisponible($disponible)
  {
    $this->disponible = $disponible;
  }
  public function __toString()
  {
    return "{" . $this->nombre . ", " . $this->precio . "}";
  }
}
