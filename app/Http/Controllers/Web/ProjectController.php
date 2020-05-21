<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Auth\UserProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show(UserProject $project, $slug)
    {
        $user = User::first();
        return view('web.pages.project',['project' => $project, 'user' => $user]);
    }
}
