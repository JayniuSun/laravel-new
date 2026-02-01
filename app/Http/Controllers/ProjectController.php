<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Project_type;

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
        // project type
        $project_types = Project_type::all();
        return view('projects.create', compact('project_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'project_type_id' => 'required|integer'
        ]);

        $imagePath = $request->file('image')->store('project_images', 'public');

        auth()->user()->projects()->create(array_merge($request->all(), ['image' => $imagePath]));


        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function show($id)
    {
        $project = auth()->user()->projects()->findOrFail($id);
        $project->load('project_details');
        $project->load('project_types');
        $project->load('user');
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
            'image' => 'required|file|image'
        ]);

        $project = auth()->user()->projects()->findOrFail($id);
        $imagePath = $request->file('image')->store('project_images', 'public');
        $project->update(array_merge($request->all(), ['image' => $imagePath]));


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
