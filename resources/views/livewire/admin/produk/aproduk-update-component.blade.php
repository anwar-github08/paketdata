<div class="mb-4">
    <div class="card">
        <div class="card-header"><strong>Produk</strong></div>
        <div class="card-body">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nm. Produk</label>
                <div class="col-sm-10">
                    <input type="text" wire:model.lazy="nama_produk" class="form-control" placeholder="Nama Produk">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kod. Produk</label>
                <div class="col-sm-10">
                    <input type="text" wire:model.lazy="kode_produk" class="form-control" placeholder="Kode Produk">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select wire:model="kategori" id="" class="form-control">
                        <option value="">-- pilih kategori --</option>
                        <option value="PLN">PLN</option>
                        <option value="Data">Data</option>
                        <option value="Pulsa">Pulsa</option>
                        <option value="Masa Aktif">Masa Aktif</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                    <select wire:model="brand" id="" class="form-control">
                        <option value="">-- pilih brand --</option>
                        <option value="PLN">PLN</option>
                        <option value="TELKOMSEL">TELKOMSEL</option>
                        <option value="INDOSAT">INDOSAT</option>
                        <option value="SMARTFREN">SMARTFREN</option>
                        <option value="AXIS">AXIS</option>
                        <option value="TRI">TRI</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" wire:model.lazy="harga" class="form-control" placeholder="Harga">
                </div>
            </div>
            @error('harga')
                <i class="text-danger">{{ $message }}</i>
            @enderror

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea wire:model.lazy="deskripsi" class="form-control" cols="30" rows="5"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Multi</label>
                <div class="col-sm-10 form-switch">
                    <input class="form-check-input" wire:model='multi' type="checkbox" role="switch"
                        id="flexSwitchCheckDefault" checked>
                </div>
            </div>

            <div>
                @if ($nama_produk == '' or $kode_produk == '' or $kategori == '' or $brand == '' or $harga == '' or $deskripsi == '')
                    <button class="btn btn-primary" wire:click='updateProduk' disabled>Simpan</button>
                @else
                    <button class="btn btn-primary" wire:click='updateProduk'>Simpan</button>
                @endif
                <button class="btn btn-danger" wire:click="$emit('eBatalUpdate')">Batal</button>
            </div>

        </div>
    </div>
</div>
