<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestEditAction extends Component
{
    public function doSomething()
    {
        dd('TestEditAction doSomething() dipanggil!');
    }

    public function render()
    {
        return view('livewire.test-edit-action');
    }
}
