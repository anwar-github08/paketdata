<?php

namespace App\Http\Livewire\Admin\Pesanan;

use App\Models\BuktiPesanan;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApesananComponent extends Component
{
    use WithFileUploads;

    public $foto;
    public $reset;

    public function render()
    {
        return view('livewire.admin.pesanan.apesanan-component');
    }

    // live validation
    protected $rules = [
        'foto' => 'image',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeImage()
    {
        // validasi
        $this->validate([
            'foto' => 'required|image',

        ]);

        // buat nama foto
        $imgName = date('dmyhis') . '.' . $this->foto->extension();

        // simpan foto di direktori
        $this->foto->storeAs('bukti_pesanan', $imgName, 'public');

        BuktiPesanan::create([
            'image' => $imgName
        ]);

        $this->foto = null;
        // untuk reset form input file
        $this->reset = 1;
    }
}
