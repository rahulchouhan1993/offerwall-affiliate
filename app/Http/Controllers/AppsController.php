<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Template;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    public function index(){
        $pageTitle = 'Apps';
        $allApps = App::where('affiliateId',auth()->user()->id)->get();
        return view('apps.index',compact('pageTitle','allApps'));
    }

    public function add(Request $request, $id =null){
        $pageTitle = 'Apps';
        if($id>0){
            $appData = App::find($id);
        }else{
            $appData = new App();
        }
        
        if($request->isMethod('POST')){
            if($id==null){
                $appData->appId = rand();
                $appData->affiliateId = auth()->user()->id;
                $appData->status = 0;
            }
            $appData->appName = $request->appname;
            $appData->appUrl = $request->appurl;
            $appData->currencyName = $request->currencyname;
            $appData->currencyNameP = $request->currencynamep;
            $appData->currencyValue = $request->currencyvalue;
            $appData->rounding = $request->rounding;
            $appData->postback = $request->postback;
            if($appData->save()){
                if($id>0){
                    return redirect()->route('apps.index')->with('success', 'App updated successfully!!');
                }else{
                    $defaultTemplate = Template::find(1);
                    $templateColor = new Template();
                    $templateColor->user_id = auth()->user()->id;
                    $templateColor->app_id = $appData->id;
                    $templateColor->bodyBg = $defaultTemplate->bodyBg;
                    $templateColor->headerTextColor = $defaultTemplate->headerTextColor;
                    $templateColor->headerButtonBg = $defaultTemplate->headerButtonBg;
                    $templateColor->headerButtonColor = $defaultTemplate->headerButtonColor;
                    $templateColor->NotificationBg = $defaultTemplate->NotificationBg;
                    $templateColor->notificationText = $defaultTemplate->notificationText;
                    $templateColor->offerBg = $defaultTemplate->offerBg;
                    $templateColor->offerBgInner = $defaultTemplate->offerBgInner;
                    $templateColor->offerText = $defaultTemplate->offerText;
                    $templateColor->offerInfoBg = $defaultTemplate->offerInfoBg;
                    $templateColor->offerInfoText = $defaultTemplate->offerInfoText;
                    $templateColor->offerInfoBorder = $defaultTemplate->offerInfoBorder;
                    $templateColor->offerButtonBg = $defaultTemplate->offerButtonBg;
                    $templateColor->offerButtonText = $defaultTemplate->offerButtonText;
                    $templateColor->footerText = $defaultTemplate->footerText;
                    $templateColor->save();
                    return redirect()->route('apps.index')->with('success', 'App added successfully!!');
                }
            }else{
                return redirect()->route('apps.index')->with('error', 'Sonething went wrong, please try again.');
            }
        }
        return view('apps.add',compact('pageTitle','appData','id'));
    }

    public function integration($id){
        $pageTitle = 'Integration';
        $appDetail = App::find($id);
        return view('apps.integration',compact('pageTitle','appDetail'));
    }

    public function updateStatus($id){
        $appDetail = App::find($id);
        $appDetail->status = ($appDetail->status==1) ? '0' : '1';
        $appDetail->save();

        return redirect()->back()->with('success','Status updated');
    }

    public function template(Request $request, $id){
        $appDetail = App::where('affiliateId',auth()->user()->id)->where('id',$id)->first();
        if(empty($appDetail)){
            return redirect()->route('dashboard.index')->with('error','Not valid request');
        }
        $pageTitle = $appDetail->appName.' Template';
        $templateColor = Template::where('app_id',$id)->first();
        if($request->isMethod('post')){
            $templateColor->bodyBg = $request->bodyBg;
            $templateColor->headerTextColor = $request->headerTextColor;
            $templateColor->headerButtonBg = $request->headerButtonBg;
            $templateColor->headerButtonColor = $request->headerButtonColor;
            $templateColor->NotificationBg = $request->NotificationBg;
            $templateColor->notificationText = $request->notificationText;
            $templateColor->offerBg = $request->offerBg;
            $templateColor->offerBgInner = $request->offerBgInner;
            $templateColor->offerText = $request->offerText;
            $templateColor->offerInfoBg = $request->offerInfoBg;
            $templateColor->offerInfoText = $request->offerInfoText;
            $templateColor->offerInfoBorder = $request->offerInfoBorder;
            $templateColor->offerButtonBg = $request->offerButtonBg;
            $templateColor->offerButtonText = $request->offerButtonText;
            $templateColor->footerText = $request->footerText;
            $templateColor->save();
            return redirect()->back()->with('success','Template updated successfully');
        }
        return view('apps.template',compact('pageTitle','templateColor','appDetail'));
    }

    public function documentations(){
        $pageTitle = 'Documentations';
        return view('apps.documentations',compact('pageTitle'));
    }

    public function testPostback(){
        $pageTitle = 'Test-Postback';
        return view('apps.test-postback',compact('pageTitle'));
    }
}
