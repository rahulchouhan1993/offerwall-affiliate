<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    public function index(){
        return view('apps.index');
    }

    public function add(){
        return view('apps.add');
    }

    public function testPostback(){
        return view('apps.test-postback');
    }

    public function integration(){
        return view('apps.integration');
    }
}
