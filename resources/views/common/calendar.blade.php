<x-app-layout>
    @if (auth()->user()->hasRole('admin'))
        {{-- @livewire('admin.calendar') --}}
        @livewire('appointments-calendar') 
    @else 
        @livewire('client.calendar')
    @endif
</x-app-layout>