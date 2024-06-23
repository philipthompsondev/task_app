<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('patch')

            <input
                type="text"
                name="name"
                value="{{ old('name', $task->name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            @if(!$projects->isEmpty())
                <label for="selectProject" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign task to project:</label>
                <select
                    id="selectProject"
                    name="project_id"
                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option value="" selected>No Project</option>
                    @foreach($projects as $project)
                        @if($task->project)
                            <option value="{{$project->id}}" {{ $project->id === $task->project->id ? "selected" : "" }}>{{ $project->name }}</option>
                        @else
                            <option value="{{$project->id}}">{{ $project->name }}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <p class="block my-2 text-sm font-medium text-gray-900 dark:text-white">There are currently no projects, you can create a project in the project tab.</p>
            @endif

            <p class="block mb-2 text-sm font-medium text-gray-900 mt-4">Created at {{ $task->created_at }}</p>
            <p class="block mb-2 text-sm font-medium text-gray-900">Updated at {{ $task->updated_at }}</p>

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save Task') }}</x-primary-button>
                <a href="{{ route('tasks.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
