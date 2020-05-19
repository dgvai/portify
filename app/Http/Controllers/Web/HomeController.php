<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Utils\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        Visitor::track(request()->ip(),'home');
        $user = User::first();
        return view('web.pages.home',['user' => $user]);
    }
}
