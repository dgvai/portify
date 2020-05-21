<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserProject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.project',['user' => auth()->user()]);
    }

    public function getProject(Request $request)
    {
        return new JsonResource(UserProject::find($request->id));
    }

    public function getProjects(Request $request)
    {
        return JsonResource::collection(auth()->user()->projects->sortByDesc('id'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
            'description' => 'required',
            'link' => 'required'
        ]);

        if($request->has('image'))
        {
            $filename = filename('project',$request->image->extension());
            thumbnail($request->image,public_path('storage/user/projects'),$filename,600,400);
        }
        $b = auth()->user()->projects()->create([
            'title' => $request->title,
            'image' => $filename,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        if($request->has('has_blog'))
        {
            $b->has_blog = true;
            $b->blog = $request->blog;
            $b->save();
        }

        return $b ? back()->with('toast_success','Created!') : back()->with('toast_error','Error creating!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'link' => 'required'
        ]);

        $project = UserProject::find($request->id);

        if($request->has('image'))
        {
            unlink(public_path('storage/user/projects/'.$project->image));
            $filename = filename('project',$request->image->extension());
            thumbnail($request->image,public_path('storage/user/projects'),$filename,600,400);
            $project->image = $filename;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->has_blog = $request->has('has_blog');

        if($request->has('has_blog'))
        {
            $project->blog = $request->blog;
        }

        return $project->save() ? back()->with('toast_success','Updated!') : back()->with('toast_error','Error updating!');
    }

    public function delete(Request $request)
    {
        $vanished = UserProject::vanish($request->id);
        return $vanished ? ['success' => true, 'msg' => 'Deleted!'] : ['success' => false, 'msg' => 'Error deleting!'];
    }
}
