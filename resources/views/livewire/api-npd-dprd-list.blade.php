
<div>
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-muted">
                Show
                <div class="mx-2 d-inline-block">
                    <select type="text" wire:model.live="perpage" class="form-select" id="select-users" value="">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                      </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-muted">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice" wire:model.live="search">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div wire:loading>
                <div class="loading-container">
                    <span class="loading-text">Loading...</span>
                    <div class="loading-spinner"></div>
                </div>
            </div>
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">#</th>
                        <th class="w-1">ID</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($datas)
                            @forelse ($datas as $item)
                            <tr wire:key="{{ $item['id'] }}">
                                <td><span class="text-muted">{{ $loop->index + $datas->firstItem() }}</span></td>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['nomor_npd'] }}</td>
                                <td>{{ $item['tgl_npd'] }}</td>

                                <td class="text-end" width="20%">
                                    <button class="btn btn-primary btn-sm" onclick="window.open('/cetak/dprd/npd/'+{{ $item['id'] }})">Lihat</button>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="14" style="text-align: center;">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    @else
                    <tr>
                        <td colspan="14" style="text-align: center;">Data tidak ditemukan</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @if ($datas)
                {{ $datas->links() }}
            @endif

        </div>
    </div>

    @script
    <script>
        $wire.on('api-ditolak', () => {
            alert('Akses API ditolak');
        });
    </script>
    @endscript
</div>
