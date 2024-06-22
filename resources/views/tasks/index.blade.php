<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tasks.store') }}" class="p-4 border-gray-300 border rounded-md bg-gray-50 shadow-md">
            @csrf

            <label for="name" class="block mb-2 text-lg text-gray-900 dark:text-white">Create New Task</label>
            <input type="text"
                name="name"
                placeholder="{{ __('Enter a new task name here.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md">

            <div class="w-full mt-5">
                @if(!$projects->isEmpty())
                    <label for="selectProject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">You may also select a project for the task:</label>
                    <select id="selectProject" name="project_id"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>No Project</option>
                        @foreach($projects as $project)
                            <option value="{{$project->id}}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                @else
                    <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">There are currently no projects, you can create a project in the project tab.</p>
                @endif
            </div>

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create Task') }}</x-primary-button>
        </form>

        <h2 class="block mt-4 text-lg font-medium text-gray-900 dark:text-white">Task List:</h2>
        <div class="">
            @if(!$projects->isEmpty())
                <label for="selectProject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter tasks by project:</label>
                <select
                    id="selectProject"
                    name="project_id"
                    onChange="document.location.href = '/tasks?p=' + this.value"
                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option value="">All Projects</option>

                    @foreach($projects as $project)
                        <option
                            value="{{$project->id}}"
                            {{ isset($_GET['p']) && ($_GET['p'] == $project->id) ? "selected" : "" }}
                        >{{ $project->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <livewire:tasks-sort-table />
    </div>
</x-app-layout>
