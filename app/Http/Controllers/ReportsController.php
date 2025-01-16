<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function statistics(Request $request){
        $pageTitle = 'Statistics';
        if($request->isMethod('GET') && !empty($request->range)){
            $seperateDate = explode('-',$request->range);
            $seperateDate[0] = date('Y-m-d',strtotime($seperateDate[0]));
            $seperateDate[1] = date('Y-m-d',strtotime($seperateDate[1]));
        }
        $perPage = 100;
        $allStatistics = [];
        $recordGroupBy = $request->groupBy ?? '';
        $startDate = $seperateDate[0] ?? '';
        $endDate = $seperateDate[1] ?? '';
        $currentPage = NULL;
        $totalCount = NULL;
        $prevPage = NULL;
        $nextPage = NULL;
        if(!empty($recordGroupBy) && !empty($startDate) && !empty($endDate)){
            $queryString = http_build_query([
                'filter[date_from]' => $startDate ?? '2020-01-01',
                'filter[date_to]' => $endDate ?? date('Y-m-d'),
                'filter[partner]' => 27,
                'page' => $request->page ?? '1',
                'limit' => $perPage,
            ]);
            $url = env('AFFISE_API_END') . "stats/custom?slice[]={$recordGroupBy}&".$queryString;
            $response = HTTP::withHeaders([
                'API-Key' => env('AFFISE_API_KEY'),
            ])->get($url);
            
            if ($response->successful()) {
                $allStatistics = $response->json();
                //echo "<pre>"; print_R($allStatistics);die;
                $pagination = $allStatistics['pagination'] ?? []; 
                $currentPage = $pagination['page'] ?? 1; 
                $totalCount = $pagination['total_count'] ?? 0;
                $prevPage = $pagination['prev_page'] ?? null;
                $nextPage = $pagination['next_page'] ?? null;
            }
        }
        
        return view('reports.statistics',compact('pageTitle','allStatistics','currentPage','totalCount','prevPage','nextPage','perPage','recordGroupBy'));
    }

    public function conversions(){
        $pageTitle = 'Conversions';
        $perPage = 25;
        $allConversions = [];
        $currentPage = NULL;
        $totalCount = NULL;
        $prevPage = NULL;
        $nextPage = NULL;
        $conversionsStatus = $request->status ?? '';
        $queryString = http_build_query([
            'date_from' => $request->startDate ?? '2020-01-01',
            'date_to' => $request->endDate ?? date('Y-m-d'),
            'partner[]' => 27,
            'status' => $request->status ?? '',
            'page' => $request->page ?? '1',
            'limit' => $perPage,
        ]);
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
        return view('reports.conversions',compact('pageTitle','allConversions','currentPage','totalCount','prevPage','nextPage','perPage','conversionsStatus'));
    }

    public function postbacks(Request $request){
        $pageTitle = 'Postbacks';
        $perPage = 25;
        $allPostbacks = [];
        $currentPage = NULL;
        $totalCount = NULL;
        $prevPage = NULL;
        $nextPage = NULL;
        $postbackStatus = $request->status ?? '';
        $queryString = http_build_query([
            'date_from' => $request->startDate ?? '2020-01-01',
            'date_to' => $request->status ?? date('Y-m-d'),
            'partner[]' => 27,
            'status' => $request->status ?? '',
            'page' => $request->page ?? '1',
            'limit' => $perPage,
        ]);
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
        return view('reports.postbacks',compact('pageTitle','allPostbacks','currentPage','totalCount','prevPage','nextPage','perPage','postbackStatus'));
    }

    public function exported(){
        $pageTitle = 'Exported Reports';
        return view('reports.exported',compact('pageTitle'));
    }
}
