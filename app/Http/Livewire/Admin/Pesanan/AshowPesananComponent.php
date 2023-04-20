<?php

namespace App\Http\Livewire\Admin\Pesanan;

use App\Models\BuktiPesanan;
use Livewire\Component;

class AshowPesananComponent extends Component
{
    public $pesanans;

    public function render()
    {
        $this->pesanans = BuktiPesanan::all();
        return view('livewire.admin.pesanan.ashow-pesanan-component');
    }

    // menangkap emit dari pesananComponent
    protected $listeners = ['eTriggerPesananShow', 'refresh' => '$refresh'];

    public function eTriggerPesananShow()
    {
        session()->flash('sukses', 'Data Tersimpan');
    }

    public function deleteImage($id, $image)
    {
        unlink('storage/bukti_pesanan/' . $image);
        BuktiPesanan::destroy($id);

        $this->dispatchBrowserEvent('triggerJs');
    }
}
