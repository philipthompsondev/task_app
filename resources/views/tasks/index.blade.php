<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <textarea
                name="task_name"
                placeholder="{{ __('Enter a new task here.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('task_name') }}</textarea>
            <input type="hidden" id="priority" name="priority" value="1" />

            <x-input-error :messages="$errors->get('task_name')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('New Task') }}</x-primary-button>
        </form>

        <div class="mt-6 space-y-2">
            @foreach ($tasks as $task)
                <x-tasks.task :task="$task"></x-tasks.task>
            @endforeach
        </div>
    </div>
</x-app-layout>
