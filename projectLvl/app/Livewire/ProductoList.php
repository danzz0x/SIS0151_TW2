<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductoList extends Component
{
    public $busqueda = '';
    public function agregar($id)
    {
        $producto = Producto::find($id);
        if ($producto && $producto->disponible && $producto->cantidad > 0) {
            $this->dispatch('productoAgregado', [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
            ]);
        }
    }

    #[On('actualizarStock')]
    public function render()
    {
        $productos = Producto::where('nombre', 'like', '%' . $this->busqueda . '%')
            ->where('disponible', true)
            ->where('cantidad', '>', 0)
            ->orderBy('nombre')
            ->get();

        return view('livewire.producto-list', [
            'productos' => $productos,
        ]);
    }
}
