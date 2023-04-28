@extends('layouts.main')
@section('konten')
    <div class="card card-sudah-transfer">
        <div class="card-header"><strong>Sudah Transfer</strong></div>
        <div class="card-body">
            <div class="text-center">
                <div class="mb-2">
                    Mohon kirim bukti pembayaran agar admin dapat memproses pesananmu
                </div>
                <div class="mb-4">
                    <strong>Kirim Bukti Pembayaran</strong>
                </div>

                <div class="d-flex justify-content-evenly mb-5">
                    <div>
                        <div class="mb-2">Via Whatsapp</div>
                        <span><a href="https://wa.me/6281330406408"
                                onclick="return confirm('Kirim bukti pembayaran via whatsapp..?')" target="blank"><img
                                    src="/img/whatsapp.png" alt="admin" width="35"></a></span>
                    </div>
                    <div>
                        <div class="mb-2">Via Telegram</div>
                        <span><a href="https://t.me/playmakeranwar08"
                                onclick="return confirm('Kirim bukti pembayaran via telegram..?')" target="blank"><img
                                    src="/img/telegram.png" alt="admin" width="35"></a></span>
                    </div>
                </div>

                <a href="/" class="btn btn-ungu" onclick="return confirm('Kembali ke menu..?')">Kembali ke
                    menu</a>
            </div>
        </div>
    </div>
@endsection
