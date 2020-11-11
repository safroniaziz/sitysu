<div class="row">

    <div class="col-xl-12">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nip">NIP / NIK <span class="red-star">*</span></label>
                <input type="text" class="form-control" id="nip" placeholder="129839120183" name="nip">
                @error('nip')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="nama">Nama <span class="red-star">*</span></label>
                <input type="text" class="form-control" id="nama" placeholder="John Doe" name="nama">
                @error('nama')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="id_unit_kerja">Unit Kerja <span class="red-star">*</span></label>
                <select name="id_unit_kerja" id="id_unit_kerja" class="form-control">
                    <option value="">Pilih Unit Kerja...</option>
                    @foreach ($unitKerja as $uk)
                    <option value="{{ $uk->id_unit_kerja }}">{{ $uk->nama_departemen }}</option>
                    @endforeach
                </select>
                @error('id_unit_kerja')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="no_hp">No. Hp</label>
                <input type="text" class="form-control" id="no_hp" placeholder="083287498327" name="no_hp">
                @error('no_hp')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="nidn">NIDN</label>
                <input type="text" class="form-control" id="nidn" placeholder="0228434920" name="nidn">
                @error('nidn')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Jl. Kampar 03" name="alamat">
                @error('alamat')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="jenis_kelamin">Jenis Kelamin <span class="red-star">*</span></label>
                <div class="mt-4">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="L">
                        <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="P">
                        <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                    </div>
                    @error('jenis_kelamin')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="input_surat">Beri Hak Akses <span class="red-star">*</span></label>
                <div class="mt-4">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="input_surat" class="custom-control-input" value="aktif" wire:model="input_surat">
                        <label class="custom-control-label" for="customRadioInline3">Ya</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="input_surat" class="custom-control-input" value="tidak" wire:model="input_surat">
                        <label class="custom-control-label" for="customRadioInline4">Tidak</label>
                    </div>
                    @error('input_surat')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            @if ($input_surat == 'aktif')
            <div class="form-group col-md-4">
                <label for="tanggal_berakhir">Tanggal Berakhir <span class="red-star">*</span></label>
                <input type="date" class="form-control" id="tanggal_berakhir" placeholder="John Doe" name="tanggal_berakhir">
                @error('tanggal_berakhir')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @endif
        </div>

        <div class="form-group col-md-12 mt-1 text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>


</div>