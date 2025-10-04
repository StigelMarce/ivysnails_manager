<?php

namespace App\Livewire;

use Livewire\Component;

class LayoutController extends Component
{
    public $selectedComponent = 'admin.dashboard'; 
    protected $listeners = ['loadComponent' => 'setComponent'];

    public function setComponent($component)
    {   
        $this->selectedComponent = (string) $component;
    }

    public function rendered()
    {
        $this->dispatch('wireloaderHide');
    }

    public function render()
    {        
        return view('livewire.layout-controller');
    }
}