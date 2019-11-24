@extends('layout')

@section('content')
<h1>{{ auth()->user()->name }} Projects</h1>
<div>
    @foreach ($projects as $project)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title"><a href="/projects/{{ $project->id}}">{{ $project->title }}</a></h4>
                <p class="card-text">{{ $project->description }}</p>
            </div>
        </div>
    @endforeach
</div>

@endsection
