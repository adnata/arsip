<?php

namespace App\Livewire;

use App\Models\ArsipFile;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ArsipList extends Component
{
    use WithPagination, WithoutUrlPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $perpage = 5;
    public $query = '';
    public $id_arsip;
    public $id_delete;
    #[Validate('required')]
    public $kategori;
    public $is_active = 1;
    public function render()
    {
        $arsips = ArsipFile::query()->latest()->where('nama_dokumen', 'like', '%'.$this->query.'%')->paginate($this->perpage);
        return view('livewire.arsip-list',compact('arsips'));
    }

    public function search()
    {
        $this->resetPage();
    }

    public function update(){
        $this->validate();
        $arsip = ArsipFile::find($this->id_arsip);
        $arsip->kategori =  $this->kategori;
        $arsip->is_active =  $this->is_active;
        $arsip->save();
        $this->reset();
        $this->is_active = 1;
        $this->dispatch('saved');
        $this->alert('success', 'Ubah berhasil');
    }

    public function save(){
        $this->validate();
         ArsipFile::create([
             'kategori'=>$this->kategori,
             'is_active'=>$this->is_active
         ]);
         $this->reset();
         $this->is_active = 1;
         $this->dispatch('saved');
         $this->alert('success', 'Simpan berhasil');
    }

    public function open_delete($id){
        $this->id_delete = $id;
        $this->dispatch('confirm');
    }

    public function delete($id){
        ArsipFile::find($id)->delete();
        $this->dispatch('deleted');
        $this->alert('success', 'Hapus berhasil');
    }

    public function update_status($id){
        $status = ArsipFile::query()->findOrFail($id)->is_active;
        if ($status == 0){
            ArsipFile::where('id', $id)->update(['is_active' => 1]);
            $this->alert('success', 'Status berihasil di update');
        }else{
            ArsipFile::where('id', $id)->update(['is_active' => 0]);
            $this->alert('success', 'Status berihasil di update');
        }
    }

}
