<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Alerts extends Component
{
    protected $listeners = ['messages'];


    public function messages($type, $message)
    {
        session()->flash($type, $message);
    }

    public function render()
    {
        return view('livewire.admin.alerts');
    }
}
