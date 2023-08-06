<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use Livewire\Component;

class SiswaAlert extends Component
{
    public $siswaId;

    public function render()
    {
        return view('livewire.siswa-alert');
    }

    public function destroy($siswaId)
    {
        Siswa::find($siswaId)->delete();

        return redirect('/dashboard/data-siswa');
    }
}
