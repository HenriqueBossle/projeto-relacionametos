<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projects;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
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
            'value' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Projects::findOrFail($id);
        $project->update($request->validate([
        'name' => 'required|string|max:255',
        'value' => 'required|numeric',
        'client_id' => 'required|exists:clients,id',
    ]));
        return redirect('projects.index')->with('success', 'projects updated successfully.');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect('projects')->with('success', 'project deleted successfully.');
    }
}
