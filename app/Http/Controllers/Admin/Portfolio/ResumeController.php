<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\System\Configuration;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.resume',['user' => auth()->user()]);
    }

    public function toggle(Request $request)
    {
        Configuration::set('enable_resume',!Configuration::get('enable_resume'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf'
        ]);
        if($request->has('resume'))
        {
            $filename = filename('resume',$request->resume->extension());
            $request->resume->storeAs('user/resume',$filename,'public');
            $c = auth()->user()->resume()->updateOrCreate(['id' => 1],['file' => $filename]);
            return $c ? back()->with('toast_success','Added!') : back()->with('toast_error','Error addinng!');
        }
    }
}
