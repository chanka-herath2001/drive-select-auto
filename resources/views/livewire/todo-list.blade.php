<div>
    <h2 class="mt-5">Todo</h2>

    <ul>
        @foreach ($todos as $key => $todo)
            <li class="{{ $todo['completed'] ? 'text-decoration-line-through' : '' }}">
                <input type="checkbox" wire:click="toggleTaskStatus({{ $key }})" {{ $todo['completed'] ? 'checked' : '' }}>
                {{ $todo['title'] }}

                @if ($key === $editIndex)
                    <form method="POST" wire:submit.prevent="editTaskPro">
                        <input type="text" wire:model="task">
                        <button type="submit">Edit</button>
                    </form>
                @endif

                <button type="button" wire:click="editTask({{ $key }})">Edit</button>
                <button type="button" wire:click="deleteTask({{ $key }})">Delete</button>
            </li>
        @endforeach
    </ul>

    <form method="POST" wire:submit.prevent="addNewTask">
        <input type="text" wire:model="task">
        <button type="submit">Add</button>
    </form>

</div>
