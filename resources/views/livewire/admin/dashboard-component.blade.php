<div>
    <a href="#" wire:click='produk' class="btn {{ $produk ? 'btn-secondary' : 'btn-dark' }}">Produk</a>
    <a href="#" wire:click='pesanan' class="btn {{ $pesanan ? 'btn-secondary' : 'btn-dark' }}">Pesanan</a>
    <a href="#" wire:click='pembayaran' class="btn {{ $pembayaran ? 'btn-secondary' : 'btn-dark' }}">Pembayaran</a>
    <div class="mb-4"></div>

    @if ($produk)
        @livewire('admin.produk.aproduk-component')
        @livewire('admin.produk.aproduk-show-component')
    @elseif($pesanan)
        @livewire('admin.pesanan.apesanan-component')
    @elseif($pembayaran)
        @livewire('admin.pembayaran.apembayaran-component')
    @endif
</div>
