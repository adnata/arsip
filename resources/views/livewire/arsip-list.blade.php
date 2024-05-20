
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
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice" wire:model.live="query">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">NO.</th>
                        <th>Nama Dokumen</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Lokasi Pembuatan</th>
                        <th>Kandungan Informasi</th>
                        <th>Pembuat</th>
                        <th>Tahun Buat</th>
                        <th>Kadaluarsa</th>
                        <th>Tags</th>
                        <th>Revisi</th>
                        <th>Versi</th>
                        <th>Size</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($arsips as $item)
                    <tr wire:key="{{ $item->id }}">
                        <td><span class="text-muted">{{ $loop->index + $jenis->firstItem() }}</span></td>
                        <td>{{ $item->nama_jenis }}</td>
                        <td width="5%">
                            <label class="form-check form-switch">
                                <input class="form-check-input" style="cursor: pointer" type="checkbox"
                                    {{ $item->is_active ? 'checked' : '' }}
                                    wire:click="update_status({{ $item->id }})">
                                <span class="form-check-label"></span>
                            </label>
                        </td>
                        <td class="text-end" width="20%">

                            <button class="btn btn-warning btn-sm" data-bs-target="#JenisUbahModal"
                                wire:click="edit({{ $item->id }})" data-bs-toggle="modal">Ubah</button>

                            <button class="btn btn-danger btn-sm" data-bs-target="#modalhapus"
                                data-bs-toggle="modal" data-id="{{ $item->id }}">Hapus</button>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="14" style="text-align: center;">Data tidak ditemukan</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            {{ $arsips->links() }}
        </div>
    </div>

    @include('livewire.modal.jenis.jenismodal')
    @include('livewire.modal.jenis.ubahjenismodal')
    @include('livewire.modal.modalconfirm')
</div>
