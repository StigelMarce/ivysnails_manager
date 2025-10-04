<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed top-0 left-0 z-40 flex h-screen w-[290px] flex-col overflow-y-auto border-r border-gray-200 bg-white px-5 transition-all duration-300 xl:static xl:translate-x-0 dark:border-gray-700 dark:bg-gray-800">

    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="{{ route('dashboard') }}">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="/images/logo/logo.svg" alt="Logo">
                <img class="hidden dark:block" src="/images/logo/logo-dark.svg" alt="Logo" />
            </span>
            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="/images/logo/logo-icon.svg"
                alt="Logo" />
        </a>
    </div>

    <!-- SIDEBAR CONTENT -->
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar" :class="sidebarToggle ? 'text-center justify-center' : ''">
        <nav x-data="{ selected: $persist('Dashboard'), openDropdown: '' }">
            <!-- Menu Group Title -->
            <div class="mb-4">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-400 dark:text-gray-500">
                    <span class="menu-item-text">MENÚ</span>
                </h3>
            </div>

            <ul class="flex flex-col gap-1.5">
                <!-- Dashboard -->
                <li>
                    <a href="#" @click.prevent="selected = 'Dashboard'; cargarLivewire('admin.dashboard')"
                        :class="selected === 'Dashboard' ? 'bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">
                        <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z" />
                        </svg>
                        <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">
                            Dashboard
                        </span>
                        {{-- <span :class="sidebarToggle ? 'hidden' : ''" class="block">Dashboard</span> --}}
                    </a>
                </li>

                <!-- Calendar -->
                <li>
                    <a href="#"
                        @click.prevent="selected = 'Clientes'; cargarLivewire('appointments-calendar')" 
                        :class="selected === 'Calendar' ? 'bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">
                        <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z" />
                        </svg>
                        <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">Calendario</span>
                    </a>
                </li>

                <!-- Turnos (Dropdown) -->
                <li x-data="{ open: false }">
                    <button @click="open = !open; openDropdown = open ? 'Turnos' : ''"
                        :class="openDropdown === 'Turnos' ? 'bg-gray-50 text-gray-900 dark:bg-gray-700/50 dark:text-white' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex w-full items-center justify-between gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">Turnos</span>
                        </div>
                        <svg :class="open ? 'rotate-180' : ''" class="h-4 w-4 transition-transform duration-200"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="mt-1 space-y-1 pl-11">
                        <li>
                            <a href="#"
                                class="block rounded-lg px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-white">
                                Mis Turnos
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block rounded-lg px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-white">
                                Nuevo Turno
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Separator -->
                <li class="my-3 h-px bg-gray-200 dark:bg-gray-700"></li>
                <!-- Profesionales -->
                <li>
                    <a href="{{ route('admin.profesionales.index') }}" @click="selected = 'Profesionales'"
                        :class="selected === 'Profesionales' ?
                            'bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">
                        <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8ZM8 16C5.79086 16 4 17.7909 4 20V21C4 21.5523 3.55228 22 3 22C2.44772 22 2 21.5523 2 21V20C2 16.6863 4.68629 14 8 14H16C19.3137 14 22 16.6863 22 20V21C22 21.5523 21.5523 22 21 22C20.4477 22 20 21.5523 20 21V20C20 17.7909 18.2091 16 16 16H8Z" />
                        </svg>
                        <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">Profesionales</span>
                    </a>
                </li>
                <!-- Clientes -->
                <li>
                    <a href="#"
                        @click.prevent="selected = 'Clientes'; cargarLivewire('admin.cliente.cliente-table')"
                        :class="selected === 'Clientes'
                            ?
                            'bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">

                        <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8ZM8 16C5.79086 16 4 17.7909 4 20V21C4 21.5523 3.55228 22 3 22C2.44772 22 2 21.5523 2 21V20C2 16.6863 4.68629 14 8 14H16C19.3137 14 22 16.6863 22 20V21C22 21.5523 21.5523 22 21 22C20.4477 22 20 21.5523 20 21V20C20 17.7909 18.2091 16 16 16H8Z" />
                        </svg>
                        <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">Clientes</span>
                    </a>
                </li>



                <!-- Separator -->
                <li class="my-3 h-px bg-gray-200 dark:bg-gray-700"></li>

                <!-- Forms (Dropdown) -->
                <li x-data="{ open: false }">
                    <button @click="open = !open; openDropdown = open ? 'Forms' : ''"
                        :class="openDropdown === 'Forms' ? 'bg-gray-50 text-gray-900 dark:bg-gray-700/50 dark:text-white' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex w-full items-center justify-between gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">Formularios</span>
                        </div>
                        <svg :class="open ? 'rotate-180' : ''" class="h-4 w-4 transition-transform duration-200"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="mt-1 space-y-1 pl-11">
                        <li>
                            <a href="#"
                                class="block rounded-lg px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-white">
                                Elementos
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tables (Dropdown) -->
                <li x-data="{ open: false }">
                    <button @click="open = !open; openDropdown = open ? 'Tables' : ''"
                        :class="openDropdown === 'Tables' ? 'bg-gray-50 text-gray-900 dark:bg-gray-700/50 dark:text-white' :
                            'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                        class="flex w-full items-center justify-between gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors duration-150">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''">Tablas</span>
                        </div>
                        <svg :class="open ? 'rotate-180' : ''" class="h-4 w-4 transition-transform duration-200"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="mt-1 space-y-1 pl-11">
                        <li>
                            <a href="#"
                                class="block rounded-lg px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-white">
                                Tablas Básicas
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Promo Box -->  
        <div :class="sidebarToggle ? 'xl:hidden' : ''"
            class="mx-auto mb-10 mt-auto w-full max-w-60 rounded-xl border border-gray-200 bg-gradient-to-br from-blue-50 to-indigo-50 p-4 dark:border-gray-700 dark:from-blue-500/10 dark:to-indigo-500/10">
            <div class="text-center">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300">¿Necesitas ayuda?</p>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Contacta con soporte</p>
            </div>
        </div>
    </div>
</aside>
