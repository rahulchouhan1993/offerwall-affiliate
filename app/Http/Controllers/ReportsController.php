<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function statistics(){
        $pageTitle = 'Statistics';
        return view('reports.statistics',compact('pageTitle'));
    }

    public function conversions(){
        $pageTitle = 'Conversions';
        // $filterParams = [];
        // $userType = $request->status ?? ''; 
        // $page = $request->page ?? '1'; 
        // $perPage = 25;
        // $url = env('AFFISE_API_END') . "stats/serverpostbacks?action_id=&clickid=&country[0]=US&currency=&custom_field_1=&custom_field_2=&custom_field_3=&custom_field_4=&custom_field_5=&custom_field_6=&custom_field_7=&date_from=2024-01-01&date_to=2025-01-13&limit=1&page=1&payouts=&revenue=&timezone=Asia/Tokyo";
        // $response = HTTP::withHeaders([
        //     'API-Key' => env('AFFISE_API_KEY'),
        // ])->get($url);

        // if ($response->successful()) {
        //     $allAffiliates = $response->json();
        //     $pagination = $allAffiliates['pagination'] ?? []; // Extract pagination data
        //     $currentPage = $pagination['page'] ?? 1; 
        //     $totalCount = $pagination['total_count'] ?? 0;
        //     $prevPage = $pagination['prev_page'] ?? null;
        //     $nextPage = $pagination['next_page'] ?? null;
        // }
        return view('reports.conversions',compact('pageTitle'));
    }

    public function postbacks(Request $request){
        $pageTitle = 'Postbacks';
        $perPage = 25;
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
        }else{
            $allPostbacks = [];
            $currentPage = NULL;
            $totalCount = NULL;
            $prevPage = NULL;
            $nextPage = NULL;
        }
        return view('reports.postbacks',compact('pageTitle','allPostbacks','currentPage','totalCount','prevPage','nextPage','perPage','postbackStatus'));
    }

    public function exported(){
        $pageTitle = 'Exported Reports';
        return view('reports.exported',compact('pageTitle'));
    }
}
