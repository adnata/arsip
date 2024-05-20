<div>
    <div wire:ignore.self class="modal modal-blur fade" id="JenisModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Jenis Arsip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label required">Nama Jenis</label>
                            <div>
                                <input id="jenis" type="text"
                                    class="form-control @error('nama_jenis') {{ 'is-invalid' }} @enderror"
                                    placeholder="Masukkan Nama Jenis" wire:model="nama_jenis">
                                <div class="invalid-feedback">
                                    @error('nama_jenis')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check form-switch">
                                <input class="form-check-input" wire:model="is_active" type="checkbox" checked>
                                <span class="form-check-label"></span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                    <button wire:click="save" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
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
            $('#JenisModal').modal('hide');
        });
    </script>
    @endscript
</div>





