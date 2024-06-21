<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <input type="text"
                name="name"
                placeholder="{{ __('Enter a new task name here.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >
            @if(!$projects->isEmpty())
                <select class="form-control" id="selectProject" name="project_id">
                    <option value="" selected>No Project</option>
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{ $project->name }}</option>
                    @endforeach
                </select>
            @else
                <p>There are no projects, you can create a project in the project tab.</p>
            @endif

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('New Task') }}</x-primary-button>
        </form>

        <livewire:livewire-sort-table/>
    </div>
</x-app-layout>
