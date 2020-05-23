<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Auth\UserProject;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function show(UserProject $project, $slug)
    {
        $user = User::first();
        $this->generateSeo($project);
        return view('web.pages.project',['project' => $project, 'user' => $user]);
    }
    
    private function generateSeo($project)
    {
        $user = User::first();
        SEOMeta::setTitle($project->title .' - '.$user->full_name);
        SEOMeta::setDescription($project->description);
        SEOMeta::setCanonical(request()->url());
        SEOMeta::addKeyword(explode(' ',$project->description));

        OpenGraph::setDescription($project->description);
        OpenGraph::setTitle($project->title .' - '.$user->full_name);
        OpenGraph::setUrl(request()->url());
        OpenGraph::addImage($project->image_url);
        OpenGraph::addProperty('type', 'article');    
        OpenGraph::addProperty('article:published_time', Carbon::parse($project->created_at)->toIso8601String());    
        OpenGraph::addProperty('article:modified_time', Carbon::parse($project->updated_at)->toIso8601String());    
        OpenGraph::addProperty('article:author:first_name', $user->data->first_name);    
        OpenGraph::addProperty('article:author:last_name', $user->data->last_name);    

        JsonLd::setTitle($project->title .' - '.$user->full_name);
        JsonLd::setDescription($project->description);
        JsonLd::addImage($project->image_url);
        JsonLd::setType('Article');
        JsonLd::addValue('author',$user->full_name);
        JsonLd::addValue('datePublished',$project->created_at);
        JsonLd::addValue('dateCreated',$project->created_at);
        JsonLd::addValue('dateModified',$project->updated_at);
        JsonLd::addValue('description',$project->description);
    }
}
