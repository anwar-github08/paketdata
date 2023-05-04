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
                <th>Kategori</th>
                <th>Brand</th>
                <th>Produk</th>
                <th>Kode Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Multi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>{{ $produk->brand }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kode_produk }}</td>
                    <td>{{ number_format($produk->harga) }}</td>
                    <td>{{ $produk->deskripsi }}</td>
                    <td>{{ $produk->multi }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('hapus..?') ||
                            event.stopImmediatePropagation()"
                            wire:click="deleteProduk({{ $produk->id }})">Hapus</button>
                        <button class="btn btn-warning btn-sm"
                            wire:click="$emit('eUpdateProduk',{{ $produk->id }})">Ubah</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
