<x-app-layout>
    @if (auth()->user()->hasRole('Admin'))
        <livewire:appointments-calendar
            {{-- week-starts-at="0, 1, 2, 3, 4, 5 or 6. 0 stands for Sunday"
            event-view="path/to/view/starting/from/views/folder"
            day-of-week-view="path/to/view/starting/from/views/folder" 
            before-calendar-view="path/to/view/starting/from/views/folder"
            after-calendar-view="path/to/view/starting/from/views/folder"
            drag-and-drop-classes="css classes" --}}
        /> 
    @else
        @livewire('client.calendar')
    @endif
</x-app-layout>