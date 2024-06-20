<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class LivewireSortTable extends Component
{
    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task) {
            Task::whereId($task['value'])->update(['priority' => $task['order']]);
        }
    }

    public function render()
    {
        return view('livewire.tasks-sort-table', ['tasks' => Task::orderBy('priority')->get()]);
    }
}
