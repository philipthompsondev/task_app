<x-app-layout>


    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('patch')
            <input
                type="text"
                name="name"
                value="{{ old('name', $task->name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >

            <select class="form-control" id="selectProject" name="project_id">
                <option value="" selected>No Project</option>
                @foreach($projects as $project)
                    @if($task->project)
                        <option value="{{$project->id}}" {{ $project->id === $task->project->id ? "selected" : "" }}>{{ $project->name }}</option>
                    @else
                        <option value="{{$project->id}}">{{ $project->name }}</option>
                    @endif
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('tasks.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
