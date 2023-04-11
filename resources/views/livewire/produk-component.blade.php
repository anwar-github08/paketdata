<div>
    <div class="card card-produk">
        <div class="card-header"><strong>Produk Murah & Valid 100%</strong></div>
        <div class="card-body">
            <div class="item mb-3">
                @foreach ($kategoris as $kategori)
                    @if ($kategoriSelect === $kategori)
                        <a href="#" wire:click="changeKategori('{{ $kategori }}')"
                            class="nav-link active">{{ $kategori }}</a>
                    @else
                        <a href="#" wire:click="changeKategori('{{ $kategori }}')"
                            class="nav-link">{{ $kategori }}</a>
                    @endif
                @endforeach
            </div>

            <table class="table table-bordered table-striped table-info mt-2">
                <tr>
                    @foreach ($brands as $brand)
                        @if ($brandSelect === $brand)
                            <td>
                                <a href="#" wire:click="changeBrand('{{ $brand }}')"
                                    class="nav-link text-primary"><strong><i>{{ $brand }}</i></strong></a>
                            </td>
                        @else
                            <td>
                                <a href="#" wire:click="changeBrand('{{ $brand }}')"
                                    class="nav-link">{{ $brand }}</a>
                            </td>
                        @endif
                    @endforeach
                </tr>
            </table>
            <hr>

            {{-- loading --}}
            <div class="d-flex justify-content-center loading">
                <div wire:loading>
                    <img src="/img/loading1.png">
                </div>
            </div>

            <div wire:loading.remove class="item">
                <table class="table table-bordered table-striped table-primary">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Multi</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($produkBrands as $produk)
                        <tr>
                            <td>{{ $produk->nama_produk }}</td>
                            <td><strong>{{ number_format($produk->harga) }}</strong></td>
                            <td>
                                @if ($produk->multi)
                                    <img src="/img/multi.png" alt="multi_on">
                                @else
                                    <img src="/img/nomulti.png" alt="multi_off">
                                @endif
                            </td>
                            <td>
                                <a href="#"
                                    wire:click="$emit('eTransaksi','{{ $produk->nama_produk }}','{{ $produk->category }}','{{ $produk->price }}','{{ $produk->buyer_sku_code }}','{{ $produk->multi }}','{{ $produk->start_cut_off }}','{{ $produk->end_cut_off }}','{{ $produk->seller_product_status }}','{{ $produk->brand }}','{{ $produk->desc }}')">Proses</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>
