<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.settings.user',['user' => auth()->user()]);
    }

    public function setUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'min:6|nullable',
            'password_confirm' => 'same:password|nullable',
        ]);

        $user = auth()->user();
        $user->email = $request->email;
        if($request->has('password'))
        {
            $user->password = Hash::make($request->password);
        }
        return $user->save() ? back()->with('success','Saved Changes!') : back()->with('info','Error!');
    }
}
