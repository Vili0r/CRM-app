<div>
    <input wire:change="toggleTask({{ $task->id }})" 
        {{ $task->completed ? 'checked' : '' }} type="checkbox" class="rounded-full" />
</div>
