<div class="p-4 m-2 bg-white rounded shadow flex-1">
    <h2 class="text-xl font-bold mb-4">Carrito</h2>

    @if (count($carrito) > 0)
        <div class="space-y-3 max-h-[300px] overflow-y-auto">
            @foreach ($carrito as $item)
                <div class="flex justify-between items-center border rounded p-2 bg-gray-50">
                    <div>
                        <p class="font-semibold">{{ $item['nombre'] }}</p>
                        <p class="text-sm text-gray-500">Precio: Bs {{ number_format($item['precio'], 2) }}</p>
                        <p class="text-sm text-gray-500">Subtotal: Bs {{ number_format($item['subtotal'], 2) }}</p>
                    </div>
                    <div class="flex flex-col items-end space-y-1">
                        <div class="flex gap-1 items-center">
                            <label class="text-sm">Cantidad:</label>
                            <input type="number" min="1" value="{{ $item['cantidad'] }}"
                                wire:change="cambiarCantidad({{ $item['id'] }}, $event.target.value)"
                                class="w-16 border px-2 py-1 text-sm">
                        </div>
                        <button wire:click="eliminar({{ $item['id'] }})"
                            class="text-red-600 hover:underline text-sm">Eliminar</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 border-t pt-2">
            <p class="text-right font-bold text-lg">Total: Bs {{ number_format($total, 2) }}</p>
            <button wire:click="confirmar" class="mt-2 w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Confirmar Venta
            </button>
        </div>
    @else
        <p class="text-gray-500">El carrito está vacío.</p>
    @endif
</div>
