<x-app-layout>
    <div class="mx-auto max-w-3xl px-5 py-4 md:p-6">
        <div class="mb-6">
            <div class="flex items-center gap-3 pb-6">
                <a href="{{ route('admin.clientes.index') }}" 
                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">Detalle del Cliente</h2>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <div class="flex items-start gap-6 mb-8">
                    <div>
                        @if($cliente->foto)
                            <img src="{{ asset('storage/' . $cliente->foto) }}" 
                                 class="h-32 w-32 rounded-lg object-cover" 
                                 alt="{{ $cliente->nombre }}">
                        @else
                            <div class="h-32 w-32 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <span class="text-gray-500 dark:text-gray-400 text-4xl font-semibold">
                                    {{ substr($cliente->nombre, 0, 1) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    {{-- <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ $cliente->nombre }}</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">{{ $cliente->apellido }}</p>
                        <div class="mt-3">
                            @if($cliente->activo)
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-sm font-medium text-green-700 dark:bg-green-500/15 dark:text-green-500">
                                    <svg class="h-2 w-2 fill-current" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="4"/>
                                    </svg>
                                    Activo
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-sm font-medium text-red-700 dark:bg-red-500/15 dark:text-red-500">
                                    <svg class="h-2 w-2 fill-current" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="4"/>
                                    </svg>
                                    Inactivo
                                </span>
                            @endif
                        </div>
                    </div> --}}
                </div>

                <div class="space-y-6">
                    <!-- Nombre y Apellido -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->nombre }}</span>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->apellido }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- DNI y Edad -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">DNI</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->dni }}</span>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Edad</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->edad ?? 'No especificada' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sexo -->
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Sexo</p>
                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                            <span class="text-gray-800 dark:text-white/90">{{ $cliente->sexo ?? 'No especificado' }}</span>
                        </div>
                    </div>

                    <!-- Email y Teléfono -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->email }}</span>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->telefono ?? 'No especificado' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Dirección</p>
                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                            <span class="text-gray-800 dark:text-white/90">{{ $cliente->direccion ?? 'No especificada' }}</span>
                        </div>
                    </div>

                    <!-- Fechas -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Registro</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Última Actualización</p>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <span class="text-gray-800 dark:text-white/90">{{ $cliente->updated_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="mt-8 flex gap-3">
                    <a href="{{ route('admin.clientes.edit', $cliente) }}"
                       class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                        Editar Información
                    </a>
                    <form action="{{ route('admin.clientes.destroy', $cliente) }}" 
                          method="POST" 
                          onsubmit="return confirm('¿Estás seguro de eliminar este cliente? Esta acción no se puede deshacer.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg border border-red-300 bg-white px-5 py-3 text-sm font-medium text-red-600 hover:bg-red-50 dark:border-red-700 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-red-900/20">
                            Eliminar Cliente
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>