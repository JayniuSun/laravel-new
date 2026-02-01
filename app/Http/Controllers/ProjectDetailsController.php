<?php

namespace App\Http\Controllers;
use App\Models\Project_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;


class ProjectDetailsController extends Controller
{
    public function index()
    {
        $project_details = auth()->user()->project_details()->orderBy('details_description', 'asc')->get();
        return view('project_details.index', compact('project_details'));
    }
    public function create()
    {
        $projects = Project::all();
        return view('project_details.create', compact('projects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'details_description' => 'required|string|max:255',
        ]);
        
        auth()->user()->project_details()->create($request->all());

        return redirect()->route('project_details.index')->with('success', 'Category created successfully!');
    }

    public function show($id)
    {
        $project_details = Project_detail::findOrFail($id);
        return view('project_details.show', compact('project_details'));
    }

    public function edit($id)
    {
        $project_details = Project_detail::findOrFail($id);
        return view('project_details.edit', compact('project_details'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'details_description' => 'required|string|max:255'
        ]);

        $project_details = auth()->user()->project_details()->findOrFail($id);
        $project_details->update($request->all());

        return redirect()->route('project_details.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $project_details = Project_detail::findOrFail($id);
        $project_details->delete();

        return redirect()->route('project_details.index')->with('success', 'Category deleted successfully!');
    }

    public function deleteAll()
    {
        // uncheck foreign key constraint
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Project_detail::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        return redirect()->route('project_details.index')->with('success', 'All project_details deleted successfully');
        
    }
}
