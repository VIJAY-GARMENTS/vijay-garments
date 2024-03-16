<?php

namespace App\Livewire\Taskmanager\Todos;

use Aaran\Taskmanager\Models\Todos;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('My Todo List')]
class Index extends Component
{
    public $todos;

    #[Rule('required')]
    public $todo;

    public function mount()
    {
        $this->slno = Todos::nextNo();
        $this->active_id=true;
        $this->vdate=Carbon::parse(Carbon::now());
//        $this->todos = [
//            ['todo' => 'Start your first Wirebox', 'completed' => true,],
//            ['todo' => 'Sign up for an account', 'completed' => false,],
//            ['todo' => 'Use ⌘K/CTRL+K to create a new Livewire component', 'completed' => false,],
//            ['todo' => 'Modify your component and use CTRL+S to save changes', 'completed' => false,],
//            ['todo' => 'Use ⌘K/CTRL+K to enable hot reloading', 'completed' => false,],
//            ['todo' => 'Use ⌘E/CTRL+E to switch between files', 'completed' => false,],
//        ];
    }

    public function add()
    {
        $this->validate();

        $this->todos[] = [
            'todo' => $this->todo,
            'completed' => false,
        ];

        $this->reset('todo');
    }

    #[Computed]
    public function remaining()
    {
        return collect($this->todos)->where('completed', false)->count();
    }

    public $slno='';
    public $vdate='';
    public $vname='';
    public bool $completed=false;
    public $active_id;
    public string $activeRecord = "1";
    public $vid = '';

    public function save()
    { if ($this->vid == "")
      {

        Todos::create([
            'slno'=>$this->slno,
            'vdate'=>Carbon::parse(Carbon::now()),
            'vname'=>$this->vname,
            'completed'=>$this->completed,
            'active_id'=>1,
        ]);
        $this->clear();
      }
       else
      {
        $obj=Todos::find($this->vid);
        $obj->vdate=$this->vdate;
        $obj->vname=$this->vname;
        $obj->completed=$this->completed;
        $obj->active_id=$this->active_id;
        $obj->save();
      }
    }

    public function clear()
    {
        $this->vname='';
    }

    public function todo_list()
    {
     $this->save();
    }

    public function done($id)
    {
      if ($id!=''){
          $obj=Todos::find($id);
          $obj->vdate=$this->vdate;
          $obj->vname=$this->vname;
          $obj->completed=true;
          $obj->active_id=$this->active_id;
//          $this->save();
      }

    }

    public function getObj($id)
    {
        if ($id) {
            $obj=Todos::find($id);
            $this->vid=$obj->id;
            $this->slno = $obj->slno;
            $this->vdate = $obj->vdate;
            $this->vname = $obj->vname;
            $this->completed = $obj->completed;
        }
    }


    public function getlist()
    {
        return Todos::all() ;

    }



    public function render()
    {
        return view('livewire.taskmanager.todos.index')->with([
            'list' => $this->getList()
        ]);
    }


}
