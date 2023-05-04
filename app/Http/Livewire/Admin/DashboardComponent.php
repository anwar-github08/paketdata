<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DashboardComponent extends Component
{

    public $produk = false;
    public $pesanan = false;
    public $pembayaran = false;

    public $updateProduk = false;
    public $idProduk;


    public function render()
    {
        return view('livewire.admin.dashboard-component');
    }

    protected $listeners = ['eUpdateProduk', 'eBatalUpdate'];

    // menangkap emit dari ubahproduk di showprodukcomponent
    public function eUpdateProduk($post)
    {
        $this->idProduk = $post;
        $this->updateProduk = true;
    }
    // emit batal dari updateProduk,
    public function eBatalUpdate()
    {
        $this->updateProduk = false;
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
