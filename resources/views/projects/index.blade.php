<x-tenant-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-5">
            <x-button>
                <a href="{{ route('tenant.projects.create') }}">{{ __('New Project') }}</a>
            </x-button>
        </div>

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
                        Team
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deadline
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tasks
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
                @foreach ($projects as $project)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('tenant.projects.show', $project) }}" class="no-underline">
                                {{ $project->title }}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $project->tenant_id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->deadline_at->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->tasks_count }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->status->text() }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex gap-2 justify-items-start">
                                <x-button class="bg-yellow-400 hover:bg-yellow-400 text-gray-600">
                                    <a href="{{ route('tenant.projects.edit', $project) }}">Edit</a>
                                </x-button>
                                                            
                                <form method="POST" action="{{ route('tenant.projects.destroy', $project) }}">
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
            {{ $projects->links() }}
        </div>
    </div>
</x-tenant-layout>