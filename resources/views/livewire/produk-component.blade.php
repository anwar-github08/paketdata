<div>
    {{-- ketika proses transaksi --}}
    @if ($transaksi)
        @if ($checkout)
            <div class="card card-checkout" id="card-checkout">
                <div class="card-header"><strong>Selesaikan Pembayaran</strong></div>
                <div class="card-body">

                    <div class="text-center mb-3">Mohon transfer sesuai data yang tertera</div>

                    <div class="col-lg-4 offset-lg-4 mb-4">
                        <table class="table table-primary table-bordered mb-4">
                            <tr>
                                <td>Produk</td>
                                <td>{{ $nama_produk }} ( {{ $kode_produk }} )</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>{{ number_format($harga) }}</td>
                            </tr>
                        </table>

                        {{-- image & info bank --}}
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 logo-bank">
                                <img src="img/{{ $metode_pembayaran }}.png" alt="metede_pembayaran" class="img-fluid"
                                    width="50">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                @if ($metode_pembayaran !== 'QRIS')
                                    <strong>{{ $pembayaran_bank->merchant }}</strong>
                                    <br>
                                    <strong>{{ $pembayaran_bank->atas_nama }}</strong>
                                @else
                                    <strong>{{ $pembayaran_qris->merchant }}</strong>
                                    <br>
                                    <strong>{{ $pembayaran_qris->atas_nama }}</strong>
                                @endif
                                <br>
                            </div>
                        </div>

                        {{-- alert copied --}}
                        <div class="alert alert-success fade show copied_rek" role="alert">
                            <strong>No Rekening </strong>berhasil disalin..!!
                        </div>
                        <div class="alert alert-success fade show copied_harga" role="alert">
                            <strong>Harga </strong>berhasil disalin..!!
                        </div>
                        {{-- no rek & jumlah tf --}}
                        <div class="mb-4">
                            @if ($metode_pembayaran !== 'QRIS')
                                <label>No Rekening</label>
                                <div class="mb-3 info-pembayaran">
                                    <div class="no_rek">
                                        <input type="text" value="{{ $pembayaran_bank->no_rek }}" id="input-rek"
                                            readonly>
                                    </div>
                                    <div class="salin">
                                        <button class="btn-salin-rek">Salin</button>
                                    </div>
                                </div>
                            @else
                                <div class="text-center">
                                    <label>Scan QR Code</label>
                                    <div class="mb-3 qrcode">
                                        <img src="/storage/image_pembayaran/{{ $pembayaran_qris->image_pembayaran }}"
                                            alt="QRIS" width="300" class="img-fluid img-thumbnail">
                                    </div>
                                </div>
                            @endif
                            <label>Jumlah Transfer</label>
                            <div class="info-pembayaran">
                                <div class="harga">
                                    <input type="text" value="{{ number_format($harga) }}" id="input-harga"
                                        readonly>
                                </div>
                                <div class="salin">
                                    <button class="btn-salin-harga">Salin</button>
                                </div>
                            </div>
                            {{-- <div class="copied_rek">Berhasil disalin</div>
                            <div class="copied_harga">Berhasil disalin</div> --}}
                        </div>

                        {{-- tombol --}}
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" wire:click='ubah_metode_pembayaran' class="btn"
                                    onclick="return confirm('Ubah metode pembayaran..?') || event.stopImmediatePropagation()">Ubah
                                    Metode
                                    Pembayaran</a>
                            </div>
                            <div>
                                <a href="#" wire:click='sudah_transfer' class="btn">Saya Sudah Transfer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
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
                        @foreach ($pembayarans as $pembayaran)
                            <option value="{{ $pembayaran->merchant }}">{{ $pembayaran->merchant }}</option>
                        @endforeach
                    </select>

                    <div wire:loading.remove>
                        <div class="d-flex align-items-center justify-content-evenly">
                            <div>
                                <button class="btn btn-me" wire:click="batal"
                                    onclick="return confirm('Batalkan..?') || event.stopImmediatePropagation()"><svg
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
                                            class="icon icon-tabler icon-tabler-check" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg> Lanjutkan</button>
                                @else
                                    <button class="btn btn-me" wire:click='checkout'
                                        onclick="return confirm('Lanjutkan..?') || event.stopImmediatePropagation()"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-check" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg> Lanjutkan</button>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        @endif
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


{{-- untuk salin --}}
@push('script')
    <script>
        document.addEventListener("triggerJs", () => {
            Livewire.hook("message.processed", () => {
                let salin_rek = document.querySelector(".btn-salin-rek");
                let salin_harga = document.querySelector(".btn-salin-harga");
                if (salin_rek !== null) {
                    salin_rek.addEventListener("click", function() {
                        let noRek = document.getElementById('input-rek');
                        noRek.select();
                        document.execCommand('copy');
                        salin_rek.classList.add('active');
                        window.getSelection().removeAllRanges();
                        document.querySelector('.copied_rek').style.display = 'block';
                        setTimeout(() => {
                            document.querySelector('.copied_rek').style.display = 'none';
                        }, 1000);
                    });
                }
                if (salin_harga !== null) {
                    salin_harga.addEventListener("click", function() {
                        let harga = document.getElementById('input-harga');
                        harga.select();
                        document.execCommand('copy');
                        salin_harga.classList.add('active');
                        window.getSelection().removeAllRanges();
                        document.querySelector('.copied_harga').style.display = 'block';
                        setTimeout(() => {
                            document.querySelector('.copied_harga').style.display = 'none';
                        }, 1000);
                    });
                }
            });
        });
    </script>
@endpush
