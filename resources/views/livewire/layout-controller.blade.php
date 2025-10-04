<div>
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('professional')) 
        @if ($selectedComponent == 'appointments-calendar')
            @livewire('appointments-calendar')
        @elseif ($selectedComponent == 'admin.cliente.crear-cliente')
            @livewire('admin.cliente.crear-cliente')
        @elseif ($selectedComponent == 'admin.dashboard')
            @livewire('admin.dashboard')
        @elseif ($selectedComponent == 'admin.cliente.cliente-table')
            <div class="flex px-4 pt-4 justify-between">
                <div class="col">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white lg:text-3xl">Lista de clientes</h1>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ver, añadir, editar y eliminar información del cliente.</p>
                </div>
                <div class="col">
                    <button type="button" onclick="cargarLivewire('admin.cliente.crear-cliente')"
                        class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                        Crear Cliente
                    </button>
                </div>
            </div>
            <div class="mx-2">
                @livewire('admin.cliente.cliente-table')
            </div>
        @endif
    @else
        @livewire('client.dashboard')
        <x-welcome />
    @endif
</div>
