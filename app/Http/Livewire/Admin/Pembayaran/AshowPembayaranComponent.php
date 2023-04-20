<?php

namespace App\Http\Livewire\Admin\Pembayaran;

use App\Models\Pembayaran;
use Livewire\Component;

class AshowPembayaranComponent extends Component
{
    public $pembayarans;

    public function render()
    {
        $this->pembayarans = Pembayaran::all();
        return view('livewire.admin.pembayaran.ashow-pembayaran-component');
    }

    // menangkap emit dari pembayaranComponent
    protected $listeners = ['eTriggerPembayaranShow', 'refresh' => '$refresh'];

    public function eTriggerPembayaranShow()
    {
        session()->flash('sukses', 'Data Tersimpan');
    }

    public function deletePembayaran($id, $image)
    {
        unlink('storage/image_pembayaran/' . $image);
        Pembayaran::destroy($id);

        $this->dispatchBrowserEvent('triggerJs');
    }
}
