<div class="mt-5">
    @if (session()->has('sukses'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ session('sukses') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-dark table-striped table-bordered table-fluid text-white text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="/storage/bukti_pesanan/{{ $pesanan->image }}" alt="bukti_pesanan" width="40"></td>
                    <td><button class="btn btn-danger btn-sm"
                            onclick="return confirm('hapus..?') ||
                            event.stopImmediatePropagation()"
                            wire:click="deleteImage({{ $pesanan->id }},'{{ $pesanan->image }}')">Hapus</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
