<?php

namespace App\Http\Livewire;

use App\Models\Project;
use LivewireUI\Modal\ModalComponent;

class CreateTask extends ModalComponent
{
    public $project;
    public $title;
    public $description;
    public $deadline_at;
    public $tenant_id;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->tenant_id = $project->tenant_id;
    }

    protected $rules =
        [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'deadline_at' => ['required', 'date'],
        ];

        
    public function create()
    {
        $this->validate();
        
        $this->project->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
            'deadline_at' => $this->deadline_at,
            'tenant_id' => $this->tenant_id,
        ]);
        
        $this->closeModal();
        
        
        return redirect()->route('tenant.projects.show', [
            'project' => $this->project
        ]);
        
        $this->dispatchBrowserEvent('success',[
            'body' => 'Task successfully created!',
            'timeout' => 4000
        ]);
    }
        
    public function render()
    {
        return view('livewire.create-task');
    }
}
