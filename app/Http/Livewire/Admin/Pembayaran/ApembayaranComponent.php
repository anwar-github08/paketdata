<?php

namespace App\Http\Livewire\Admin\Pembayaran;

use App\Models\Pembayaran;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApembayaranComponent extends Component
{
    use WithFileUploads;

    public $merchant = '';
    public $atas_nama = '';
    public $no_rek = '';
    public $image_pembayaran;
    public $reset;

    public function render()
    {
        return view('livewire.admin.pembayaran.apembayaran-component');
    }

    // live validation
    protected $rules = [
        'no_rek' => 'numeric',
        'image_pembayaran' => 'image'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storePembayaran()
    {

        // validasi
        $this->validate([
            'no_rek' => 'numeric',
            'image_pembayaran' => 'image'
        ]);

        // buat nama foto
        $imgName = date('dmyhis') . '.' . $this->image_pembayaran->extension();

        // simpan image_pembayaran di direktori
        $this->image_pembayaran->storeAs('image_pembayaran', $imgName, 'public');


        Pembayaran::create([

            'merchant' => $this->merchant,
            'atas_nama' => strtoupper($this->atas_nama),
            'no_rek' => $this->no_rek,
            'image_pembayaran' => $imgName
        ]);

        // buat emit untuk trigger pemabyaran-show
        $this->emit('eTriggerPembayaranShow');
        $this->dispatchBrowserEvent('triggerJs');

        $this->merchant = '';
        $this->atas_nama = '';
        $this->no_rek = '';
        $this->image_pembayaran = null;
        $this->reset = 1;
    }
}
