<div>
    @if ($transaksi)
        <div class="card card-transaksi">
            <div class="card-header"><strong>Transaksi</strong></div>
            <div class="card-body">
                <table class="table table-primary table-striped table-bordered">
                    <tr>
                        <td><strong>Nama Produk</strong></td>
                        <td>{{ $nama_produk }} ( {{ $kode_produk }} )</td>
                    </tr>
                    <tr>
                        <td><strong>Harga</strong></td>
                        <td>{{ number_format($harga) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td>{{ $deskripsi }}</td>
                    </tr>
                    <tr>
                        <td><strong>Multi</strong></td>
                        <td>
                            @if ($multi == true)
                                <img src="/img/multi.png" alt="multi_on">
                            @else
                                <img src="/img/nomulti.png" alt="multi_off">
                            @endif
                        </td>
                    </tr>
                </table>

                {{-- form select metode pembayaran --}}
                <select wire:model='metode_pembayaran' class="form-control mb-3">
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="BRI">BRI</option>
                    <option value="QRIS">QRIS</option>
                </select>

                <div class="d-flex align-items-center justify-content-evenly">
                    <div>
                        <button class="btn btn-me" wire:click="batal"
                            onclick="return confirm('batalkan..?') || event.stopImmediatePropagation()"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg> Batal</button>
                    </div>
                    <div>
                        @if ($metode_pembayaran == '')
                            <button class="btn btn-me" wire:click='checkout'
                                onclick="return confirm('Lanjutkan..?') || event.stopImmediatePropagation()"
                                disabled><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-check" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg> Lanjutkan</button>
                        @else
                            <button class="btn btn-me" wire:click='checkout'
                                onclick="return confirm('Lanjutkan..?') || event.stopImmediatePropagation()"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg> Lanjutkan</button>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    @else
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
                    <i class="mb-2">* Klik nama produk untuk melihat deskripsi</i>
                    <table class="table table-bordered table-striped table-primary">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Multi</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($produkBrands as $produk)
                            <tr>
                                <td data-bs-toggle="collapse" data-bs-target="#collapse{{ $produk->id }}"
                                    style="cursor: pointer">
                                    {{ $produk->nama_produk }}
                                </td>
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
                                        wire:click="proses('{{ $produk->nama_produk }}','{{ $produk->kode_produk }}','{{ $produk->harga }}','{{ $produk->deskripsi }}','{{ $produk->multi }}')">Proses</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" id="collapse{{ $produk->id }}"
                                    class="accordion-collapse collapse">
                                    {{ $produk->deskripsi }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    @endif

</div>
