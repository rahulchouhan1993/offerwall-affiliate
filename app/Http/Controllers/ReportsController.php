<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\App;

class ReportsController extends Controller
{
    public function statistics(Request $request){
        $pageTitle = 'Statistics';
        $allAffiliatesApp = App::where('affiliateId',auth()->user()->id)->get();
        $completeDate = '';
        if($request->isMethod('GET') && !empty($request->range)){
            $completeDate = $request->range;
            $seperateDate = explode('-',$request->range);
            $seperateDate[0] = date('Y-m-d',strtotime($seperateDate[0]));
            $seperateDate[1] = date('Y-m-d',strtotime($seperateDate[1]));
        }
        
        $perPage = 500;
        $allStatistics = [];
        $recordGroupBy = $request->groupBy ?? 'hour';
        $filterBy = $request->filterBy ?? 'hour';
        $filterByCountry = $request['filterIn']['country'][0] ?? '';
        $filterByDevice = $request['filterIn']['devices'][0] ?? '';
        $filterByOs = $request['filterIn']['os'][0] ?? '';
        $filterByOffer = $request['filterIn']['offer'][0] ?? '';
        $startDate = $seperateDate[0] ?? date('Y-m-d');
        $endDate = $seperateDate[1] ?? date('Y-m-d');
        $filterByText =  $request['filterInValue'];
        $filterByValue =  $request['filterIn'];
        $filterByAffApp =  $request['appid'];
        if(!empty($recordGroupBy) && !empty($startDate) && !empty($endDate)){
            $queryString = http_build_query([
                'filter[date_from]' => $startDate ?? '2020-01-01',
                'filter[date_to]' => $endDate ?? date('Y-m-d'),
                'filter[partner]' => 27,
                'filter[country]' => $filterByCountry,
                //'filter[device]' => $filterByDevice,
                'filter[os]' => $filterByOs,
                'filter[offer]' => $filterByOffer,
                'page' => $request->page ?? '1',
                'limit' => $perPage,
            ]);
            $url = env('AFFISE_API_END') . "stats/custom?slice[]={$recordGroupBy}&".$queryString;
            $response = HTTP::withHeaders([
                'API-Key' => env('AFFISE_API_KEY'),
            ])->get($url);
            
            if ($response->successful()) {
                $allStatistics = $response->json();
            }
        }
        
        return view('reports.statistics',compact('allAffiliatesApp','filterByAffApp','pageTitle','allStatistics','recordGroupBy','completeDate','filterByCountry','filterByDevice','filterByOs','filterByOffer','filterBy','filterByText','filterByValue'));
    }

    public function conversions(Request $request){
        $pageTitle = 'Conversions';
        $allAffiliatesApp = App::where('affiliateId',auth()->user()->id)->get();
        $allCountry = Country::get();
        $filterOptions = [
            'startDate' => '',
            'endDate' => '',
            'completeDate' => $request->range ?? '',
            'country' => $request->country ?? '',
            'offer' => $request->offer ?? '',
            'os' => $request->os ?? '',
            'goal' => $request->goal ?? '',
            'smartLink' => $request->smartlink ?? '',
            'status' => $request->status ?? '',
            'filterByAffApp' => $request->appid ?? '',
        ];
        if($request->isMethod('GET') && !empty($request->range)){
            $completeDate = $request->range;
            $seperateDate = explode('-',$request->range);
            $filterOptions['startDate'] = date('Y-m-d',strtotime($seperateDate[0]));
            $filterOptions['endDate'] = date('Y-m-d',strtotime($seperateDate[1]));
        }
       
        $perPage = 25;
        $allConversions = [];
        $currentPage = NULL;
        $totalCount = NULL;
        $prevPage = NULL;
        $nextPage = NULL;

        $params = [
            'date_from' => $filterOptions['startDate'],
            'date_to' => $filterOptions['endDate'],
            'partner[]' => 27,
            'offer[]' => $filterOptions['offer'],
            'os' => $filterOptions['os'],
            'goal' => $filterOptions['goal'],
            'smart_id' => $filterOptions['smartLink'],
            'page' => isset($request->page) ? $request->page : '1',
            'limit' => $perPage,
        ];
        
        if (!empty($filterOptions['country'])) {
            $params['country[]'] = $filterOptions['country'];
        }
        
        if (!empty($filterOptions['status'])) {
            $params['status[]'] = $filterOptions['status'];
        }
        
        // Build the query string
        $queryString = http_build_query($params);

        $url = env('AFFISE_API_END') . "stats/conversions?".$queryString;
        $response = HTTP::withHeaders([
            'API-Key' => env('AFFISE_API_KEY'),
        ])->get($url);
       
        if ($response->successful()) {
            $allConversions = $response->json();
            $pagination = $allConversions['pagination'] ?? []; 
            $currentPage = $pagination['page'] ?? 1; 
            $totalCount = $pagination['total_count'] ?? 0;
            $prevPage = $pagination['prev_page'] ?? null;
            $nextPage = $pagination['next_page'] ?? null;
        }

        $url = env('AFFISE_API_END') . "offers";
        $response = HTTP::withHeaders([
            'API-Key' => env('AFFISE_API_KEY'),
        ])->get($url);
        
        if ($response->successful()) {
            $allOffers = $response->json();
        }
        $urlForPagination = $request->all();
        $conversionsStatus = '';
        return view('reports.conversions',compact('allAffiliatesApp','pageTitle','allConversions','currentPage','totalCount','prevPage','nextPage','perPage','allCountry','allOffers','filterOptions','conversionsStatus','params','urlForPagination'));
    }

