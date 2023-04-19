<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use Livewire\Component;

class CaraBertransaksiComponent extends Component
{
    public $pembayaran_bank;
    public $pembayaran_qris;

    public function render()
    {
        $this->pembayaran_bank = Pembayaran::where('merchant', 'BANK BRI')->first();
        $this->pembayaran_qris = Pembayaran::where('merchant', 'QRIS')->first();

        return view('livewire.cara-bertransaksi-component');
    }
}
