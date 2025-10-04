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
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">Crear Nuevo Cliente</h2>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <form action="{{ route('admin.clientes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-6">
                        <!-- Nombre -->
                        <div>
                            <label for="nombre" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre" 
                                   value="{{ old('nombre') }}"
                                   class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                   placeholder="Ej: María"
                                   required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label for="apellido" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Apellido <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="apellido" 
                                   id="apellido" 
                                   value="{{ old('apellido') }}"
                                   class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                   placeholder="Ej: González"
                                   required>
                            @error('apellido')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- DNI y Edad en dos columnas -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="dni" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    DNI <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="dni" 
                                       id="dni" 
                                       value="{{ old('dni') }}"
                                       class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                       placeholder="Ej: 12345678"
                                       required>
                                @error('dni')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="edad" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Edad
                                </label>
                                <input type="text" 
                                       name="edad" 
                                       id="edad" 
                                       value="{{ old('edad') }}"
                                       class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                       placeholder="Ej: 25">
                                @error('edad')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Sexo -->
                        <div>
                            <label for="sexo" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Sexo
                            </label>
                            <select name="sexo" id="sexo"
                                    class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                <option value="" {{ old('sexo') == '' ? 'selected' : '' }}>Seleccione</option>
                                <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Otro" {{ old('sexo') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('sexo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email y Teléfono en dos columnas -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       value="{{ old('email') }}"
                                       class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                       placeholder="ejemplo@email.com"
                                       required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telefono" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Teléfono
                                </label>
                                <input type="text" 
                                       name="telefono" 
                                       id="telefono" 
                                       value="{{ old('telefono') }}"
                                       class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                       placeholder="1122334455">
                                @error('telefono')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Foto -->
                        <div>
                            <label for="foto" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Foto de Perfil
                            </label>
                            <input type="file" 
                                   name="foto" 
                                   id="foto" 
                                   accept="image/*"
                                   class="shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                            <p class="mt-1 text-xs text-gray-500">JPG, PNG o GIF (Max. 2MB)</p>
                            @error('foto')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 flex gap-3">
                        <button type="submit"
                                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                            Guardar Cliente
                        </button>
                        <a href="{{ route('admin.clientes.index') }}"
                           class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
