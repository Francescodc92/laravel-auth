<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;

//model
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();

        $preview_path = null;
        if (isset($formData['preview'])) {
            $preview_path = Storage::put('uploads', $formData['preview']);
        }



        $project = Project::create([
            'title'=>$formData['title'],
            'preview'=>$preview_path,
            'collaborators'=>$formData['collaborators'],
            'description'=>$formData['description'],
        ]);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();

        $preview_path = $project->preview;
        if(isset( $formData['preview'])){

            if($project->preview){
                Storage::delete($project->preview);
            }

            $preview_path = Storage::put('uploads', $formData['preview']);
        }
        else if (isset($formData['remove_preview_img'])){
            if($project->preview){
                Storage::delete($project->preview);
            }
            $preview_path = null;
        }


        $project->update([
            'title'=>$formData['title'],
            'preview'=>$preview_path,
            'collaborators'=>$formData['collaborators'],
            'description'=>$formData['description'],
        ]);
        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
