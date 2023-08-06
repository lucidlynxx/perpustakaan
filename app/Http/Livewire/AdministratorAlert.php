<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdministratorAlert extends Component
{
    public $administratorId;

    public function render()
    {
        return view('livewire.administrator-alert');
    }

    public function destroy($administratorId)
    {
        User::find($administratorId)->delete();

        return redirect('/dashboard/data-administrator');
    }
}
