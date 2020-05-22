<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $langs = json_decode(file_get_contents(resource_path('lang/en.json')));
        return view('admin.settings.content',['langs' => $langs]);
    }

    public function saveLang(Request $request)
    {
        $langs = json_decode(file_get_contents(resource_path('lang/en.json')),true);
        foreach(array_keys($langs) as $key=>$value)
        {
            $new[$value] = $request->data[$key];
        }
        file_put_contents(resource_path('lang/en.json'),json_encode($new));
        return redirect()->back()->with('toast_success','Changes Saved!');
    }
}
