<div>
    <a href="#" wire:click='produk' class="btn {{ $produk ? 'btn-light' : 'btn-dark' }}">Produk</a>
    <a href="#" wire:click='pesanan' class="btn {{ $pesanan ? 'btn-light' : 'btn-dark' }}">Pesanan</a>
    <a href="#" wire:click='pembayaran' class="btn {{ $pembayaran ? 'btn-light' : 'btn-dark' }}">Pembayaran</a>
    <div class="mb-4"></div>

    @if ($produk)
        @if ($updateProduk)
            @livewire('admin.produk.aproduk-update-component', ['idProduk' => $idProduk, ''], key(time()))
        @else
            @livewire('admin.produk.aproduk-component')
        @endif
        @livewire('admin.produk.aproduk-show-component')
    @elseif($pesanan)
        @livewire('admin.pesanan.apesanan-component')
        @livewire('admin.pesanan.ashow-pesanan-component')
    @elseif($pembayaran)
        @livewire('admin.pembayaran.apembayaran-component')
        @livewire('admin.pembayaran.ashow-pembayaran-component')
    @endif
    {{-- 
    @livewire('admin.produk.aproduk-component')
    @livewire('admin.produk.aproduk-show-component') --}}
</div>

@push('style-source')
    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@push('script-source')
    {{-- datatable --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">
    </script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

        document.addEventListener("triggerJs", () => {
            Livewire.hook('message.processed', () => {
                $('.table').DataTable();
            })
        })
    </script>
@endpush
