<div class="p-4 bg-white rounded shadow">
    <label class="font-semibold">Buscar cliente:</label>
    <input type="text" wire:model.live.debounce.300ms="busqueda" placeholder="Nombre o CI"
        class="w-full border rounded p-2 mb-4" @disabled($clienteSeleccionado !== null) />

    @if ($clienteSeleccionado)
        <div class="bg-gray-100 border border-gray-300 p-3 rounded mb-4 flex justify-between items-center">
            <div>
                <p class="font-semibold">{{ $clienteSeleccionado['nombre'] }}</p>
                <p class="text-sm text-gray-600">CI: {{ $clienteSeleccionado['ci'] }}</p>
            </div>
            <button wire:click="quitarCliente" class="text-red-600 text-sm hover:underline">Quitar</button>
        </div>
    @endif

    @if (!$clienteSeleccionado && $clientes && count($clientes) > 0)
        <div class="border rounded p-2 max-h-48 overflow-auto space-y-2">
            @foreach ($clientes as $cliente)
                <div class="flex justify-between items-center border-b pb-1">
                    <div>
                        <strong>{{ $cliente->nombre }}</strong> - CI: {{ $cliente->ci }}
                    </div>
                    <button wire:click="seleccionarCliente({{ $cliente->id }})"
                        class="bg-green-500 text-white px-2 py-1 rounded text-sm hover:bg-green-600">
                        Seleccionar
                    </button>
                </div>
            @endforeach
        </div>
    @elseif (!$clienteSeleccionado && strlen($busqueda) > 3)
        <p class="text-sm text-gray-600 mb-2">No se encontró ningún cliente. Puedes registrarlo abajo:</p>

        <div class="space-y-2">
            <input type="text" wire:model="nuevoNombre" placeholder="Nombre completo"
                class="w-full border rounded p-2" />
            <input type="text" wire:model="nuevoCi" placeholder="CI" class="w-full border rounded p-2" />

            @error('nuevoNombre')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            @error('nuevoCi')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <button wire:click="crearCliente" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                Crear cliente
            </button>
        </div>
    @endif
</div>
