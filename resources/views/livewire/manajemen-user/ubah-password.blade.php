<div class="widget-content widget-content-area" style="height: 471px;">
    <form wire:submit.prevent="submit">
        <div>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="form-row mb-2 justify-content-center">
            <div class="form-group col-md-6 ">
                <label for="current_password">Password Lama <span class="red-star">*</span></label>
                <input type="password" class="form-control" id="current_password" placeholder="*********" name="current_password" wire:model="current_password">
            </div>
        </div>
        <div class="form-row mb-2 justify-content-center">
            <div class="form-group col-md-6">
                <label for="new_password">Password Baru <span class="red-star">*</span></label>
                <input type="password" class="form-control" id="new_password" placeholder="*********" name="new_password" wire:model="new_password">
                @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row mb-2 justify-content-center">
            <div class="form-group col-md-6">
                <label for="confirm_password">Ulangi Password <span class="red-star">*</span></label>
                <input type="password" class="form-control" id="confirm_password" placeholder="*********" name="confirm_password" wire:model="confirm_password">
                @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 float-right">Simpan</button>
    </form>
</div>