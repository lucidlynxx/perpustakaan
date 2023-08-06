<?php

namespace App\Http\Livewire;

use App\Models\Rak;
use Livewire\Component;

class RakAlert extends Component
{
    public $rakId;

    public function render()
    {
        return view('livewire.rak-alert');
    }

    public function destroy($rakId)
    {
        Rak::find($rakId)->delete();

        return redirect('/dashboard/data-rak');
    }
}
