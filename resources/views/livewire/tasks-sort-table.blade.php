<ul wire:sortable="updateTaskOrder" class="mt-4">
    <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">You can drag and drop a task name to reorder the list.</p>
    @foreach ($tasks as $task)
        <li wire:sortable.item="{{ $task->id }}"
            wire:key="task-{{ $task->id }}"
            class="flex space-x-2 bg-white shadow-sm rounded-lg p-4 my-2 border hover:border-indigo-300"
            style="background-color: {{ $task->project ? $task->project->color : ''}}">

            <div class="flex-1">
                <p wire:sortable.handle class="cursor-move">{{ $task->name }}</p>
            </div>

            <a href="{{ route('tasks.edit', $task) }}">{{ __('Edit') }}</a>

            <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                @csrf
                @method('delete')

                <a href="{{ route('tasks.destroy', $task) }}"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="">

                    {{ __('Delete') }}
                </a>
            </form>
        </li>
    @endforeach
</ul>

