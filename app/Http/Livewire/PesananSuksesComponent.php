<?php

namespace App\Http\Livewire;

use App\Models\BuktiPesanan;
use Livewire\Component;

class PesananSuksesComponent extends Component
{
    public $pesanans;

    public function render()
    {
        $this->pesanans = BuktiPesanan::all();
        return view('livewire.pesanan-sukses-component');
    }
}
