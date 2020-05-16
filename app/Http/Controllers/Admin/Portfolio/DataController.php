<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.data',['user' => auth()->user()]);
    }

    public function updateData(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'current_work' => 'required|max:100',
            'graduated' => 'required|max:100',
            'bio' => 'required|max:600',
        ]);
        $user_data = auth()->user()->data;
        $user_data->update($request->all());
        return back()->with('toast_success',__('Updated!'));
    }

    public function updateCover(Request $request)
    {
        $request->validate([
            'photo' => 'required|mime:jpg,jpeg,png,svg'
        ]);
        $user = auth()->user();
        if($user->photo->cover != 'default-user.jpg')
        {
            unlink(public_path('storage/user/cover/'.$user->photo->cover));
        }
        // filename helpers etc
    }
}
