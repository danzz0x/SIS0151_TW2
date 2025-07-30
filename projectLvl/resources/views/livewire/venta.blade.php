<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
    <div class="md:col-span-2 p-2">
        <livewire:producto-list />
    </div>

    <div class="flex flex-col space-y-4 p-2">
        <livewire:cliente-form />
        <livewire:carrito :carrito="$carrito" :total="$this->total" />
    </div>
</div>
