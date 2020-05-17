<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceController extends Controller
{
    public function index()
    {
        $icons = json_decode(file_get_contents(public_path('datasets/s2-fa-all-icon.json')));
        return view('admin.portfolio.service',['icons' => $icons, 'user' => auth()->user()]);
    }

    public function getService(Request $request)
    {
        return new JsonResource(UserService::find($request->id));
    }

    public function getServices(Request $request)
    {
        return JsonResource::collection(UserService::all());
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:20',
            'icon' => 'required',
            'description' => 'required'
        ]);

        $c = auth()->user()->services()->create($request->all());
        return $c ? back()->with('toast_success','Added!') : back()->with('toast_error','Error adding!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:20',
            'icon' => 'required',
            'description' => 'required'
        ]);

        $c = UserService::where('id',$request->id)->update($request->except(['_token','id']));

        return $c ? back()->with('toast_success','Updated!') : back()->with('toast_error','Error updating!');
    }

    public function delete(Request $request)
    {
        $vanished = UserService::vanish($request->id);
        return $vanished ? ['success' => true, 'msg' => 'Deleted!'] : ['success' => false, 'msg' => 'Error deleting!'];
    }
}
