<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    public function index()
    {
        $project = Projects::all();
        return view('projects.index', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Projects::create($request->all());
        return redirect('projects')->with('success', 'project created successfully.');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Projects::findOrFail($id);
        $project->update($request->all());
        return redirect('projects')->with('success', 'projects updated successfully.');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect('projects')->with('success', 'project deleted successfully.');
    }
}
