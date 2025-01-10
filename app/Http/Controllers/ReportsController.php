<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function statistics(){
        return view('reports.statistics');
    }

    public function conversions(){
        return view('reports.conversions');
    }

    public function postbacks(){
        return view('reports.postbacks');
    }

    public function exported(){
        return view('reports.exported');
    }
}
