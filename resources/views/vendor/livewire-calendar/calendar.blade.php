<div
    @if ($pollMillis !== null && $pollAction !== null) wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms @endif>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="flex select-none">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">

                <div
                    class="p-2 flex-1 h-16 -mt-px -ml-px flex bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white">
                    <div class="flex flex-row w-full items-center">
                        <div class="flex w-1/3 justify-start">
                            <div class="flex flex-row">
                                <button
                                    class="p-3 border border-right rounded-l-full text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800">
                                    <x-heroicons::solid.chevron-left />
                                </button>
                                <x-datetime-picker wire:model.live="filter_month" clearable="true" without-time="true"
                                    placeholder={{ $filter_month }} shadowless="true"
                                    x-bind:class="`h-full shadow-none rounded-none text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800`" />
                                {{-- class="rounded-none border w-40 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800"/> --}}
                                <button
                                    class="p-3 border border-left rounded-r-full text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800">
                                    <x-heroicons::solid.chevron-right />
                                </button>
                            </div>
                        </div>
                        <div class="flex w-1/3 justify-center">
                            <span class="mx-2 justify-center font-bold text-lg text-gray-700 dark:text-gray-300">
                                {{ \Carbon\Carbon::parse($filter_month)->format('F Y') }}
                            </span>
                        </div>
                        <div class="flex w-1/3 justify-end">
                            <div class="inline-flex rounded-md shadow-xs" role="group">
                                <button type="button" 
                                    class="rounded-l-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Mes
                                </button>
                                <button type="button" 
                                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Semana
                                </button>
                                <button type="button" 
                                    class="rounded-r-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Dia
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-row">
                    @foreach ($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach ($monthGrid as $week)
                    <div class="w-full flex flex-row">
                        @foreach ($week as $day)
                            @include($dayView, [
                                'componentId' => $componentId,
                                'day' => $day,
                                'dayInMonth' => $day->isSameMonth($startsAt),
                                'isToday' => $day->isToday(),
                                'events' => $getEventsForDay($day, $events),
                            ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
