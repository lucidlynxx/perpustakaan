<?php

namespace App\Http\Livewire;

use App\Models\Buku;
use Livewire\Component;

class BukuAlert extends Component
{
    public $bukuId;

    public function render()
    {
        return view('livewire.buku-alert');
    }

    public function destroy($bukuId)
    {
        Buku::find($bukuId)->delete();

        return redirect('/dashboard/data-buku');
    }
}
