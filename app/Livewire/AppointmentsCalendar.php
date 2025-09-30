<?php

namespace App\Livewire;

use Omnia\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Models\Event;
use App\Events\CalendarUpdated;

class AppointmentsCalendar extends LivewireCalendar
{
    protected $listeners = [
        'calendar' => 'eventsUpdated',
    ];

    public $eventos;
    public $filter_month;

    // 👇 Estado de la vista (mes, semana o día)
    public string $viewMode = 'month';

    public function afterMount($extras = [])
    {
        $this->filter_month = Carbon::now()->toDateTimeString();
    }

    public function eventsUpdated($eventData)
    {
        // implementar lógica, dd() solo para debug
        // dd($eventData, "Hola ");
    }

    public function events(): Collection
    {
        $this->eventos = Event::where("user_id", auth()->id())->get();
        return $this->eventos;
    }

    public function onEventDropped($eventId, $year, $month, $day)
    {
        $newDate = Carbon::create($year, $month, $day)->addDay()->subMicro();
        if ($newDate->isPast()) {
            return;
        }

        foreach ($this->eventos as $i => $evento) {
            if ($evento->id == $eventId) {
                $evento->date = $newDate;
                $evento->save();
                $this->eventos[$i] = $evento;
            }
        }
    }

    // 👇 Método para cambiar la vista
    public function setView(string $mode)
    {
        $this->viewMode = $mode;
    }
}
