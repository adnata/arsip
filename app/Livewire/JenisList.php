<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JenisDokumen;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class JenisList extends Component
{

    use WithPagination, WithoutUrlPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $perpage = 5;
    public $query = '';
    public $id_jenis;
    public $id_delete;
    #[Validate('required')]
    public $nama_jenis;
    public $is_active = 1;

    public function render()
    {
        $jenis = JenisDokumen::query()->latest()->where('nama_jenis', 'like', '%'.$this->query.'%')->paginate($this->perpage);
        return view('livewire.jenis-list',compact('jenis'));
    }

    public function edit($id){

        $jns = JenisDokumen::query()->findOrFail($id);
        $this->id_jenis = $jns->id;
        $this->nama_jenis = $jns->nama_jenis;
        $this->is_active = $jns->is_active;
    }

    public function search()
    {
        $this->resetPage();
    }

    public function update(){
        $this->validate();
        //JenisDokumen::where('id', $this->id_jenis)->update(['nama_jenis' => $this->nama_jenis, 'is_active' => $this->is_active]);
        $jnsdok = JenisDokumen::find($this->id_jenis);
        $jnsdok->nama_jenis = $this->nama_jenis;
        $jnsdok->is_active = $this->is_active;
        $jnsdok->save();
        $this->reset();
        $this->is_active = 1;
        $this->dispatch('saved');
        $this->alert('success', 'Ubah berhasil');

    }

    public function save(){

       $this->validate();
       JenisDokumen::create([
            'nama_jenis'=>$this->nama_jenis,
            'is_active'=>$this->is_active
        ]);
        $this->reset();
        $this->is_active = 1;
        $this->dispatch('saved');
        $this->alert('success', 'Simpan berhasil');

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function open_delete($id){
        $this->id_delete = $id;
        $this->dispatch('confirm');
    }

    public function delete($id){
        JenisDokumen::find($id)->delete();
        $this->dispatch('deleted');
        $this->alert('success', 'Hapus berhasil');
    }

    public function update_status($id){
        $status = JenisDokumen::query()->findOrFail($id)->is_active;
        if ($status == 0){
            JenisDokumen::where('id', $id)->update(['is_active' => 1]);
            $this->alert('success', 'Status berihasil di update');
        }else{
            JenisDokumen::where('id', $id)->update(['is_active' => 0]);
            $this->alert('success', 'Status berihasil di update');
        }
    }

}
