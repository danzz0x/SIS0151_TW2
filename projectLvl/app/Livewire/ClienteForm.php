<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Attributes\On;
use Livewire\Component;

class ClienteForm extends Component
{
    public $busqueda = '';
    public $clientes = [];
    public $cliente_id = null;
    public $clienteSeleccionado = null;

    public $nuevoNombre = '';
    public $nuevoCi = '';

    public function updatedBusqueda()
    {
        if (!$this->clienteSeleccionado) {
            $this->clientes = Cliente::where('nombre', 'like', '%' . $this->busqueda . '%')
                ->orWhere('ci', 'like', '%' . $this->busqueda . '%')
                ->get();
        }
    }

    public function seleccionarCliente($id)
    {
        $this->cliente_id = $id;
        $cliente = Cliente::find($id);
        $this->clienteSeleccionado = [
            'id' => $cliente->id,
            'nombre' => $cliente->nombre,
            'ci' => $cliente->ci,
        ];
        $this->dispatch('clienteSeleccionado', $id);
        $this->reset('clientes', 'busqueda');
    }

    #[On('quitarCliente')]
    public function quitarCliente()
    {
        $this->cliente_id = null;
        $this->clienteSeleccionado = null;
    }

    public function crearCliente()
    {
        $this->validate([
            'nuevoNombre' => 'required|string|min:2',
            'nuevoCi' => 'required|string|unique:clientes,ci',
        ]);

        $cliente = Cliente::create([
            'nombre' => $this->nuevoNombre,
            'ci' => $this->nuevoCi,
        ]);

        $this->cliente_id = $cliente->id;
        $this->clienteSeleccionado = [
            'id' => $cliente->id,
            'nombre' => $cliente->nombre,
            'ci' => $cliente->ci,
        ];

        $this->dispatch('clienteSeleccionado', $cliente->id);

        $this->reset(['nuevoNombre', 'nuevoCi', 'clientes', 'busqueda']);
    }

    public function render()
    {
        return view('livewire.cliente-form');
    }
}
