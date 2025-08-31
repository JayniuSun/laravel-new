<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->orderBy('due_date', 'asc')->get();
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
            'image' => 'required|file|image'
        ]);

        $imagePath = $request->file('image')->store('project_images', 'public');

        auth()->user()->projects()->create(array_merge($request->all(), ['image' => $imagePath]));


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
    
}
