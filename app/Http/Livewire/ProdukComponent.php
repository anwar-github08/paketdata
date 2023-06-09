<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\Produk;
use Livewire\Component;

class ProdukComponent extends Component
{
    public $produks;
    public $brands;
    public $produkBrands;
    public $brandSelect;

    public $kategoris;
    public $kategoriSelect;

    public $change = false;

    // untuk proses transaksi
    public $transaksi = false;
    public $nama_produk;
    public $kode_produk;
    public $harga;
    public $deskripsi;
    public $multi;

    public $metode_pembayaran = '';

    // untuk checkout
    public $checkout = false;


    // untuk menampilkan pembayaran
    public $pembayarans;
    public $pembayaran_bank;
    public $pembayaran_qris;

    public function mount()
    {

        $this->produks = Produk::all();

        // ambil kategori dan brandnya saja
        foreach ($this->produks as $produk) {
            $allKategoris[] = $produk->kategori;
        }
        // get kategori yang duplicate
        $this->kategoris = array_unique($allKategoris);
        // isi kategoriSelect dengan array pertama
        $this->kategoriSelect = array_values($this->kategoris)[0];
        // get produk sesuai category
        $produkKategoris = $this->produks->filter(fn ($item) => $item->kategori == $this->kategoriSelect);

        // ambil brandnya saja
        foreach ($produkKategoris as $produk) {
            $allBrands[] = $produk->brand;
        }
        // get brand yang duplicate
        $this->brands = array_unique($allBrands);
        // isi brandSelect dengan array pertama
        $this->brandSelect = array_values($this->brands)[0];
        // get produk sesuai brand
        $this->produkBrands = $produkKategoris->filter(fn ($item) => $item->brand == $this->brandSelect);
    }

    public function render()
    {
        $this->pembayarans = Pembayaran::all();
        $this->pembayaran_bank = Pembayaran::where('merchant', $this->metode_pembayaran)->first();
        $this->pembayaran_qris = Pembayaran::where('merchant', 'QRIS')->first();
        return view('livewire.produk-component');
    }

    public function changeKategori($kategori)
    {
        $this->kategoriSelect = $kategori;

        // get produk sesuai category
        $produkKategoris = $this->produks->filter(fn ($item) => $item->kategori == $this->kategoriSelect);

        // ambil brandnya saja
        foreach ($produkKategoris as $produk) {
            $allBrands[] = $produk['brand'];
        }

        // get brand yang duplicate
        $this->brands = array_unique($allBrands);
        // isi brandSelect dengan array pertama
        $this->brandSelect = array_values($this->brands)[0];
        // get produk sesuai brand
        $this->produkBrands = $produkKategoris->filter(fn ($item) => $item->brand == $this->brandSelect);
    }

    public function changeBrand($brand)
    {
        // get produk sesuai category
        $produkKategoris = $this->produks->filter(fn ($item) => $item['kategori'] == $this->kategoriSelect);

        $this->brandSelect = $brand;

        // get produk sesuai brand
        $this->produkBrands = $produkKategoris->filter(fn ($item) =>
        $item['brand'] == $brand);

        // change property change untuk mentrigger foreach produkbrands yang ada di komponen, jadi ketika changebrand diklik hasil dari produkbrand adalah array, sedangkan secara deault dia objek
        // $this->change = true;
    }

    public function proses($nama_produk, $kode_produk, $harga, $deskripsi, $multi)
    {

        $this->transaksi = true;
        $this->nama_produk = $nama_produk;
        $this->kode_produk = $kode_produk;
        $this->harga = $harga;
        $this->deskripsi = $deskripsi;
        $this->multi = $multi;
    }

    // batal transaksi
    public function batal()
    {
        $this->transaksi = false;
        $this->metode_pembayaran = '';
    }

    public function checkout()
    {
        $this->checkout = true;

        // untuk trigger js
        $this->dispatchBrowserEvent('triggerJs');
    }

    // ubah metode pembayaran
    public function ubah_metode_pembayaran()
    {
        $this->checkout = false;
        // $this->dispatchBrowserEvent('triggerJs');
    }
}
