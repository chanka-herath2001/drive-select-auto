<?php

namespace App\Livewire;

use Livewire\Component;

class TodoList extends Component
{

    public $todos = [];

    public $task;

    public $editIndex = null;

    public function mount(){
        $this->todos = [
            [
                'title' => 'Learn Laravel Livewire',
                'completed' => true
            ],
            [
                'title' => 'Learn Laravel',
                'completed' => false
            ],
            [
                'title' => 'Learn PHP',
                'completed' => false
            ],
            [
                'title' => 'Learn Vue',
                'completed' => false
            ],
            [
                'title' => 'Learn Javascript',
                'completed' => false
            ],
        ];
    }

    public function toggleTaskStatus($index){
        $this->todos[$index]['completed'] = !$this->todos[$index]['completed'];
    }

    public function addNewTask(){
        $this->todos[] = [
            'title' => $this->task,
            'completed' => false
        ];

        $this->task = '';
    }

    public function editTaskPro(){
        $this->todos[$this->editIndex] = [
            'title' => $this->task,
            'completed' => false
        ];

        $this->task = '';
    }

    public function editTask($index){
        // $this->task = $this->todos[$index]['title'];
        // $this->deleteTask($index);

        $this->editIndex = $index;
    }

    public function deleteTask($index){
        unset($this->todos[$index]);
    }



    public function render()
    {
        return view('livewire.todo-list');
    }
}
