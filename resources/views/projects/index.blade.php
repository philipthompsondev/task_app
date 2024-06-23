<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('projects.store') }}" class="p-4 border-gray-300 border rounded-md bg-gray-50 shadow-md">
            @csrf

            <label for="name" class="block mb-2 text-lg text-gray-900 dark:text-white">Create New Project</label>
            <input type="text" name="name" id="name"
                placeholder="{{ __('Enter a new project name.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <div class="flex border p-4 mt-6 rounded-md bg-gray-100">
                <label for="color" class="w-full">Select Project Color:</label>
                <input name="color" id="color" type="color" value="#FFFFFF" class="w-full hover:cursor-pointer">
                <x-input-error :messages="$errors->get('color')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">{{ __('New Project') }}</x-primary-button>
        </form>

        @if($projects->isEmpty())
            <p class="block mt-4 text-sm font-medium text-gray-900">There are currently no projects, you can create a project above.</p>
        @else
            <h2 class="block mt-4 text-lg font-medium text-gray-900">Project List:</h2>
            @foreach($projects as $project)
                <x-projects.project :project="$project"></x-projects.project>
            @endforeach
        @endif
    </div>
</x-app-layout>
