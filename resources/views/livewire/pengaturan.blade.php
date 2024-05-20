<div>
    {{-- page header --}}
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Pengaturan Aplikasi
                    </div>
                    <h2 class="page-title">
                        Pengaturan
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            Keluar
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- page body --}}

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <form enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-6">
                                                <label class="form-label">Nama Instansi</label>
                                                <div class="input-icon mb-3">
                                                    <input type="text" class="form-control" wire:model="nama_instansi" placeholder="Nama Instansi">
                                                    <span class="input-icon-addon">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-6">
                                                <label class="form-label">Nama Kepala Instansi</label>
                                                <div class="input-icon mb-3">
                                                    <input type="text" class="form-control" wire:model="nama_kepala_instansi" placeholder="Nama Kepala Instansi">
                                                    <span class="input-icon-addon">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-6">
                                                <label class="form-label">Alamat Instansi</label>
                                                <div class="input-icon mb-3">
                                                    <input type="text" class="form-control" wire:model="alamat_instansi" placeholder="Alamat Instansi">
                                                    <span class="input-icon-addon">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-6">
                                                <label class="form-label">No. Telpon Instansi</label>
                                                <div class="input-icon mb-3">
                                                    <input type="text" class="form-control" wire:model="no_telp" placeholder="No. Telp Instansi">
                                                    <span class="input-icon-addon">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-6">
                                                <div class="form-label">Logo Instansi</div>
                                                <input type="file" class="form-control" wire:model="logo_instansi"/>
                                            </div>
                                        </div>

                                        @if ($logo_instansi)
                                            <div class="col-md-6 col-xl-12 text-end">
                                                <div class="mb-6">
                                                    <img src="{{ $logo_instansi->temporaryUrl() }}" width="160px">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6 col-xl-12 text-end">
                                            <button class="btn btn-primary" wire:click.prevent="simpan({{ $id }})" wire:loading.attr="disabled">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>
                                                Simpan
                                            </button>
                                            <div wire:loading>
                                                Processing...
                                            </div>
                                        </div>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
