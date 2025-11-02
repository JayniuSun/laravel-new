<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = auth()->user()->projects()->orderBy('due_date', 'asc')->get();
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        auth()->user()->projects()->create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function show($id)
    {
        $project = auth()->user()->projects()->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = auth()->user()->projects()->findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $project = auth()->user()->projects()->findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        $project = auth()->user()->projects()->findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }

    public function deleteAll()
    {
        Project::truncate();
        return redirect()->route('projects.index')->with('success', 'All projects deleted successfully');
        
    }
}
