<div>
    <div class="card card-menu mb-4">
        <div class="card-header"><strong>Menu</strong></div>
        <div class="card-body">
            <div>
                <a href="#" wire:click='showProduk' class="{{ $produk ? 'active' : '' }}">
                    <img src="/img/produk.png" alt="" width="30">
                    <br>
                    <span>Produk</span>
                </a>
            </div>
            <div>
                <a href="#" wire:click='showCaraBertransaksi' class="{{ $caraBertransaksi ? 'active' : '' }}">
                    <img src="/img/transaksi.png" alt="" width="30">
                    <br>
                    <span>Cara Bertransaksi</span>
                </a>
            </div>
            <div>
                <a href="#" wire:click='showPesananSukses' class="{{ $pesananSukses ? 'active' : '' }}">
                    <img src="/img/transaksi-sukses.png" alt="" width="30">
                    <br>
                    <span>Pesanan Sukses</span>
                </a>
            </div>
            <div>
                <a href="#" wire:click='showAboutMe' class="{{ $aboutMe ? 'active' : '' }}">
                    <img src="/img/boy.png" alt="" width="30">
                    <br>
                    <span>About Me</span>
                </a>
            </div>
        </div>
    </div>

    {{-- loading --}}
    <div class="d-flex justify-content-center mt-4 loading">
        <div wire:loading>
            <img src="/img/loading1.png">
        </div>
    </div>

    <div wire:loading.remove>
        @if ($produk)
            @livewire('produk-component')
        @elseif ($caraBertransaksi)
            @livewire('cara-bertransaksi-component')
        @elseif($pesananSukses)
            @livewire('pesanan-sukses-component')
        @elseif($aboutMe)
            @livewire('about-me-component')
        @endif
    </div>
</div>
