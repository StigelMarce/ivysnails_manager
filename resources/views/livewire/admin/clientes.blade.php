<x-app-layout>
    <div class="mx-auto max-w-(--breakpoint-2xl) px-5 py-4 md:p-6">
        <div>
            <div x-data="{ pageName: `Clientes` }">
                <div class="flex flex-wrap items-center justify-between gap-3 pb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Clientes
                    </h2>
                    <ol class="flex items-center gap-1.5">
                        <li>
                            <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                href="{{ route('dashboard') }}">
                                Dashboard
                                <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor"
                                        stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName"></li>
                    </ol>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-green-900/20 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div>
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div
                        class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                Todos los Clientes
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Aquí puedes ver todos los clientes registrados en el sistema.
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('admin.clientes.create') }}"
                                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:text-white dark:ring-blue-700 dark:hover:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                Agregar Cliente
                            </a>
                        </div>
                    </div>

                    <div class="custom-scrollbar overflow-x-auto">
                        @livewire('admin.cliente.cliente-table-yr40kn-table')
                        {{-- Tabla anterior con Livewire --}}
                        {{-- <table class="w-full table-auto">
                            <thead>
                                <tr class="border-b border-gray-200 dark:divide-gray-800 dark:border-gray-800">
                                    <th class="w-14 px-5 py-4 text-left"></th>
                                    <th
                                        class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Nombre</th>
                                    <th
                                        class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Apellido</th>
                                    <th
                                        class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Teléfono</th>
                                    <th
                                        class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Email</th>
                                    <th
                                        class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Fecha Registro</th>
                                    <th
                                        class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        <span class="sr-only">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-x divide-y divide-gray-200 dark:divide-gray-800">
                                @forelse($clientes as $cliente)
                                    <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="w-14 px-5 py-4 whitespace-nowrap">
                                            @if ($cliente->foto)
                                                <img src="{{ asset('storage/' . $cliente->foto) }}"
                                                    class="h-12 w-12 rounded-md object-cover"
                                                    alt="{{ $cliente->nombre }}">
                                            @else
                                                <div
                                                    class="h-12 w-12 rounded-md bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                    <span
                                                        class="text-gray-500 dark:text-gray-400 text-lg font-semibold">
                                                        {{ substr($cliente->nombre, 0, 1) }}
                                                    </span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                                {{ $cliente->nombre }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                                {{ $cliente->apellido }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-700 dark:text-gray-400">
                                                {{ $cliente->telefono ?? 'N/A' }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-700 dark:text-gray-400">
                                                {{ $cliente->email }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-700 dark:text-gray-400">
                                                {{ $cliente->created_at->format('d/m/Y') }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <div x-data="{ open: false }" class="relative flex justify-center">
                                                <button @click="open = !open" class="text-gray-500 dark:text-gray-400">
                                                    <svg class="fill-current" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                                            fill=""></path>
                                                    </svg>
                                                </button>
                                                <div x-show="open" @click.outside="open = false"
                                                    class="shadow-theme-lg dark:bg-gray-dark absolute right-0 top-8 z-10 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                                    style="display: none;">
                                                    <a href="{{ route('admin.clientes.show', $cliente) }}"
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Ver detalles
                                                    </a>
                                                    <a href="{{ route('admin.clientes.edit', $cliente) }}"
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Editar
                                                    </a>
                                                    <form
                                                        action="{{ route('admin.clientes.destroy', $cliente) }}"
                                                        method="POST" class="w-full"
                                                        onsubmit="return confirm('¿Estás seguro de eliminar este cliente?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-red-500 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8"
                                            class="px-5 py-8 text-center text-gray-500 dark:text-gray-400">
                                            No hay clientes registrados aún.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
