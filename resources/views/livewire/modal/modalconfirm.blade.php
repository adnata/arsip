<div>
    <div wire:ignore.self class="modal modal-blur fade" id="modalhapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Apakah anda yakin?</div>
                    <div><img src="./img/alert-circle.png" style="width:45px; height:45px;" /> Konfirmasi penghapusan
                        data.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default me-auto" data-bs-dismiss="modal">Tidak</button>
                    <span id="b_hapus">
                        <button type="button" class="btn btn-danger" id="btn_hapus">Ya</button>
                    </span>
                    <div wire:loading>Processing...</div>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('deleted', () => {
                $('#modalhapus').modal('hide');
            });

            $('#modalhapus').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                $('#b_hapus').empty().append(
                    '<button type="button" class="btn btn-danger" id="btn_hapus" wire:click="delete(' + recipient +
                    ')" wire:loading.attr="disabled">Hapus</button>');
                //modal.find('.modal-footer #btn_hapus').val(recipient)
            });
        </script>
    @endscript
</div>
