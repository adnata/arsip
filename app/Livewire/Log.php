<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Spatie\Activitylog\Models\Activity;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Log extends Component
{
    use WithPagination, WithoutUrlPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    public $query = '';
    public $id,$logname,$desc, $id_subj, $model, $caustype, $causid;
    public $property;
    public $dataaksi;
    public $aksi;

    public function render()
    {
        $activity = Activity::query()->latest()->where('description', 'like', '%'.$this->query.'%')->paginate($this->perpage);
        return view('livewire.log',compact('activity'));
    }

    public function show($id){
        $this->reset_all();
        $activity = Activity::query()->findOrFail($id);
        $this->id = $activity->id;
        $this->logname= $activity->log_name;
        $this->desc = $activity->description;
        $this->id_subj = $activity->subject_id;
        $this->model = $activity->subject_type;
        $this->property = $activity->properties;
    }

    public function reset_all(){
        $this->id = "";
        $this->logname= "";
        $this->desc = "";
        $this->id_subj = "";
        $this->model = "";
        $this->property = "";
    }
}
