<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserSocials;
use App\Models\System\Configuration;
use App\Models\Utils\Loader;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteController extends Controller
{
    public function index()
    {
        $icons = json_decode(file_get_contents(public_path('datasets/s2-fa-all-icon.json')));
        $bgs = array_diff(scandir(public_path('storage/app/patterns')),array('..', '.'));
        $loaders = array_diff(scandir(public_path('storage/app/loaders')),array('..', '.'));
        return view('admin.settings.site',['icons' => $icons,'bgs' => $bgs, 'loaders' => $loaders]);
    }

    public function getSocial(Request $request)
    {
        return new JsonResource(UserSocials::find($request->id));
    }

    public function getSocials(Request $request)
    {
        return JsonResource::collection(UserSocials::all());
    }

    public function savePrimarySetting(Request $request)
    {
        $request->validate([
            'favicon' => 'mimes:ico|nullable'
        ]);

        if($request->has('primary'))
        {
            Configuration::set('primary_color',$request->primary);

            if($request->hasFile('favicon'))
            {
                $request->favicon->move(public_path('favicons'),'favicon.ico');
            }

            return back()->with('toast_success','Changed!');
        }
        else 
        {
            abort(404);
        }
    }

    public function addSocial(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'icon' => 'required',
            'url' => 'required'
        ]);

        auth()->user()->socials()->create([
            'name' => $request->name,
            'icon' => $request->icon,
            'url' => $request->url
        ]);
        return back()->with('toast_success','Added!');
    }

    public function editSocial(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'icon' => 'required',
            'url' => 'required'
        ]);
        UserSocials::where('id', $request->id)->update($request->except(['_token','id']));
        return back()->with('toast_success','Updated!');
    }

    public function deleteSocial(Request $request)
    {
        $vanished = UserSocials::vanish($request->id);
        return $vanished ? ['success' => true, 'msg' => 'Deleted!'] : ['success' => false, 'msg' => 'Error deleting!'];
    }

    public function setIntroBg(Request $request)
    {
        return Configuration::set('selected_bg',$request->bg);
    }

    public function setLoader(Request $request)
    {
        return Configuration::set('selected_loader',explode('.',$request->loader)[0]);
    }


}
