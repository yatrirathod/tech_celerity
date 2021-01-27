<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use Response;
class accountController extends Controller
{
    public function getChartsData(){

        $chartdata = account::select('year','purchase','sale','profit')->get();
        $data['chart_data'] = $chartdata;
        return Response::json($data);
    }

    public function getDataPie(){

    	$pie_chart = account::select('year','profit')->get();

    	$data['pie'] = $pie_chart;
    	return ($pie_chart);
    }
}
