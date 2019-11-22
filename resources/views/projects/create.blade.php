
@extends('layout')

@section('content')
    <h2>Create a new Project</h2>

    <form method="POST" action="/projects" class="col-md-8">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="projectTitle">Project Title</label>
            <input type="text" class="form-control" id="projectTitle" name="title" placeholder="project title" value="{{ old('title')}}">
        </div>
        <div class="form-group">
            <label for="projectDescription">Project Description</label>
            <textarea name="description" class="form-control" id="projectDescription" rows="4" placeholder="project description"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </div>

        @include ('errors')
    </form>
@endsection
