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

    public string $slno = '1';
    public mixed $vdate = '';
    public string $vname = '';
    public bool $completed = false;
    public mixed $active_id = '1';


    public function mount()
    {
        $this->vdate = Carbon::parse(Carbon::now());

    }

    public function isChecked($id): void
    {
        $todo = Todos::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();
    }

    public function saveTodo(): void
    {
        Todos::create([
            'slno' => $this->slno,
            'vdate' => $this->vdate,
            'vname' => $this->vname,
            'completed' => $this->completed,
            'active_id' => '1'
        ]);

        $this->clearFields();
        $this->refreshComponent();
    }

    public function clearFields(): void
    {
        $this->slno = '1';
        $this->vdate = Carbon::parse(Carbon::now());
        $this->vname = '';
        $this->completed = false;
        $this->active_id = '1';

    }

    public function getList()
    {
        return Todos::all();

    }

    protected function refreshComponent(): void
    {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.taskmanager.todos.index')->with([
            'list' => $this->getList()
        ]);
    }


}
