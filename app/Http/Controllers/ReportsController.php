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
        $perPage = 25;
        $allConversions = [];
        $currentPage = NULL;
        $totalCount = NULL;
        $prevPage = NULL;
        $nextPage = NULL;
        $conversionsStatus = $request->status ?? '';
        $queryString = http_build_query([
            'date_from' => $request->startDate ?? '2020-01-01',
            'date_to' => $request->status ?? date('Y-m-d'),
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
