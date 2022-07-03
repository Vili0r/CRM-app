<div class="py-6 px-4">
    <form wire:submit.prevent="create">

        <div class="space-y-6">
            {{-- Title --}}
            <div>
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                @error('title')
                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea wire:model="description" name="description" id="description" rows="6" class="block w-full mt-1"></textarea>
                @error('description')
                    <div class="alert alert-danger mt-3 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- Schedule --}}
            <div>
                <x-label for="deadline_at" value="{{ __('Deadline') }}" />
                <input wire:model="deadline_at" type="date" name="deadline_at" class="rounded"/>
                @error('deadline_at')
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
