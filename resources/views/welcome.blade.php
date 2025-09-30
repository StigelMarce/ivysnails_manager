<x-guest-layout>
    <x-slot name="header">
        @if (Route::has('login'))
            <nav class="bg-[#a273bd] flex items-center justify-between px-6 py-4 shadow-sm border-b border-[#EDE9FE]">
                <div class="flex items-center space-x-8">
                    <a href="#" class="text-white hover:text-[#EDE9FE] text-base font-semibold transition">Home</a>
                    <a href="#" class="text-[#F5F3FF] hover:text-white text-base font-semibold transition">About us</a>
                    <a href="#" class="text-[#F5F3FF] hover:text-white text-base font-semibold transition">Blog</a>
                </div>
                <div class="flex items-center gap-3">
                    <button class="text-white hover:text-[#EDE9FE] p-2 rounded-full transition">
                        <!-- icon -->
                    </button>
                    <button class="text-white hover:text-[#EDE9FE] p-2 rounded-full transition">
                        <!-- icon -->
                    </button>
                    <select class="border-none bg-transparent text-white text-base font-semibold focus:outline-none">
                        <option class="text-[#a273bd]">En</option>
                        <option class="text-[#a273bd]">Es</option>
                    </select>
                    <button class="text-white hover:text-[#EDE9FE] lg:hidden p-2 rounded-full transition">
                        <!-- icon -->
                    </button>
                </div>
            </nav>
        @endif
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-[#F5F3FF] via-[#EDE9FE] to-white flex flex-col items-center justify-center px-4 py-12">
        <div class="w-full max-w-4xl mx-auto flex flex-col lg:flex-row items-center justify-between relative rounded-3xl shadow-xl bg-white/80 backdrop-blur-lg p-8 lg:p-16">
            <div class="flex-1 z-10">
                <h1 class="text-5xl lg:text-6xl font-bold mb-6 text-[#580e82] font-sofia font-effect-shadow-multiple">IvysNails - Manager</h1>
                <ul class="space-y-4 mb-10 text-lg text-gray-700">
                    <li class="flex items-center">
                        <span class="text-[#7C3AED] text-xl mr-3">•</span>
                        <span>Gestión simple y rápida de turnos</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-[#7C3AED] text-xl mr-3">•</span>
                        <span>Control de clientes y servicios</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-[#7C3AED] text-xl mr-3">•</span>
                        <span>Organizá tu agenda fácilmente</span>
                    </li>
                </ul>
                <div class="flex gap-4">
                    <a
                        href="{{ route('login') }}"
                        class="px-8 py-3 bg-[#580e82] text-white rounded-full text-lg font-semibold hover:bg-[#A78BFA] transition"
                    >
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="px-8 py-3 border border-[#580e82] text-[#580e82] rounded-full text-lg font-semibold hover:bg-[#EDE9FE] transition"
                        >
                            {{ __('Register') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="flex-1 mt-10 lg:mt-0 lg:ml-12 flex items-center justify-center z-10">
                <img src="https://images.unsplash.com/photo-1632345031435-8727f6897d53?auto=format&fit=crop&w=400&q=80" alt="Nails Illustration" class="rounded-2xl shadow-lg w-72 h-72 object-cover bg-[#EDE9FE]">
            </div>
            <div class="absolute -top-16 -left-16 w-56 h-56 bg-[#C4B5FD] rounded-full opacity-30 blur-2xl"></div>
            <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#A78BFA] rounded-full opacity-30 blur-2xl"></div>
        </div>

        <div class="mt-12 flex space-x-3">
            <span class="w-3 h-3 bg-[#7C3AED] rounded-full"></span>
            <span class="w-3 h-3 bg-[#C4B5FD] rounded-full"></span>
            <span class="w-3 h-3 bg-[#EDE9FE] rounded-full"></span>
        </div>

        <footer class="mt-10 w-full max-w-4xl mx-auto flex flex-col lg:flex-row justify-between items-center bg-white/80 rounded-xl shadow p-6 text-[#7C3AED] text-sm">
            <div class="mb-4 lg:mb-0 text-center lg:text-left">
                Gestión profesional para tu salón de uñas.
            </div>
            <div class="mb-4 lg:mb-0 text-center lg:text-left">
                Simple, rápido y seguro.
            </div>
            <div class="text-center lg:text-left">
                © {{ date('Y') }} IvysNails
            </div>
        </footer>
    </div>
</x-guest-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@400;600;700&display=swap');
    .font-sofia {
        font-family: 'Sofia Sans', sans-serif;
    }
    .font-effect-shadow-multiple {
        text-shadow: 2px 2px #C4B5FD, 4px 4px #A78BFA, 6px 6px #EDE9FE;
    }
</style>
