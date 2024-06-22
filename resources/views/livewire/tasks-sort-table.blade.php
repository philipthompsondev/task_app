<ul wire:sortable="updateTaskOrder" class="mt-4 divide-y-4">
    @foreach ($tasks as $task)
        <li
            wire:sortable.item="{{ $task->id }}"
            wire:key="task-{{ $task->id }}"
            class="p-6 flex space-x-2 bg-white shadow-sm rounded-lg"
            style="background-color: {{ $task->project ? $task->project->color : ''}}"
        >
            <div class="flex-1">
                <p wire:sortable.handle class="">{{ $task->name }}</p>
            </div>

            <x-dropdown>
                <x-slot name="trigger">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('tasks.edit', $task)">
                        {{ __('Edit') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                        @csrf
                        @method('delete')

                        <x-dropdown-link :href="route('tasks.destroy', $task)" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </li>

    @endforeach
</ul>

