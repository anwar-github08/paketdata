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
                <th>Merchant</th>
                <th>A.N</th>
                <th>No Rek</th>
                <th>Image</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->merchant }}</td>
                    <td>{{ $pembayaran->atas_nama }}</td>
                    <td>{{ $pembayaran->no_rek }}</td>
                    <td><img src="/storage/image_pembayaran/{{ $pembayaran->image_pembayaran }}" alt="image_pembayaran"
                            width="40"></td>
                    <td><button class="btn btn-danger btn-sm"
                            onclick="return confirm('hapus..?') ||
                            event.stopImmediatePropagation()"
                            wire:click="deletePembayaran({{ $pembayaran->id }},'{{ $pembayaran->image_pembayaran }}')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
