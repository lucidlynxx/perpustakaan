<?php

namespace App\Http\Livewire;

use App\Models\Peminjaman;
use Livewire\Component;

class PeminjamanAlert extends Component
{
    public $peminjamanId;

    public function render()
    {
        return view('livewire.peminjaman-alert');
    }

    public function destroy($peminjamanId)
    {
        Peminjaman::find($peminjamanId)->delete();

        return redirect('/dashboard/data-peminjaman');
    }
}
