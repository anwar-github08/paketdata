<div>
    <div class="card card-pesanan-sukses">
        <div class="card-header"><strong>Bukti Pesanan Terkirim & Sukses</strong></div>
        <div class="card-body text-center">
            @foreach ($pesanans as $pesanan)
                <img src="/storage/bukti_pesanan/{{ $pesanan->image }}" alt="bukti_pesanan_sukses"
                    class="img-fluid img-thumbnail mb-2">
            @endforeach
        </div>
    </div>
</div>
