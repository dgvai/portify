<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

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
            'photo' => 'required|mimes:jpg,jpeg,png,svg'
        ]);
        $user = auth()->user();
        if($request->hasFile('photo')) 
        {
            if($user->photo->cover != 'default-user.jpg')
            {
                unlink(public_path('storage/user/cover/'.$user->photo->cover));
            }
            
            $filename = filename('cover',$request->photo->extension());
            resize($request->photo,public_path('storage/user/cover'),$filename,1000);
            $user->photo->cover = $filename;
            $user->photo->save();
            return back()->with('toast_success',__('Updated!'));
        }
    }
}
