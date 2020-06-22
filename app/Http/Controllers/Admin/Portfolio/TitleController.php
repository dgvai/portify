<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserTitle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TitleController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.title',['user' => auth()->user()]);
    }

    public function getTitle(Request $request)
    {
        return new JsonResource(UserTitle::find($request->id));
    }

    public function getTitles(Request $request)
    {
        return JsonResource::collection(UserTitle::all());
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
        ]);

        $c = auth()->user()->titles()->create($request->only('title'));
        return $c ? back()->with('toast_success','Added!') : back()->with('toast_error','Error adding!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
        ]);

        $c = UserTitle::where('id',$request->id)->update($request->except(['_token','id']));

        return $c ? back()->with('toast_success','Updated!') : back()->with('toast_error','Error updating!');
    }

    public function delete(Request $request)
    {
        $vanished = UserTitle::vanish($request->id);
        return $vanished ? ['success' => true, 'msg' => 'Deleted!'] : ['success' => false, 'msg' => 'Error deleting!'];
    }
}
