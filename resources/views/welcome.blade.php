<x-guest-layout>
    <x-slot name="header">
        @if (Route::has('login'))
            <nav class="bg-purple-300 flex items-center px-6 pt-6 lg:px-8 lg:pt-8 justify-end gap-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 border border-purple-800 text-purple-800 rounded-sm text-sm leading-normal hover:bg-purple-100"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 text-purple-800 border border-purple-800 rounded-full text-sm leading-normal hover:border-purple-800"
                    >
                        {{ __('Login') }}
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 border border-purple-800 text-purple-800 rounded-full text-sm leading-normal hover:bg-purple-100">
                            {{ __('Register') }}
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </x-slot>

    <div class="bg-purple-100 text-purple-900 flex flex-col items-center justify-center min-h-screen p-6 lg:p-12">
        <div class="max-w-4xl mx-auto flex flex-col lg:flex-row items-center justify-between w-full">
            <div class="flex-1 p-6 lg:p-12">
                <h1 class="text-6xl font-sofia font-effect-shadow-multiple mb-4">IvysNails</h1>
                <h2 class="text-3xl font-sofia font-semibold mb-6">Nail Service</h2>
                <p class="mb-4 text-xl text-justify">
                    En IvysNails, transformamos tus uñas en una obra de arte. Ofrecemos servicios de manicura, pedicura, y diseños personalizados con la mejor calidad.
                </p>
                <p class="mb-6 text-xl">
                    Nuestros expertos están listos para brindarte una experiencia de lujo y cuidado.
                    ¡Agenda tu cita hoy mismo! 💅✨
                </p>
                <div class="flex gap-4">
                    <a href="#" class="px-6 py-3 bg-purple-700 text-white rounded-full text-lg font-semibold hover:bg-purple-800 transition-colors">
                        Saber más
                    </a>
                    <a href="{{ route('login') }}" class="px-6 py-3 border-2 border-purple-700 text-purple-700 rounded-full text-lg font-semibold hover:bg-purple-100 transition-colors">
                        Iniciar Sesión
                    </a>
                </div>
            </div>

            <div class="flex-1 mt-10 lg:mt-0 lg:ml-12">
                <div class="relative w-full aspect-w-16 aspect-h-9 max-w-lg mx-auto">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>