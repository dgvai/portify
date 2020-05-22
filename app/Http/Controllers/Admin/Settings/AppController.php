<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AppController extends Controller
{
    public function index()
    {
        $timezones = json_decode(file_get_contents(public_path('datasets/timezone.json')));
        return view('admin.settings.app',['tzs' => $timezones]);
    }

    public function setConfig(Request $request)
    {
        $b = updateEnv($request->except('_token'));
        if($b)
        {
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
        }
        return redirect()->back()->with('toast_success','Updated!');
    }
}
