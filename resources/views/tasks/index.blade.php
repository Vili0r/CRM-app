<x-tenant-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
        </div>
        
        <table class="mt-5 w-full rounded text-sm text-left bg-gray-100 text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Project
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Tenant
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deadline
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $task->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $task->project->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->tenant_id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->deadline_at }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-between">
                                @if(!$task->completed)
                                    <div style="padding-top: 0.1em; padding-bottom: 0.1rem;" class="text-xs px-3 bg-orange-200 text-orange-800 rounded-full">Pending</div>
                                @else
                                    <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-xs px-3 bg-teal-200 text-teal-800 rounded-full">Completed</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex gap-2 justify-items-start">
                                <x-button class="bg-yellow-400 hover:bg-yellow-400 text-gray-600">
                                    <a href="{{ route('tenant.tasks.edit', $task) }}">Edit</a>
                                </x-button>
                                                            
                                <form method="POST" action="{{ route('tenant.tasks.destroy', $task) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-button type="submit" onclick="return confirm('Are you sure?')" class="bg-rose-700 hover:bg-rose-700 text-white inline-block">
                                        Delete
                                    </x-button>
                                </form>                                      
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                
        <div class="mt-2">
            {{ $tasks->links() }}
        </div>
    </div>
</x-tenant-layout>