<div>
    <div class="card card-cara-bertransaksi">
        <div class="card-header"><strong>Admin Tenang Jika Pesanan Yang Diinginkan Pembeli Sudah
                Terkirim & Semua Pertanyaan Pembeli Sudah Terjawab. Cek Cara Bertransaksi:</strong></div>
        <div class="card-body">
            <ul>
                <li>Pilih produk, kemudian klik <strong>Proses</strong></li>
                <li>Pilih salah satu dari metode pembayaran yang tersedia</li>
                <li>Untuk saat ini kami hanya menyediakan metode pembayaran, yaitu :</li>
                <ul class="second">
                    <li><a href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapse_bri">{{ $pembayaran_bank->merchant }}</a></li>
                    <div id="collapse_bri" class="accordion-collapse collapse mb-2 mt-2 col-md-4">
                        <table class="table table-primary table-striped table-bordered">
                            <tr>
                                <td><strong>Nama Bank</strong></td>
                                <td><strong>{{ $pembayaran_bank->merchant }}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>A.N</strong></td>
                                <td><strong>{{ $pembayaran_bank->atas_nama }}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>No Rek</strong></td>
                                <td><strong>{{ $pembayaran_bank->no_rek }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    {{-- <li><a href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapse_qris">{{ $pembayaran_qris->merchant }}</a></li>
                    <div id="collapse_qris" class="accordion-collapse collapse mb-2 mt-2">
                        <img src="/storage/image_pembayaran/{{ $pembayaran_qris->image_pembayaran }}" alt="QRIS"
                            class="img-fluid img-thumbnail" width="200">
                    </div> --}}
                </ul>
                <br>
                <li>Setelah pilih metode pembayaran, klik <strong>Lanjutkan</strong></li>
                <li>Selesaikan pembayaran sesuai data yang tertera</li>
                <li>Kirim bukti pembayaran kepada admin <i>( via <a href="https://wa.me/6281330406408"
                            onclick="return confirm('Hubungi admin via whatsapp..?')" target="blank">Whatsapp</a> atau
                        <a href="https://t.me/playmakeranwar08"
                            onclick="return confirm('Hubungi admin via telegram..?')" target="blank">Telegram</a> ),
                    </i>
                    sertakan
                    juga <strong>Nama
                        Produk</strong> dan
                    <strong>No Telp</strong> yang ingin diisi
                </li>
                <li><strong>No Telp</strong> harap ditulis terpisah agar admin mudah dalam memproses</li>
                <li>Admin akan memverifikasi transfer dan memproses pesanan saat itu juga <i>( jika ada antrian,
                        admin akan menginformasikan )</i>
                </li>
                <li>Pastikan <strong>No Telp</strong> sedang aktif, ada sinyal, dan tidak dalam masa tenggang</li>
                <li>Jika transaksi berhasil dan sukses, Bukti pesanan akan langsung dikirim ke pembeli, contoh bukti
                    pesanan sukses
                    bisa dilihat pada menu <strong>Pesanan Sukses</strong> </li>
                <li>Jika transaksi <strong>Pending</strong> atau <strong>Gagal</strong>, admin akan langsung menghubungi
                    pembeli</li>
                <li>Admin akan selalu berkomunikasi dengan pembeli sampai pesanan sukses & aman</li>
                <li>Batas komplain max 24jam setelah pesanan sukses</li>
                <li>Jika ada pertanyaan, hubungi kami <i>( via <a href="https://wa.me/6281330406408"
                            onclick="return confirm('Hubungi admin via whatsapp..?')" target="blank">Whatsapp</a> atau
                        <a href="https://t.me/playmakeranwar08"
                            onclick="return confirm('Hubungi admin via telegram..?')" target="blank">Telegram</a> )</i>
                </li>
                <li>Pesanan Anda Prioritas Kami</li>
            </ul>

            <strong><i>Terima kasih </i>🙏</strong>
        </div>
    </div>
</div>
