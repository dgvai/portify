<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\System\Inbox;
use App\Models\Utils\Download;
use App\Models\Utils\Visitor;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class HomeController extends Controller
{
    public function home()
    {
        Visitor::track(request()->ip(),'home');
        $this->generateSeo();
        $user = User::with('photo','projects','resume','services','titles','socials','skills','galleries')->first();
        return view('web.pages.home',['user' => $user]);
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string',
            'message' => 'required',
        ]);

        if($validator->fails()) 
        {
            return response()->json($validator->messages(), 200);
        }
        else 
        {
            Inbox::create($request->except('_token'));
            if(config('app.emailer')) {
                User::first()->notify(new NewContact);
            }
            return response()->json(['success' => true]);
        }
    }

    public function download()
    {
        Download::track(request()->ip());
        return response()->download(public_path('storage/user/resume/'.User::first()->resume->file));
    }

    private function generateSeo()
    {
        $user = User::first();
        SEOMeta::setTitle($user->full_name.' - Portfolio');
        SEOMeta::setDescription($user->data->bio);
        SEOMeta::setCanonical(route('home'));
        SEOMeta::addKeyword(explode(' ',$user->data->bio));

        OpenGraph::setDescription($user->data->bio);
        OpenGraph::setTitle($user->full_name.' - Portfolio');
        OpenGraph::setUrl(route('home'));
        OpenGraph::addImage($user->cover_photo);

        OpenGraph::addProperty('type', 'profile'); 
        OpenGraph::addProperty('profile:first_name', $user->first_name); 
        OpenGraph::addProperty('profile:last_name', $user->last_name); 

        JsonLd::setTitle($user->full_name.' - Portfolio');
        JsonLd::setDescription($user->data->bio);
        JsonLd::addImage($user->cover_photo);
    }
}
