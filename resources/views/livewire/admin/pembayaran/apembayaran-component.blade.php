<div>
    <div class="card">
        <div class="card-header"><strong>Pembayaran</strong></div>
        <div class="card-body">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Merchant</label>
                <div class="col-sm-10">
                    <select wire:model="merchant" id="" class="form-control">
                        <option value="-">-- pilih merchant --</option>
                        <option value="BRI">BRI</option>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="CIMB NIAGA">CIMB NIAGA</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">A.N</label>
                <div class="col-sm-10">
                    <input type="text" wire:model.lazy="atas_nama" class="form-control" placeholder="Atas Nama">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No Rek</label>
                <div class="col-sm-10">
                    <input type="text" wire:model.debounce.500ms="no_rek" class="form-control" placeholder="No Rek">
                </div>
            </div>
            @error('no_rek')
                <i class="text-danger">{{ $message }}</i>
            @enderror

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Image Pembayaran</label>
                <div class="col-sm-10">
                    <input type="file" wire:model="image_pembayaran" class="form-control" id="{{ $reset }}">
                </div>
                @error('image_pembayaran')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>

            @if ($image_pembayaran)
                <div class="row mb-3 text-center">
                    @error('image_pembayaran')
                        <i class="text-danger">{{ $message }}</i>
                    @else
                        <img src="{{ $image_pembayaran->temporaryUrl() }}" class="img-fluid col-sm-3">
                    @enderror
                </div>
            @endif

            <div class="row">
                @if ($merchant == '' or $atas_nama == '' or $no_rek == '')
                    <button class="btn btn-primary" wire:click='storePembayaran' disabled>Simpan</button>
                @else
                    <button class="btn btn-primary" wire:click='storePembayaran'>Simpan</button>
                @endif
            </div>

        </div>
    </div>
</div>
