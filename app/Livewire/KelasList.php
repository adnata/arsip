<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class KelasList extends Component
{


    use WithPagination, WithoutUrlPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $perpage = 5;
    public $query = '';
    public $id_kategori;
    public $id_delete;
    #[Validate('required')]
    public $kategori;
    public $is_active = 1;
    public function render()
    {
        $kategoris = Kategori::query()->latest()->where('kategori', 'like', '%'.$this->query.'%')->paginate($this->perpage);
        return view('livewire.kelas-list',compact('kategoris'));
    }

    public function edit($id){

        $kate = Kategori::query()->findOrFail($id);
        $this->id_kategori = $kate->id;
        $this->kategori = $kate->kategori;
        $this->is_active = $kate->is_active;
    }

    public function search()
    {
        $this->resetPage();
    }

    public function update(){
        $this->validate();
        //Kategori::where('id', $this->id_kategori)->update(['kategori' => $this->kategori, 'is_active' => $this->is_active]);
        $Kate = Kategori::find($this->id_kategori);
        $Kate->kategori =  $this->kategori;
        $Kate->is_active =  $this->is_active;
        $Kate->save();
        $this->reset();
        $this->is_active = 1;
        $this->dispatch('saved');
        $this->alert('success', 'Ubah berhasil');
    }

    public function save(){
       $this->validate();
        Kategori::create([
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
        Kategori::find($id)->delete();
        $this->dispatch('deleted');
        $this->alert('success', 'Hapus berhasil');
    }

    public function update_status($id){
        $status = Kategori::query()->findOrFail($id)->is_active;
        if ($status == 0){
            Kategori::where('id', $id)->update(['is_active' => 1]);
            $this->alert('success', 'Status berihasil di update');
        }else{
            Kategori::where('id', $id)->update(['is_active' => 0]);
            $this->alert('success', 'Status berihasil di update');
        }
    }

}
