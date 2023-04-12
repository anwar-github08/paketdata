<?php

namespace App\Http\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;

class AprodukShowComponent extends Component
{

    public $produks;

    public function render()
    {
        $this->produks = Produk::orderBy('brand', 'asc')->get();
        return view('livewire.admin.produk.aproduk-show-component');
    }

    // menangkap emit dari userCreate dan emit dari self
    protected $listeners = ['eTriggerUserShow', 'refresh' => '$refresh'];

    public function eTriggerUserShow()
    {
        session()->flash('sukses', 'Data Tersimpan');
    }

    public function deleteProduk($id)
    {
        Produk::destroy($id);

        $this->dispatchBrowserEvent('triggerJs');
    }
}
