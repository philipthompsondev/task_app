<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('patch')

            <input type="text" name="name"
                value="{{ old('name', $project->name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <div class="flex border p-4 mt-6 rounded-md bg-gray-50">
                <label for="color" class="w-full">Select Project Color:</label>
                <input name="color" id="color" type="color" value="{{ $project->color }}" class="w-full hover:cursor-pointer">
                <x-input-error :messages="$errors->get('color')" class="mt-2" />
            </div>

            <p class="block mb-2 text-sm font-medium text-gray-900 mt-4">Created at {{ $project->created_at }}</p>
            <p class="block mb-2 text-sm font-medium text-gray-900">Updated at {{ $project->updated_at }}</p>

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('projects.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
