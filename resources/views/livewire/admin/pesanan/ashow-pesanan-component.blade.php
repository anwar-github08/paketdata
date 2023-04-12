<div class="mt-5">

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

@push('style-source')
    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endpush

@push('script-source')
    {{-- datatable --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
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
