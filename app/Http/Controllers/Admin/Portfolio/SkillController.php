<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.skill',['user' => auth()->user()]);
    }

    public function getSkill(Request $request)
    {
        return new JsonResource(UserSkill::find($request->id));
    }

    public function getSkills(Request $request)
    {
        return JsonResource::collection(UserSkill::all());
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'percent' => 'required',
        ]);

        $c = auth()->user()->skills()->create($request->all());
        return $c ? back()->with('toast_success','Added!') : back()->with('toast_error','Error adding!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'percent' => 'required',
        ]);

        $c = UserSkill::where('id',$request->id)->update($request->except(['_token','id']));

        return $c ? back()->with('toast_success','Updated!') : back()->with('toast_error','Error updating!');
    }

    public function delete(Request $request)
    {
        $vanished = UserSkill::vanish($request->id);
        return $vanished ? ['success' => true, 'msg' => 'Deleted!'] : ['success' => false, 'msg' => 'Error deleting!'];
    }
}
