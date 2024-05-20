
<div>
    <div wire:ignore.self class="modal modal-blur fade" id="DetilModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Kategori <span wire:loading>Memuat...</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td>Id Log</td><td>:</td><td>{{ $id }}</td>
                        </tr>
                        <tr>
                            <td>Log Name</td><td>:</td><td>{{ $logname }}</td>
                        </tr>
                        <tr>
                            <td>Aksi</td><td>:</td><td>{{ $desc }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Detil Aksi</td><td>:</td><td>
                                {{ $property }}
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
    </script>
    @endscript
</div>





