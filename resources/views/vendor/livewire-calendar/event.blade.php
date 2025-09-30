<div
    @if($eventClickEnabled)
        wire:click.stop="onEventClick('{{ $event['id']  }}')"
    @endif
    class="flex flex-row bg-white rounded-lg border border-gray-700 dark:border-gray-100 py-1 px-1 shadow-md cursor-pointer overflow-hidden
        hover:shadow-lg hover:border hover:border-blue-700">

    <p class="text-md font-medium mr-1">
        11:00
    </p>
    <div class="overflow-hidden relative group w-48"> <!-- Ajusta el ancho según tu diseño -->
    <p class="text-md font-bold whitespace-nowrap transition-transform duration-500 group-hover:-translate-x-full">
        {{ $event->user()->first()->name ?? 'Sin título' }}
    </p>
</div>


    {{-- <p class="mt-2 text-xs">
        {{ $event['description'] ?? 'Sin descripción' }}
    </p> --}}
</div>