    public function postbacks(Request $request){
        $pageTitle = 'Postbacks';
        $allAffiliatesApp = App::where('affiliateId',auth()->user()->id)->get();
        $filterOptions = [
            'startDate' => '',
            'endDate' => '',
            'completeDate' => $request->range ?? '',
            'offer' => $request->offer ?? '',
            'goal' => $request->goal ?? '',
            'status' => $request->status ?? '',
        ];
        if($request->isMethod('GET') && !empty($request->range)){
            $completeDate = $request->range;
            $seperateDate = explode('-',$request->range);
            $filterOptions['startDate'] = date('Y-m-d',strtotime($seperateDate[0]));
            $filterOptions['endDate'] = date('Y-m-d',strtotime($seperateDate[1]));
        }
       
        $perPage = 25;
        $allPostbacks = [];
        $currentPage = NULL;
        $totalCount = NULL;
        $prevPage = NULL;
        $nextPage = NULL;

        $params = [
            'date_from' => $filterOptions['startDate'],
            'date_to' => $filterOptions['endDate'],
            'partner[]' => 6,
            'page' => isset($request->page) ? $request->page : '1',
            'limit' => $perPage,
        ];
        
        if (!empty($filterOptions['offer'])) {
            $params['offer[]'] = $filterOptions['offer'];
        }
        
        if (!empty($filterOptions['goal'])) {
            $params['goal'] = $filterOptions['goal'];
        }

        if (!empty($filterOptions['status'])) {
            $params['status'] = $filterOptions['status'];
        }
        
        // Build the query string
        $queryString = http_build_query($params);

        $url = env('AFFISE_API_END') . "stats/affiliatepostbacks?".$queryString;
        $response = HTTP::withHeaders([
            'API-Key' => env('AFFISE_API_KEY'),
        ])->get($url);
        
        if ($response->successful()) {
            $allPostbacks = $response->json();
            $pagination = $allPostbacks['pagination'] ?? []; 
            $currentPage = $pagination['page'] ?? 1; 
            $totalCount = $pagination['total_count'] ?? 0;
            $prevPage = $pagination['prev_page'] ?? null;
            $nextPage = $pagination['next_page'] ?? null;
        }
        $urlForPagination = $request->all();

        $url = env('AFFISE_API_END') . "offers";
        $response = HTTP::withHeaders([
            'API-Key' => env('AFFISE_API_KEY'),
        ])->get($url);
        $allOffers = [];
        if ($response->successful()) {
            $allOffers = $response->json();
        }
       
        return view('reports.postbacks',compact('pageTitle','allPostbacks','currentPage','totalCount','prevPage','nextPage','perPage','urlForPagination','allOffers','allAffiliatesApp'));
    }

    public function exported(){
        $pageTitle = 'Exported Reports';
        return view('reports.exported',compact('pageTitle'));
    }

    public function filterGroup($filterBy = null){
        $returnOptions = '';
        if($filterBy=='country'){
            $allCountry = Country::get();
            foreach($allCountry as $country){
                $returnOptions.='<option value="'.$country->iso.'">'.$country->nicename.'</option>';
            }
        }elseif($filterBy=='devices'){
            $url = 'https://api-makamobile.affise.com/3.1/devices';
            $response = HTTP::withHeaders([
                'API-Key' => env('AFFISE_API_KEY'),
            ])->get($url);
            
            if ($response->successful()) {
                $allDevices = $response->json();
                foreach($allDevices['types'] as $devices){
                    $returnOptions.='<option value="'.$devices.'">'.ucfirst($devices).'</option>';
                }
            }
        }elseif($filterBy=='os'){
            $returnOptions.='<option value="Windows">Windows</option><option value="macOS">macOS</option><option value="Linux">Linux</option><option value="Android">Android</option><option value="iOS">iOS</option>';
        }elseif($filterBy=='offer'){
            $url = env('AFFISE_API_END') . "offers";
            $response = HTTP::withHeaders([
                'API-Key' => env('AFFISE_API_KEY'),
            ])->get($url);
            
            if ($response->successful()) {
                $allOffers = $response->json();
                foreach($allOffers['offers'] as $offer){
                    $returnOptions.='<option value="'.$offer['offer_id'].'">'.$offer['title'].'</option>';
                }
            }
        }
        
        echo $returnOptions;die;
    }
}
