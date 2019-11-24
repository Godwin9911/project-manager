
@extends('layout')

@section('content')
    <h2 class="text-center">Project Detail</h2>
    <div class="card mb-2">
        <div class="card-body">
            <h3 class="card-title">{{ $project->title }}</h3>

            <p class="card-text">{{ $project->description }} </p>
            <hr>
            <h3>Task List</h3>
            @if ($project->tasks->count())
                <div>
                    @foreach ($project->tasks as $task)
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('PATCH')
                            @csrf
                            <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                                <input type="checkbox" name="completed" onchange="this.form.submit()"
                                {{ $task->completed ? 'checked' : '' }}>
                                {{ $task->description }}
                            </label>
                        </form>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <br>

    <h2>Add Task</h2>
    <form method="POST" action="/projects/{{ $project->id }}/tasks" class="col-md-8">
        @csrf
        @include ('errors')
        <div class="form-group">
            <label class="label d-none" for="addTask">Add Task</label>
            <input type="text" class="form-control" id="addTask" name="description" placeholder="New Task">
        </div>
        <button type="submit" class="btn btn-outline-primary">Add Task</button>
    <form>
    <hr>
    <p>Click the button below to Edit a Project</p>
    <p><a href="/projects/{{ $project->id }}/edit" class="btn btn-secondary">Edit Project</a></p>
@endsection
