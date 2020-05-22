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

class HomeController extends Controller
{
    public function home()
    {
        Visitor::track(request()->ip(),'home');
        $user = User::first();
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
}
