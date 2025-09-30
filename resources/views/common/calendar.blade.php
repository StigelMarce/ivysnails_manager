<x-app-layout>
    @if (auth()->user()->hasRole('admin'))
        @livewire('admin.calendar')
    @else 
        @livewire('client.calendar')
    @endif
</x-app-layout>