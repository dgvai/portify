<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.gallery',['user' => auth()->user()]);
    }

    public function getPhoto(Request $request)
    {
        return new JsonResource(UserGallery::find($request->id));
    }

    public function getPhotos(Request $request)
    {
        return JsonResource::collection(UserGallery::all());
    }

    public function add(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);

        if($request->has('image'))
        {
            $filename = filename('gallery',$request->image->extension());
            thumbnail($request->image, public_path('storage/user/gallery'), $filename,600,400);
        }

        $b = auth()->user()->galleries()->create([
            'caption' => $request->caption,
            'image' => $filename,
        ]);

        return $b ? back()->with('toast_success','Added!') : back()->with('toast_error','Error adding!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);
        
        $gallery = UserGallery::find($request->id);

        if($request->has('image'))
        {
            unlink(public_path('storage/user/gallery').'/'.$gallery->image);
            $filename = filename('gallery',$request->image->extension());
            thumbnail($request->image, public_path('storage/user/gallery'), $filename,600,400);
            $gallery->image = $filename;
        }

        $gallery->caption = $request->caption;
        $b = $gallery->save();

        return $b ? back()->with('toast_success','Updated!') : back()->with('toast_error','Error updating!');
    }

    public function delete(Request $request)
    {
        $vanished = UserGallery::vanish($request->id);
        return $vanished ? ['success' => true, 'msg' => 'Deleted!'] : ['success' => false, 'msg' => 'Error deleting!'];
    }
}
