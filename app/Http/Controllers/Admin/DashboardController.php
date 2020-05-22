<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utils\Download;
use App\Models\Utils\Visitor;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function getVisitorLog()
    {
        $period = CarbonPeriod::since(Carbon::now()->subDays(29))->days(1)->until(Carbon::now());
        $dates = [];
        $visitors = [
            'label' => 'visitors',
            'borderColor' =>  "#ffffff",
            'fill' => false,
            'data' => []
        ];
        foreach($period as $day)
        {
            array_push($dates,$day->format('M d'));
            $visitor = Visitor::whereDate('created_at',$day->format('Y-m-d'))->count();
            array_push($visitors['data'],$visitor);
        }

        $data = [
            'labels' => $dates,
            'datasets' => [
                $visitors
            ],
        ];

        return response()->json($data);
    }

    public function getDownloadLog()
    {
        $period = CarbonPeriod::since(Carbon::now()->subDays(29))->days(1)->until(Carbon::now());
        $dates = [];
        $dloads = [
            'label' => 'downloads',
            'borderColor' =>  "#ffffff",
            'fill' => false,
            'data' => []
        ];
        foreach($period as $day)
        {
            array_push($dates,$day->format('M d'));
            $dload = Download::whereDate('created_at',$day->format('Y-m-d'))->count();
            array_push($dloads['data'],$dload);
        }

        $data = [
            'labels' => $dates,
            'datasets' => [
                $dloads
            ],
        ];

        return response()->json($data);
    }
}
