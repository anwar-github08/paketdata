<?php

namespace App\Http\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;

class AprodukComponent extends Component
{
    public $nama_produk = '';
    public $kode_produk = '';
    public $kategori = '';
    public $brand = '';
    public $harga = '';
    public $deskripsi = '';
    public $multi = false;

    public function render()
    {
        return view('livewire.admin.produk.aproduk-component');
    }

    // live validation
    protected $rules = [
        'harga' => 'numeric',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeProduk()
    {

        $this->validate([
            'harga' => 'numeric'
        ]);

        Produk::create([
            'nama_produk' => ucwords($this->nama_produk),
            'kode_produk' => strtolower($this->kode_produk),
            'kategori' => $this->kategori,
            'brand' => $this->brand,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'multi' => $this->multi
        ]);

        // buat emit untuk trigger produk-show
        $this->emit('eTriggerProdukShow');
        $this->dispatchBrowserEvent('triggerJs');

        $this->nama_produk = '';
        $this->kode_produk = '';
        $this->kategori = '';
        $this->brand = '';
        $this->harga = '';
        $this->deskripsi = '';
        $this->multi = false;
    }
}
