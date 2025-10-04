<x-app-layout>
    <div class="mx-auto max-w-3xl px-5 py-4 md:p-6">
        <div class="mb-6">
            <div class="flex items-center gap-3 pb-6">
                <a href="{{ route('admin.profesionales.index') }}"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">Editar Profesional</h2>
            </div>
        </div>

        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <form action="{{ route('admin.profesionales.update', $profesional) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        @if ($profesional->foto)
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Foto Actual
                                </label>
                                <img src="{{ asset('storage/' . $profesional->foto) }}"
                                    class="h-24 w-24 rounded-lg object-cover" alt="{{ $profesional->nombre }}">
                            </div>
                        @endif

                        <div>
                            <label for="nombre"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre Completo <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nombre" id="nombre"
                                value="{{ old('nombre', $profesional->nombre) }}"
                                class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="especialidad"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Especialidad <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="especialidad" id="especialidad"
                                value="{{ old('especialidad', $profesional->especialidad) }}"
                                class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                required>
                            @error('especialidad')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="email"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $profesional->email) }}"
                                    class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                    required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telefono"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Teléfono
                                </label>
                                <input type="text" name="telefono" id="telefono"
                                    value="{{ old('telefono', $profesional->telefono) }}"
                                    class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                @error('telefono')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="fecha_ingreso"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Fecha de Ingreso <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="fecha_ingreso" id="fecha_ingreso"
                                value="{{ old('fecha_ingreso', $profesional->fecha_ingreso->format('Y-m-d')) }}"
                                class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                required>
                            @error('fecha_ingreso')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="foto"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Cambiar Foto de Perfil
                            </label>
                            <input type="file" name="foto" id="foto" accept="image/*"
                                class="shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                            <p class="mt-1 text-xs text-gray-500">JPG, PNG o GIF (Max. 2MB). Dejar vacío para mantener
                                la foto actual.</p>
                            @error('foto')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="activo" value="0">
                            <input type="checkbox" name="activo" id="activo" value="1"
                                {{ old('activo', $profesional->activo) ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="activo" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Profesional activo
                            </label>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <button type="submit"
                            class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                            Actualizar Profesional
                        </button>
                        <a href="{{ route('admin.profesionales.index') }}"
                            class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
