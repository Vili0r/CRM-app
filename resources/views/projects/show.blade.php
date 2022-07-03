<x-tenant-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-notification />
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <x-button>
                    <a href="{{ route('tenant.projects.index') }}">
                        Project Index
                    </a>
                </x-button>
            </div>
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container px-6 py-10 mx-auto">
                    <h1 class="text-3xl font-semibold capitalize lg:text-4xl dark:text-gray-700">{{ $project->title }}</h1>
                    
                    <p class="mt-4 xl:mt-6 dark:text-gray-500">
                        {{ Str::words($project->description, 50) }}
                    </p>
                    <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-3">
                        @forelse($project->tasks as $task)
                        <div class="p-8 space-y-3 border-2 dark:border-blue-400 rounded-xl">
                            <span class="inline-block dark:text-blue-500">
                                <x-fluentui-task-list-square-rtl-24 class="h-12 w-12"/>
                            </span>
    
                            <h1 class="text-2xl font-semibold capitalize dark:text-gray-700">{{ $task->title }}</h1>
    
                            <p class="dark:text-gray-500">
                                {{ $task->description }}
                            </p>
                            <livewire:completed-task :task="$task"/>
                        </div> 
                        @empty
                            There are no tasks.
                        @endforelse  

                        <div class="p-8 space-y-3 border-2 dark:border-blue-400 rounded-xl">
                                
                            <button onclick='Livewire.emit("openModal", "create-task", {{ json_encode([$project]) }})' class="dark:text-blue-500">
                                <x-fluentui-task-list-square-add-24-o class="h-12 w-12 justify-center"/>
                                <strong>New Task</strong> 
                            </button>
                        </div>                          
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>