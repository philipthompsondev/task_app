<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TasksSortTable extends Component
{
    public $p;
    protected $queryString = ['p'];

    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task) {
            Task::whereId($task['value'])->update(['priority' => $task['order']]);
        }
    }

    public function render()
    {
        if ($this->p == null || $this->p == "") {
            $tasks = Task::orderBy('priority')->get();
        } else {
            $tasks = Task::orderBy('priority')->where('project_id', ($this->p))->get();
        }

        return view('livewire.tasks-sort-table', ['tasks' => $tasks]);
    }
}
