<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function statistics(){
        $pageTitle = 'Statistics';
        return view('reports.statistics',compact('pageTitle'));
    }

    public function conversions(){
        $pageTitle = 'Conversions';
        return view('reports.conversions',compact('pageTitle'));
    }

    public function postbacks(){
        $pageTitle = 'Postbacks';
        return view('reports.postbacks',compact('pageTitle'));
    }

    public function exported(){
        $pageTitle = 'Exported Reports';
        return view('reports.exported',compact('pageTitle'));
    }
}
