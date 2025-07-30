<div class="bg-white shadow rounded p-4">
    <h2 class="text-xl font-bold mb-4">Ventas del mes</h2>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="bg-green-100 text-green-800 p-4 rounded">
            <p class="text-sm">Total ventas</p>
            <p class="text-xl font-semibold">Bs {{ number_format($totalVentas, 2) }}</p>
        </div>
        <div class="bg-blue-100 text-blue-800 p-4 rounded">
            <p class="text-sm">Cantidad de ventas</p>
            <p class="text-xl font-semibold">{{ $cantidadVentas }}</p>
        </div>
    </div>

    <h3 class="text-lg font-semibold mb-2">Últimas ventas</h3>
    <ul class="divide-y divide-gray-200 max-h-[300px] overflow-y-auto">
        @forelse ($ventasRecientes as $venta)
            <li class="py-2">
                <div class="flex justify-between">
                    <span class="font-medium">
                        {{ $venta->cliente->nombre ?? 'Cliente no registrado' }}
                    </span>
                    <span class="text-sm text-gray-600">
                        {{ $venta->created_at->format('d/m/Y H:i') }}
                    </span>
                </div>
                <p class="text-sm text-gray-700">Total: Bs {{ number_format($venta->total, 2) }}</p>
            </li>
        @empty
            <li class="text-gray-500 text-sm">No hay ventas registradas este mes.</li>
        @endforelse
    </ul>
</div>
