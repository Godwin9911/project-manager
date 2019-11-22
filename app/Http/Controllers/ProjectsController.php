<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->owner_id = auth()->id();
        $project->save();

        // $validatedAttr['owner_id'] = auth()->id();
        // dd($validatedAttr);
        // Project::create($validatedAttr);
        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attr =request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
        $project->update($attr);
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }

    public function show(Project $project)
    {
        abort_if($project->owner_id !== auth()->id(), 403);
        return view('projects.show', compact('project'));
    }
}
