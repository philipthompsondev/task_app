
<div class="col-span-1 rounded-md border border-slate-300 shadow px-4 py-4" style="background-color: {{ $project->color }};">
    <div class="flex">
        <p class="text-lg w-5/6">{{ $project->name }}</p>

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
</div>
