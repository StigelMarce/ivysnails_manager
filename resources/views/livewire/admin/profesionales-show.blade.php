<x-app-layout>
    <div class="mx-auto max-w-3xl px-5 py-4 md:p-6">
        <div class="mb-6">
            <div class="flex items-center justify-between pb-6">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.profesionales.index') }}" 
                       class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">Detalle del Profesional</h2>
                </div>
                <a href="{{ route('admin.profesionales.edit', $profesional) }}"
                   class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Editar
                </a>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-6">
                <div class="mb-8 flex items-start gap-6">
                    <div>
                        @if($profesional->foto)
                            <img src="{{ asset('storage/' . $profesional->foto) }}" 
                                 class="h-32 w-32 rounded-lg object-cover" 
                                 alt="{{ $profesional->nombre }}">
                        @else
                            <div class="h-32 w-32 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <span class="text-gray-500 dark:text-gray-400 text-4xl font-semibold">
                                    {{ substr($profesional->nombre, 0, 1) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ $profesional->nombre }}</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">{{ $profesional->especialidad }}</p>
                        <div class="mt-3">
                            @if($profesional->activo)
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
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h4 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Información de Contacto</h4>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Email</p>
                                <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white/90">{{ $profesional->email }}</p>
                            </div>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Teléfono</p>
                                <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white/90">{{ $profesional->telefono ?? 'No especificado' }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Información Adicional</h4>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Fecha de Ingreso</p>
                                <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white/90">{{ $profesional->fecha_ingreso->format('d/m/Y') }}</p>
                            </div>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Registrado</p>
                                <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white/90">{{ $profesional->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900">
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Última Actualización</p>
                                <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white/90">{{ $profesional->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">
                    <a href="{{ route('admin.profesionales.edit', $profesional) }}"
                       class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                        Editar Información
                    </a>
                    <form action="{{ route('admin.profesionales.destroy', $profesional) }}" 
                          method="POST" 
                          onsubmit="return confirm('¿Estás seguro de eliminar este profesional? Esta acción no se puede deshacer.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg border border-red-300 bg-white px-5 py-3 text-sm font-medium text-red-600 hover:bg-red-50 dark:border-red-700 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-red-900/20">
                            Eliminar Profesional
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>