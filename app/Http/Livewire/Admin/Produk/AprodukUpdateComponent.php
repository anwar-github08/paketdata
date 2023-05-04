<?php

namespace App\Http\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;

class AprodukUpdateComponent extends Component
{
    public $produk;

    public $id_produk;
    public $nama_produk;
    public $kode_produk;
    public $kategori;
    public $brand;
    public $harga;
    public $deskripsi;
    public $multi;

    public function mount($idProduk)
    {

        $this->produk = Produk::where('id', $idProduk)->first();

        $this->id_produk = $idProduk;
        $this->nama_produk = $this->produk->nama_produk;
        $this->kode_produk = $this->produk->kode_produk;
        $this->kategori = $this->produk->kategori;
        $this->brand = $this->produk->brand;
        $this->harga = $this->produk->harga;
        $this->deskripsi = $this->produk->deskripsi;
        $this->multi = $this->produk->multi;

        $this->dispatchBrowserEvent('triggerJs');
    }

    public function render()
    {
        return view('livewire.admin.produk.aproduk-update-component');
    }

    // live validation
    protected $rules = [
        'harga' => 'numeric',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function updateProduk()
    {

        $this->validate([
            'harga' => 'numeric'
        ]);

        Produk::where('id', $this->id_produk)->update(['nama_produk' => $this->nama_produk, 'kategori' => $this->kategori, 'brand' => $this->brand, 'kode_produk' => $this->kode_produk, 'harga' => $this->harga, 'multi' => $this->multi, 'deskripsi' => $this->deskripsi]);

        // buat emit untuk trigger produk-show
        $this->emit('eTriggerProdukShow');
        $this->emit('eBatalUpdate');
        $this->dispatchBrowserEvent('triggerJs');
    }
}
