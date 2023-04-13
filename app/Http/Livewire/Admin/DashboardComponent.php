<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DashboardComponent extends Component
{

    public $produk = false;
    public $pesanan = false;
    public $pembayaran = false;


    public function render()
    {
        return view('livewire.admin.dashboard-component');
    }

    public function produk()
    {

        $this->produk = !$this->produk;
        $this->pesanan = false;
        $this->pembayaran = false;

        $this->dispatchBrowserEvent('triggerJs');
    }

    public function pesanan()
    {
        $this->produk = false;
        $this->pesanan = !$this->pesanan;;
        $this->pembayaran = false;

        $this->dispatchBrowserEvent('triggerJs');
    }

    public function pembayaran()
    {
        $this->produk = false;
        $this->pesanan = false;
        $this->pembayaran = !$this->pembayaran;

        $this->dispatchBrowserEvent('triggerJs');
    }
}
