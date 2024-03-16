<?php

namespace App\Livewire\Taskmanager\Todos;

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
        $this->todos = [
            ['todo' => 'Start your first Wirebox', 'completed' => true,],
            ['todo' => 'Sign up for an account', 'completed' => false,],
            ['todo' => 'Use ⌘K/CTRL+K to create a new Livewire component', 'completed' => false,],
            ['todo' => 'Modify your component and use CTRL+S to save changes', 'completed' => false,],
            ['todo' => 'Use ⌘K/CTRL+K to enable hot reloading', 'completed' => false,],
            ['todo' => 'Use ⌘E/CTRL+E to switch between files', 'completed' => false,],
        ];
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

    public function render()
    {
        return view('livewire.taskmanager.todos.index');
    }
}
