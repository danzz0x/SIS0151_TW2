<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Carbon\Carbon;



class VentaController extends Controller
{
    public function index()
    {
        return response()->json(Venta::with('detalles')->get());
    }

    public function ventasMesActual()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $ventas = Venta::with('detalles')
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->get();

        $totalVentas = $ventas->sum('total');

        return response()->json([
            'ventas' => $ventas,
            'total_ventas_mes' => $totalVentas,
            'periodo' => $inicioMes->format('Y-m-d') . ' a ' . $finMes->format('Y-m-d'),
        ]);
    }
}
