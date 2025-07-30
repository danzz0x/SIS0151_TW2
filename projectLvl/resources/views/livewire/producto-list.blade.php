<div class="p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Buscar Productos</h2>

    <input type="text" wire:model.live.debounce.300ms="busqueda" placeholder="Buscar por nombre..."
        class="w-full border rounded p-4 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 max-h-[600px] overflow-y-auto">
        @forelse ($productos as $producto)
            <div
                class="bg-white rounded-lg shadow hover:shadow-md transition-all p-4 flex flex-col justify-between border border-gray-200">
                <div class="text-center mb-2">
                    <p class="text-lg font-semibold text-gray-800">{{ $producto->nombre }}</p>
                    <p class="text-sm text-gray-600">Bs {{ number_format($producto->precio, 2) }}</p>
                    <p class="text-sm text-gray-500">Stock: {{ $producto->cantidad }}</p>
                </div>
                <button wire:click="agregar({{ $producto->id }})"
                    class="w-full mt-auto bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    Agregar
                </button>
            </div>
        @empty
            <p class="text-gray-500 text-center col-span-full">No hay productos disponibles.</p>
        @endforelse
    </div>
</div>
