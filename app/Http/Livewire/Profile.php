<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{

    public $hook_message = 'Hello this is from life cycle hook';
    public $count;
    function mount(){
        $this->hook_message = "Changed from mount";
    }

    // function hydrate() {
    //     $this->count++;
    // }

    function updated() {
        $this->count++;
    }

    function update_now( $new_mesage ){
        $this->hook_message = $new_mesage;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
