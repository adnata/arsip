
<div>
    <div wire:ignore.self class="modal modal-blur fade" id="KelasUbahModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" wire:model="id_kategori" />
                        <div class="mb-3">
                            <label class="form-label required">Kategori</label>
                            <div>
                                <input type="text"
                                    class="form-control @error('kategori') {{ 'is-invalid' }} @enderror"
                                    placeholder="Masukkan Kelas" wire:model="kategori">
                                <div class="invalid-feedback">
                                    @error('kategori')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check form-switch">
                                <input class="form-check-input" wire:model="is_active" type="checkbox" {}>
                                <span class="form-check-label">Is Active</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                    <button wire:click="update" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
                    <div wire:loading>
                        Processing...
                    </div>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
          $wire.on('saved', () => {
                $('#KelasUbahModal').modal('hide');
            });
    </script>
    @endscript
</div>





