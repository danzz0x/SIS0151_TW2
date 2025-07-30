<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Carrito extends Component
{
    #[Reactive]
    public $carrito = [];

    #[Reactive]
    public $total = 0;

    public function eliminar($id)
    {
        $this->dispatch('eliminarProducto', $id);
    }

    public function cambiarCantidad($id, $cantidad)
    {
        $this->dispatch('cambiarCantidad', [$id, $cantidad]);
    }
    public function confirmar()
    {
        $this->dispatch('confirmarVenta');
    }
    public function render()
    {
        return view('livewire.carrito');
    }
}
