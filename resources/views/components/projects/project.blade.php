
<div class="flex space-x-2 bg-white shadow-sm rounded-lg p-4 my-2 border hover:border-indigo-300" style="background-color: {{ $project->color }};">
    <p class="flex-1">{{ $project->name }}</p>

    <a href="{{ route('projects.edit', $project) }}">
        {{ __('Edit') }}
    </a>

    <form method="POST" action="{{ route('projects.destroy', $project) }}">
        @csrf
        @method('delete')
        <a href="{{ route('projects.destroy', $project) }}" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Delete') }}
        </a>
    </form>
</div>
