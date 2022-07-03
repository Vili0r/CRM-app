<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tenant;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['tenant'])
            ->withCount('tasks')
            ->paginate(20);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenants = Tenant::all();
        $projects = Project::all();

        return view('projects.create', compact('tenants', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());

        //$tenant = Tenant::find($request->tenant_id);

        return redirect()->route('tenant.projects.index')->with('success', 'Project successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project->loadMissing('tasks');
        
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $tenants = Tenant::all();

        return view('projects.edit', compact('project', 'tenants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectsRequest  $request
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('tenant.projects.index')->with('success', 'Project updated successfully!');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('tenant.projects.index')->with('error', 'Project deleted successfully!');
    }
}
