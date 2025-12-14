<?php

namespace App\Http\Controllers;
use App\Models\Project_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectTypesController extends Controller
{
    public function index()
    {
        $project_types = auth()->user()->project_types()->orderBy('types_name', 'asc')->get();
        return view('project_types.index', compact('project_types'));
    }
    public function create()
    {
        return view('project_types.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'types_name' => 'required|string|max:255',
        ]);
        
        auth()->user()->project_types()->create($request->all());

        return redirect()->route('project_types.index')->with('success', 'Category created successfully!');
    }

    public function show($id)
    {
        $project_types = Project_type::findOrFail($id);
        return view('project_types.show', compact('project_types'));
    }

    public function edit($id)
    {
        $project_types = Project_type::findOrFail($id);
        return view('project_types.edit', compact('project_types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'types_name' => 'required|string|max:255'
        ]);

        $project_types = auth()->user()->project_types()->findOrFail($id);
        $project_types->update($request->all());

        return redirect()->route('project_types.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $project_types = Project_type::findOrFail($id);
        $project_types->delete();

        return redirect()->route('project_types.index')->with('success', 'Category deleted successfully!');
    }

    public function deleteAll()
    {
        // uncheck foreign key constraint
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Project_type::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        return redirect()->route('project_types.index')->with('success', 'All project_types deleted successfully');
        
    }
}
