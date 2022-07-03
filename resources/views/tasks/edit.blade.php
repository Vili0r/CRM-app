<x-tenant-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <x-button>
                    <a href="{{ route('tenant.tasks.index') }}">
                        Task Index
                    </a>
                </x-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <form method="POST" action="{{ route('tenant.tasks.update', $task) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">

                            {{-- Title --}}
                            <div>
                                <x-label for="title" value="{{ __('Title') }}" />
                                <x-input id="title" class="block w-full mt-1" type="text" name="title" :value="$task->title" autofocus autocomplete="title" />
                                @error('title')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div>
                                <x-label for="description" value="{{ __('Description') }}" />
                                <textarea name="description" id="description" rows="6" class="block w-full mt-1">{{ $task->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Schedule --}}
                            <div>
                                <x-label for="deadline_at" value="{{ __('Deadline') }}" />
                                <input type="date" name="deadline_at" class="rounded" value="{{ $task->deadline_at }}"/>
                                @error('deadline_at')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</x-tenant-layout>