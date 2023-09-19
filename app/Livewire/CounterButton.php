<?php

namespace App\Livewire;

use Livewire\Component;

class CounterButton extends Component
{

    public $name = "John Doe";

    public $count = 0;

    public function decriment(){
        $this->count--;
    }

    public function increment(){
        $this->count++;
    }

    public function clickMe(){
        dd($this->name);
    }

    public function render()
    {
        return view('livewire.counter-button');
    }
}
