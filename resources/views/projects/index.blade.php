<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <input
                type="text"
                name="name"
                placeholder="{{ __('Enter a new project name.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >

            <div class="col-span-1">
                <label for="color">Background Color:</label>
                <input name="color" id="color" type="color" value="#FFFFFF">
            </div>

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Project') }}</x-primary-button>
        </form>

        @foreach($projects as $project)
            <x-projects.project :project="$project"></x-projects.project>
        @endforeach

    </div>
</x-app-layout>
