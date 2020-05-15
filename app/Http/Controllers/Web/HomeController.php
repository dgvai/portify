<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Utils\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        Visitor::track(request()->ip(),'home');
        return 'home';
    }
}
