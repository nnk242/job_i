<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Views;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index() {
//        $today = Views::all()
//            ->groupBy(function($item){ return $item->updated_at->format('d-M-y'); });
        $views = Views::where(function($q) {
            $q->where([['updated_at', '<=', date("Y-m-d")],
                ['updated_at', '>=', date('Y-m-d',strtotime(date("Y-m-d")) - (7*3600*24))]
            ])
                ->orWhereNull('updated_at');
        })->get()->groupBy(function($item){ return $item->updated_at->format('d-m-y'); })->map(function ($row) {
            return $row->sum('total');
        });

        $test = "";
        $arr_views = array();
        $arr_days = array();
        for($i = 1; $i<=7; $i++) {
            $date = date('d-m-y',strtotime(date("Y-m-d")) - ((8-$i)*3600*24));
            $arr_days[$i-1] = $date;
            if(!isset($views[$date])) {
                $arr_views[$i-1] = 0;
            } else {
                $arr_views[$i-1] = $views[$date];
            }
        }


//        dd(date('Y-m-d',strtotime(date("Y-m-d")) - (7*3600*24)). $test);
//        date('d-m-y',strtotime(date("Y-m-d")) - (7*3600*24))

        return view('backends.dashboard.index', compact('arr_days', 'arr_views'));
    }
}
