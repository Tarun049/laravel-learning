<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $counter_message = "Hello form livewire";
    function changeText() {
        $this->counter_message = 'Hello from Action';
    }
    public function render()
    {
        // $id = 20;
        return view('livewire.counter');
    }
}
