@extends('layout')

@section('content')
    <div class="col-md-8">
        <h2>Edit Project</h2>
        <form method="POST" action="/projects/{{ $project->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

            <div class="form-group">
                <label for="projectTitle">Project Title</label>
                <input type="text" class="form-control" id="projectTitle" name="title" placeholder="project title" value="{{ $project->title}}">
            </div>
            <div class="form-group">
                <label for="projectDescription">Project Description</label>
                <textarea name="description" class="form-control" id="projectDescription" rows="4" placeholder="project description">{{ $project->description }}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">UpdateProject</button>
            </div>
            @include ('errors')
        </form>
        <hr>
        <form method="POST" action="/projects/{{ $project->id }}">
        @method('DELETE')
        @csrf
            <p>Delete your Project, you can't undo this</p>
            <div>
                <button type="submit"  class="btn btn-danger">Delete Project</button>
            </div>
        </form>
    </div>
@endsection
