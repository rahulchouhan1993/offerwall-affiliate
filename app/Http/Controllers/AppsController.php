<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    public function index(){
        $pageTitle = 'Apps';
        return view('apps.index',compact('pageTitle'));
    }

    public function add(){
        $pageTitle = 'Apps';
        return view('apps.add',compact('pageTitle'));
    }

    public function testPostback(){
        $pageTitle = 'Test Postbacks';
        return view('apps.test-postback',compact('pageTitle'));
    }

    public function integration(){
        $pageTitle = 'Integration';
        return view('apps.integration',compact('pageTitle'));
    }
}
