<x-tenant-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <x-button>
                    <a href="{{ route('tenant.projects.index') }}">
                        Tenant Index
                    </a>
                </x-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <form method="POST" action="{{ route('tenant.projects.store') }}">
                        @csrf
                        <div class="space-y-6">

                            {{-- Title --}}
                            <div>
                                <x-label for="title" value="{{ __('Title') }}" />
                                <x-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                                @error('title')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div>
                                <x-label for="description" value="{{ __('Description') }}" />
                                <textarea name="description" id="description" rows="6" class="block w-full mt-1"></textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Schedule --}}
                            <div>
                                <x-label for="deadline_at" value="{{ __('Deadline') }}" />
                                <input type="date" name="deadline_at" class="rounded"/>
                                @error('deadline_at')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tenant --}}
                            <div>
                                <x-label for="tenant_id" value="{{ __('Assigned tenant') }}" />
                                <select name="tenant_id" id="tenant_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option value="">Please select a tenant</option>
                                    @foreach ($tenants as $tenant)
                                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                    @endforeach
                                </select>
                                @error('tenant_id')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div>
                                <x-label for="status" value="{{ __('Status') }}" />
                                <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option value="">Please select a status</option>
                                    {{-- @foreach (App\Models\Project::STATUS as $status)
                                        <option
                                            value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                    @endforeach --}}
                                </select>
                                @error('status')
                                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="flex justify-end mt-6">
                            <x-button>
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</x-tenant-layout>