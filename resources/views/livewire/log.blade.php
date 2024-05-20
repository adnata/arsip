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
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice"
                        wire:model.live="query">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable table-bordered">
                <thead>
                    <tr>
                        <th class="w-1">NO.</th>
                        <th>Log Name</th>
                        <th>Aksi</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activity as $item)
                        <tr wire:key="{{ $item->id }}">
                            <td><span class="text-muted">{{ $loop->index + $activity->firstItem() }}</span></td>
                            <td>{{ $item->log_name }}</td>
                            <td>
                                {{ $item->description}}
                            </td>
                            <td class="text-center" width="10%">

                                <button class="btn btn-primary btn-sm" data-bs-target="#DetilModal"
                                    data-bs-toggle="modal" wire:click="show({{ $item->id }})">Detil</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $activity->links() }}
        </div>
        @include('livewire.modal.log.detilmodal')
    </div>
