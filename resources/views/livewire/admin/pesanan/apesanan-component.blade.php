<div>
    <div class="card">
        <div class="card-header"><strong>Image Pesanan</strong></div>
        <div class="card-body">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" wire:model="foto" class="form-control" id="{{ $reset }}">
                </div>
                @error('foto')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>


            @if ($foto)
                <div class="row mb-3 text-center">
                    @error('foto')
                        <i class="text-danger">{{ $message }}</i>
                    @else
                        <img src="{{ $foto->temporaryUrl() }}" class="img-fluid col-sm-3">
                    @enderror
                </div>
            @endif

            <button class="btn btn-primary" wire:click='storeImage'>Simpan</button>

        </div>
    </div>
</div>
