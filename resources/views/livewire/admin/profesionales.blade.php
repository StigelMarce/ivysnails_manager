<x-app-layout>
    {{-- <div class="py-2">
        <div
            class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">
                    Profesionales
                </h3>
                <div class="flex gap-3">
                    <a href="add-product.html"
                        class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:text-white dark:ring-blue-700 dark:hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Add Product
                    </a>
                </div>
            </div>

        </div>
    </div> --}}
    <div class="mx-auto max-w-(--breakpoint-2xl) px-5 py-4 md:p-6">
        <div>
            <div x-data="{ pageName: `Profesionales` }">
                <div class="flex flex-wrap items-center justify-between gap-3 pb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Profesionales
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
            <!-- Content Start -->
            <div>
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                    x-data="profesionalesTable()">
                    <div
                        class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                Todos los Profesionales
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Aquí puedes ver todos los profesionales registrados en el sistema.
                            </p>
                        </div>
                        {{-- <div class="flex gap-3">
                            <a href="{{ route('admin.profesionales.create') }}"
                                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-3 text-sm font-medium text-white ring-1 ring-blue-400 transition hover:bg-blue-600 dark:bg-blue-600 dark:text-white dark:ring-blue-700 dark:hover:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                Agregar Profesional
                            </a>
                        </div> --}}
                    </div>
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-800">
                        <div class="flex gap-3 sm:justify-between">
                            <div class="relative flex-1 sm:flex-auto">
                                <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z"
                                            fill=""></path>
                                    </svg>
                                </span>
                                <input type="text" placeholder="Buscar profesional..."
                                    x-model="search"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden sm:w-[300px] sm:min-w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            </div>
                            <div class="relative" x-data="{ showFilter: false }">
                                <button
                                    class="shadow-theme-xs flex h-11 w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 sm:w-auto sm:min-w-[100px] dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
                                    @click="showFilter = !showFilter" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M14.6537 5.90414C14.6537 4.48433 13.5027 3.33331 12.0829 3.33331C10.6631 3.33331 9.51206 4.48433 9.51204 5.90415M14.6537 5.90414C14.6537 7.32398 13.5027 8.47498 12.0829 8.47498C10.663 8.47498 9.51204 7.32398 9.51204 5.90415M14.6537 5.90414L17.7087 5.90411M9.51204 5.90415L2.29199 5.90411M5.34694 14.0958C5.34694 12.676 6.49794 11.525 7.91777 11.525C9.33761 11.525 10.4886 12.676 10.4886 14.0958M5.34694 14.0958C5.34694 15.5156 6.49794 16.6666 7.91778 16.6666C9.33761 16.6666 10.4886 15.5156 10.4886 14.0958M5.34694 14.0958L2.29199 14.0958M10.4886 14.0958L17.7087 14.0958"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    Filtrar
                                </button>
                                <div x-show="showFilter" @click.away="showFilter = false"
                                    class="absolute right-0 z-10 mt-2 w-56 rounded-lg border border-gray-200 bg-white p-4 shadow-lg dark:border-gray-700 dark:bg-gray-800"
                                    style="display: none;">
                                    <div class="mb-5">
                                        <label class="mb-2 block text-xs font-medium text-gray-700 dark:text-gray-300">
                                            Especialidad
                                        </label>
                                        <input type="text" x-model="especialidad"
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                            placeholder="Buscar especialidad...">
                                    </div>
                                    <div class="mb-5">
                                        <label class="mb-2 block text-xs font-medium text-gray-700 dark:text-gray-300">
                                            Estado
                                        </label>
                                        <select x-model="estado"
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                            <option value="">Todos</option>
                                            <option value="activo">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                    <button
                                        class="bg-brand-500 hover:bg-brand-600 h-10 w-full rounded-lg px-3 py-2 text-sm font-medium text-white"
                                        @click="showFilter = false">
                                        Aplicar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="custom-scrollbar overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="border-b border-gray-200 dark:divide-gray-800 dark:border-gray-800">
                                    <th class="w-14 px-5 py-4 text-left"></th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Nombre
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Especialidad
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Teléfono
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Email
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Estado
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        Fecha Ingreso
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                        <span class="sr-only">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-x divide-y divide-gray-200 dark:divide-gray-800">
                                <template x-for="(profesional, idx) in paginatedProfesionales()" :key="profesional.id">
                                    <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="w-14 px-5 py-4 whitespace-nowrap">
                                            <img :src="profesional.foto" class="h-12 w-12 rounded-md" alt="">
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-400"
                                                x-text="profesional.nombre"></span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-500 dark:text-gray-400"
                                                x-text="profesional.especialidad"></p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-700 dark:text-gray-400"
                                                x-text="profesional.telefono"></p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-700 dark:text-gray-400"
                                                x-text="profesional.email"></p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <span
                                                :class="profesional.activo ?
                                                    'bg-success-50 dark:bg-success-500/15 text-success-700 dark:text-success-500' :
                                                    'text-theme-xs rounded-full bg-red-50 px-2 py-0.5 font-medium text-red-700 dark:bg-red-500/15 dark:text-red-500'"
                                                class="text-theme-xs rounded-full px-2 py-0.5 font-medium"
                                                x-text="profesional.activo ? 'Activo' : 'Inactivo'"></span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <p class="text-sm text-gray-700 dark:text-gray-400"
                                                x-text="profesional.fecha_ingreso"></p>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <div x-data="dropdown()" class="relative flex justify-center">
                                                <button @click="toggle" class="text-gray-500 dark:text-gray-400">
                                                    <svg class="fill-current" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                                            fill=""></path>
                                                    </svg>
                                                </button>
                                                <div x-show="open" @click.outside="open = false"
                                                    class="shadow-theme-lg dark:bg-gray-dark fixed w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                                    x-ref="dropdown">
                                                    <a :href="`/admin/profesionales/${profesional.id}`"
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Ver más
                                                    </a>
                                                    <button
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                                                        @click="eliminarProfesional(profesional.id)">
                                                        Eliminar
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between border-t border-gray-200 px-5 py-4 sm:flex-row dark:border-gray-800">
                        <div class="pb-3 sm:pb-0">
                            <span class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                Mostrando
                                <span class="text-gray-800 dark:text-white/90" x-text="startItem()">1</span>
                                a
                                <span class="text-gray-800 dark:text-white/90" x-text="endItem()">7</span>
                                de
                                <span class="text-gray-800 dark:text-white/90" x-text="filteredProfesionales().length">0</span>
                            </span>
                        </div>
                        <div
                            class="flex w-full items-center justify-between gap-2 rounded-lg bg-gray-50 p-4 sm:w-auto sm:justify-normal sm:rounded-none sm:bg-transparent sm:p-0 dark:bg-gray-900 dark:sm:bg-transparent">
                            <button @click="prevPage" :disabled="page === 1"
                                class="shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white p-2 text-gray-700 hover:bg-gray-50 hover:text-gray-800 disabled:cursor-not-allowed disabled:opacity-50 sm:p-2.5 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                <span>
                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.58203 9.99868C2.58174 10.1909 2.6549 10.3833 2.80152 10.53L7.79818 15.5301C8.09097 15.8231 8.56584 15.8233 8.85883 15.5305C9.15183 15.2377 9.152 14.7629 8.85921 14.4699L5.13911 10.7472L16.6665 10.7472C17.0807 10.7472 17.4165 10.4114 17.4165 9.99715C17.4165 9.58294 17.0807 9.24715 16.6665 9.24715L5.14456 9.24715L8.85919 5.53016C9.15199 5.23717 9.15184 4.7623 8.85885 4.4695C8.56587 4.1767 8.09099 4.17685 7.79819 4.46984L2.84069 9.43049C2.68224 9.568 2.58203 9.77087 2.58203 9.99715C2.58203 9.99766 2.58203 9.99817 2.58203 9.99868Z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                            <span class="block text-sm font-medium text-gray-700 sm:hidden dark:text-gray-400">
                                Página <span x-text="page">1</span> de
                                <span x-text="totalPages()">1</span>
                            </span>
                            <ul class="hidden items-center gap-0.5 sm:flex">
                                <template x-for="n in totalPages()" :key="n">
                                    <li>
                                        <a href="#" @click.prevent="goToPage(n)"
                                            :class="page === n ? 'bg-brand-500 text-white' :
                                                'hover:bg-brand-500 text-gray-700 dark:text-gray-400 hover:text-white dark:hover:text-white'"
                                            class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-medium">
                                            <span x-text="n"></span>
                                        </a>
                                    </li>
                                </template>
                            </ul>
                            <button @click="nextPage" :disabled="page === totalPages()"
                                class="shadow-theme-xs flex items-center gap-2 rounded-lg border border-gray-300 bg-white p-2 text-gray-700 hover:bg-gray-50 hover:text-gray-800 disabled:cursor-not-allowed disabled:opacity-50 sm:p-2.5 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                <span>
                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.4165 9.9986C17.4168 10.1909 17.3437 10.3832 17.197 10.53L12.2004 15.5301C11.9076 15.8231 11.4327 15.8233 11.1397 15.5305C10.8467 15.2377 10.8465 14.7629 11.1393 14.4699L14.8594 10.7472L3.33203 10.7472C2.91782 10.7472 2.58203 10.4114 2.58203 9.99715C2.58203 9.58294 2.91782 9.24715 3.33203 9.24715L14.854 9.24715L11.1393 5.53016C10.8465 5.23717 10.8467 4.7623 11.1397 4.4695C11.4327 4.1767 11.9075 4.17685 12.2003 4.46984L17.1578 9.43049C17.3163 9.568 17.4165 9.77087 17.4165 9.99715C17.4165 9.99763 17.4165 9.99812 17.4165 9.9986Z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <script>
                    function profesionalesTable() {
                        return {
                            profesionales: [
                                {
                                    id: 1,
                                    nombre: "Ivana López",
                                    especialidad: "Manicurista",
                                    telefono: "1122334455",
                                    email: "ivana@ivysnails.com",
                                    activo: true,
                                    fecha_ingreso: "2023-01-15",
                                    foto: "/images/profesionales/ivana.jpg"
                                },
                                {
                                    id: 2,
                                    nombre: "Sofia Gómez",
                                    especialidad: "Pedicurista",
                                    telefono: "1133445566",
                                    email: "sofia@ivysnails.com",
                                    activo: true,
                                    fecha_ingreso: "2023-03-10",
                                    foto: "/images/profesionales/sofia.jpg"
                                },
                                {
                                    id: 3,
                                    nombre: "Carla Ruiz",
                                    especialidad: "Uñas Esculpidas",
                                    telefono: "1144556677",
                                    email: "carla@ivysnails.com",
                                    activo: false,
                                    fecha_ingreso: "2022-11-20",
                                    foto: "/images/profesionales/carla.jpg"
                                },
                                // Agrega más profesionales según tu sistema
                            ],
                            search: '',
                            especialidad: '',
                            estado: '',
                            page: 1,
                            perPage: 7,
                            filteredProfesionales() {
                                return this.profesionales.filter(p => {
                                    let match = true;
                                    if (this.search) {
                                        match = p.nombre.toLowerCase().includes(this.search.toLowerCase()) ||
                                            p.email.toLowerCase().includes(this.search.toLowerCase()) ||
                                            p.telefono.includes(this.search);
                                    }
                                    if (match && this.especialidad) {
                                        match = p.especialidad.toLowerCase().includes(this.especialidad.toLowerCase());
                                    }
                                    if (match && this.estado) {
                                        match = this.estado === 'activo' ? p.activo : !p.activo;
                                    }
                                    return match;
                                });
                            },
                            paginatedProfesionales() {
                                const items = this.filteredProfesionales();
                                const start = (this.page - 1) * this.perPage;
                                return items.slice(start, start + this.perPage);
                            },
                            totalPages() {
                                return Math.max(1, Math.ceil(this.filteredProfesionales().length / this.perPage));
                            },
                            goToPage(n) {
                                if (n >= 1 && n <= this.totalPages()) this.page = n;
                            },
                            prevPage() {
                                if (this.page > 1) this.page--;
                            },
                            nextPage() {
                                if (this.page < this.totalPages()) this.page++;
                            },
                            startItem() {
                                return this.filteredProfesionales().length === 0 ?
                                    0 :
                                    (this.page - 1) * this.perPage + 1;
                            },
                            endItem() {
                                return Math.min(this.page * this.perPage, this.filteredProfesionales().length);
                            },
                            eliminarProfesional(id) {
                                this.profesionales = this.profesionales.filter(p => p.id !== id);
                            }
                        };
                    }
                    function dropdown() {
                        return {
                            open: false,
                            toggle() {
                                this.open = !this.open;
                            }
                        }
                    }
                </script>
            </div>
            <!-- Content End -->
        </div>
    </div>
</x-app-layout>
