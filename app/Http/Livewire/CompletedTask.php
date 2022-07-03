<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class CompletedTask extends Component
{
    public $task;

    public function toggleTask($taskId)
    {
        $task = Task::find($taskId);

        $task->completed = !$task->completed;

        $task->save();

        $this->dispatchBrowserEvent('success',[
            'body' => 'Task status changed.',
            'timeout' => 4000
        ]);
    }

    public function render()
    {
        return view('livewire.completed-task');
    }
}
