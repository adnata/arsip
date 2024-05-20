<?php

namespace App\Livewire;

use App\Models\Pengaturan as ModelsPengaturan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Pengaturan extends Component
{
    use WithFileUploads, LivewireAlert;
    public $id, $nama_instansi, $nama_kepala_instansi, $alamat_instansi, $no_telp, $logo_instansi;
    public function render()
    {
        $pengaturans = ModelsPengaturan::query()->findOrFail(1);
        $this->id = $pengaturans->id;
        $this->nama_instansi = $pengaturans->nama_instansi;
        $this->nama_kepala_instansi = $pengaturans->nama_kepala_instansi;
        $this->alamat_instansi = $pengaturans->alamat_instansi;
        $this->no_telp = $pengaturans->no_telp;
        return view('livewire.pengaturan');
    }

    public function simpan($id){
        $pengaturan = ModelsPengaturan::find($id);
        $pengaturan->nama_instansi = $this->nama_instansi;
        $pengaturan->nama_kepala_instansi = $this->nama_kepala_instansi;
        $pengaturan->alamat_instansi = $this->alamat_instansi;
        $pengaturan->no_telp = $this->no_telp;
        if ($this->logo_instansi){
            $name_file = $this->logo_instansi->getClientOriginalName();
            $pengaturan->logo_instansi = $name_file;
            $this->logo_instansi->storeAs(path: 'logo', name:$name_file);
        }
        $pengaturan->save();
        $this->alert('success', 'Ubah berhasil');
    }
}
