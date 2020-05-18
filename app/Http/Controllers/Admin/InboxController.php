<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\System\Inbox;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InboxController extends Controller
{
    public function index()
    {
        $inbox['new'] = Inbox::new()->count();
        $inbox['all'] = Inbox::all()->count();

        return view('admin.pages.inbox',['inbox' => (object)$inbox]);
    }

    public function getInbox(Request $request)
    {
        $inbox = Inbox::find($request->id);
        $inbox->makeSeen();
        return new JsonResource($inbox);
    }

    public function getInboxes(Request $request)
    {
        if($request->has('start') && $request->has('end'))
        {
            $start = $request->start;
            $end = $request->end;
        }
        else 
        {
           $start =  Carbon::now()->subDays(6)->format('Y-m-d');
           $end = Carbon::now()->format('Y-m-d');
        }

        return JsonResource::collection(Inbox::range($start,$end)->get());
    }
}
