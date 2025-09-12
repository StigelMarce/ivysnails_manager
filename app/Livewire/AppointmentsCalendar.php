<?php

namespace App\Livewire;

use Omnia\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Livewire\Attributes\On; 

class AppointmentsCalendar extends LivewireCalendar
{
    public $eventos;
    public $filter_month;

    public function afterMount($extras=[]){
        $this->filter_month = Carbon::now()->toDateTimeString();
        $this->eventos = collect([
            [
                'id' => 1,
                'title' => 'Breakfast',
                'description' => 'Pancakes! 🥞',
                'date' => Carbon::today(),
            ],
            [
                'id' => 99,
                'title' => 'Breakfast x2',
                'description' => 'Pancakes! 🥞',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],
            [
                'id' => 3,
                'title' => 'Dentist Appointment',
                'description' => 'Cleaning and checkup',
                'date' => Carbon::today()->addDays(3),
            ],
            [
                'id' => 4,
                'title' => 'Gym Session',
                'description' => 'Leg day 🏋️',
                'date' => Carbon::today()->addDays(5),
            ],
            [
                'id' => 5,
                'title' => 'Weekend Trip',
                'description' => 'Travel with friends',
                'date' => Carbon::today()->addDays(7),
            ],
        ]);
    }

    #[On('events_update')] 
    public function events(): Collection
    {   
        // Logica para obtener eventos de la base de datos
        return $this->eventos;
    }

    public function onEventDropped($eventId, $year, $month, $day)
    { 
        $newDate = Carbon::create($year, $month, $day)->addDay()->subMicro();
        if ($newDate->isPast()) {
            return;
        }
        
        for ($i = 0; $i < $this->eventos->count(); $i++) {
            $evento = $this->eventos[ $i ];
            if ($evento['id'] == $eventId){
                $evento['date'] = $newDate;
                // $evento->save(); aca se guarda en la BD
                $this->eventos[ $i ] = $evento;
            }
        } 

        // $this->dispatch('events_update');
    }

    

}
