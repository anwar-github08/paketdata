<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuComponent extends Component
{
    public $produk = true;
    public $caraBertransaksi = false;
    public $pesananSukses = false;
    public $aboutMe = false;

    public function render()
    {
        return view('livewire.menu-component');
    }

    public function showProduk()
    {
        $this->produk = true;

        $this->caraBertransaksi = false;
        $this->pesananSukses = false;
        $this->aboutMe = false;
    }
    public function showCaraBertransaksi()
    {
        $this->caraBertransaksi = true;

        $this->produk = false;
        $this->pesananSukses = false;
        $this->aboutMe = false;
    }
    public function showPesananSukses()
    {
        $this->pesananSukses = true;

        $this->caraBertransaksi = false;
        $this->produk = false;
        $this->aboutMe = false;
    }
    public function showAboutMe()
    {
        $this->aboutMe = true;

        $this->pesananSukses = false;
        $this->caraBertransaksi = false;
        $this->produk = false;
    }
}
