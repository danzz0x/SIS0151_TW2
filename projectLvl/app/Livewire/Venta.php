<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venta as VentaModel;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Venta extends Component
{
    public $carrito = [];
    public $cliente_id = null;

    #[On('cambiarCantidad')]
    public function actualizarCantidad($data)
    {
        [$id, $cantidad] = $data;
        foreach ($this->carrito as &$item) {
            if ($item['id'] == $id) {
                $item['cantidad'] = max(1, (int)$cantidad);
                $item['subtotal'] = $item['cantidad'] * $item['precio'];
                break;
            }
        }
    }
    #[On('clienteSeleccionado')]
    public function setCliente($clienteId)
    {
        $this->cliente_id = $clienteId;
    }

    #[On('productoAgregado')]
    public function agregarAlCarrito($producto)
    {
        if (!$this->aumentarCantidad($producto['id'])) {
            $this->carrito[] = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => 1,
                'subtotal' => $producto['precio'],
            ];
        }
    }

    #[On('aumentarCantidad')]
    public function aumentarCantidad($id)
    {
        foreach ($this->carrito as &$item) {
            if ($item['id'] == $id) {
                $item['cantidad'] += 1;
                $item['subtotal'] = $item['cantidad'] * $item['precio'];
                return true;
            }
        }
        return false;
    }

    #[On('eliminarProducto')]
    public function eliminarDelCarrito($id)
    {
        $this->carrito = array_filter($this->carrito, fn($item) => $item['id'] != $id);
    }



    public function getTotalProperty()
    {
        return   collect($this->carrito)->sum('subtotal');
    }

    #[On('confirmarVenta')]
    public function guardarVenta()
    {


        $this->validate([
            'cliente_id' => 'exists:clientes,id',
            'carrito' => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {

            $venta = VentaModel::create([
                'total' => $this->total,
                'user_id' => auth()->id(),
                'cliente_id' => $this->cliente_id,
            ]);


            foreach ($this->carrito as $item) {
                DetalleVenta::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $item['id'],
                    'cantidad' => $item['cantidad'],
                    'precio' => $item['precio'],
                ]);

                $producto = Producto::find($item['id']);
                if ($producto) {
                    $producto->cantidad -= $item['cantidad'];
                    $producto->save();
                }
            }

            $this->dispatch('actualizarStock');
            $this->dispatch('quitarCliente');

            DB::commit();


            $this->carrito = [];
            $this->cliente_id = null;

            session()->flash('success', 'Venta registrada exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Error al guardar la venta: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.venta');
    }
}
