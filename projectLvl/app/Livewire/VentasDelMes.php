<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venta;
use Carbon\Carbon;

class VentasDelMes extends Component
{
    public $totalVentas = 0;
    public $cantidadVentas = 0;
    public $ventasRecientes = [];

    public function mount()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $ventas = Venta::with('cliente')
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->latest()
            ->get();

        $this->totalVentas = $ventas->sum('total');
        $this->cantidadVentas = $ventas->count();
        $this->ventasRecientes = $ventas->take(10);
    }

    public function render()
    {
        return view('livewire.ventas-del-mes');
    }
}
