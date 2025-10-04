<div>
    <div class="mx-auto max-w-3xl px-5 py-4 md:p-6">
        <div class="mb-6">
            <div class="flex items-center gap-3 pb-6">
                <a href="#" onclick="askCargarComponente('admin.cliente.cliente-table')"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">Crear Nuevo Cliente</h2>
            </div>
        </div>
        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <form wire:submit.prevent="store" class="space-y-6">
                    @csrf

                    <div class="space-y-6">
                        <!-- Nombre -->
                        <div>
                            <label for="nombre"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nombre" id="nombre" wire:model.live="nombre" 
                                class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border 
                                border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3
                                focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90
                                @error('nombre') border-red-500 dark:border-red-500 @enderror @if (!$errors->has('nombre') && $nombre != '') border-green-500 dark:border-green-500 @endif"
                                placeholder="Ej: María" required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @if (!$errors->has('nombre') && $nombre != '')
                                <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                            @endif
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label for="apellido"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Apellido <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="apellido" id="apellido" wire:model.live="apellido" 
                                class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border 
                                border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3
                                focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90
                                @error('apellido') border-red-500 dark:border-red-500 @enderror @if (!$errors->has('apellido') && $apellido != '') border-green-500 dark:border-green-500 @endif"
                                placeholder="Ej: María" required>
                            @error('apellido')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @if (!$errors->has('apellido') && $apellido != '')
                                <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                            @endif
                        </div>

                        <!-- DNI y Edad en dos columnas -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="dni"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    DNI <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="dni" id="dni" wire:model.live="dni" 
                                    class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border 
                                border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3
                                focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90
                                @error('dni') border-red-500 dark:border-red-500 @enderror @if (!$errors->has('dni') && $dni != '') border-green-500 dark:border-green-500 @endif"
                                    placeholder="Ej: 12345678" required>
                                @error('dni')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @if (!$errors->has('dni') && $dni != '')
                                    <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                                @endif
                            </div>
                            <div>
                                <div>
                                    <label for="fecha_nacimiento"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Fecha de Nacimiento
                                    </label>

                                    <input wire:ignore.self type="text" name="fecha_nacimiento" id="fecha_nacimiento"
                                        wire:model.live="fecha_nacimiento" 
                                        class="flatpickr flatpickr-input active shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90
                                        @error('fecha_nacimiento') border-red-500 @enderror
                                        @if (!$errors->has('fecha_nacimiento') && $fecha_nacimiento != '') border-green-500 @endif"
                                        placeholder="Seleccione una fecha">

                                    @error('fecha_nacimiento')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror

                                    @if (!$errors->has('fecha_nacimiento') && $fecha_nacimiento != '')
                                        <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <!-- Sexo -->
                        <div>
                            <label for="sexo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Sexo
                            </label>
                            <div wire:ignore>
                                <select name="sexo" id="sexo"
                                    onchange="Livewire.dispatch('cambiarSexo', [this.value])"
                                    class="select2 shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                    <option value="Default">Seleccione una opción</option>
                                    @foreach ($sexos as $sexoOption)
                                        <option value="{{ $sexoOption->nombre }}"
                                            {{ $sexo == $sexoOption->nombre ? 'selected' : '' }}>
                                            {{ $sexoOption->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('sexo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            @if (!$errors->has('sexo') && $sexo != '')
                                <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                            @endif
                        </div>

                        <!-- Email y Teléfono en dos columnas -->
                        <div class="grid grid-cols-2 gap-6 md:grid-cols-2">
                            <div>
                                <label for="email"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email" wire:model.live="email" 
                                    class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border 
                                    border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3
                                    focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90
                                    @error('email') border-red-500 dark:border-red-500 @enderror @if (!$errors->has('email') && $email != '') border-green-500 dark:border-green-500 @endif"
                                    placeholder="Ej: maria@example.com" required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @if (!$errors->has('email') && $email != '')
                                    <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                                @endif
                            </div>

                            <!-- Foto -->
                            <div>
                                <label for="foto"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Foto de Perfil
                                </label>
                                <input type="file" name="foto" id="foto" wire:model.live="foto" 
                                    class="shadow-theme-xs focus:border-blue-300 focus:ring-blue-500/10 h-11 w-full rounded-lg border 
                                    border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3
                                    focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90
                                    @error('foto') border-red-500 dark:border-red-500 @enderror @if (!$errors->has('foto') && $foto != '') border-green-500 dark:border-green-500 @endif"
                                    placeholder="Ej: maria@example.com" required>
                                @error('foto')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @if (!$errors->has('foto') && $foto != '')
                                    <p class="mt-1 text-sm text-green-600">Campo correcto.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 flex gap-3">
                        <button type="submit"
                            class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:ring-blue-700 dark:hover:bg-blue-700">
                            Guardar
                        </button>
                        <a href="#" onclick="askCargarComponente('admin.cliente.cliente-table')"
                            class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
