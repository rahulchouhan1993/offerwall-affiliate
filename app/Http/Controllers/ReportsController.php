<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Tracking;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\App;

class ReportsController extends Controller
{
    public function statistics(Request $request){
        $pageTitle = 'Statistics';
        $allAffiliatesApp =  App::where('affiliateId',auth()->user()->id)->get();
        $trackingStats = Tracking::query();
        $requestedParams = $request->all();
        
        $requestedParams['groupBy'] = $requestedParams['groupBy'] ?? 'hour';
        $requestedParams['range'] = $requestedParams['range'] ?? date('m/d/Y', strtotime('-6 days')).' - '.date('m/d/Y');
        // Apply date range filter
        if (!empty($requestedParams['range'])) {
            $separateDate = explode('-', $requestedParams['range']);
            $requestedParams['strd'] = trim($separateDate[0]);
            $requestedParams['endd'] = trim($separateDate[1]);
            $startDate = date('Y-m-d 00:00:00', strtotime(trim($separateDate[0])));
            $endDate = date('Y-m-d 23:59:59', strtotime(trim($separateDate[1])));
            $trackingStats->whereBetween('click_time', [$startDate, $endDate]); 
        }

        // Apply affiliate filter
        $trackingStats->where('user_id', auth()->user()->id);

        // Apply app filter
        if (!empty($requestedParams['appid']) && $requestedParams['appid'] > 0) {
            $trackingStats->where('app_id', $requestedParams['appid']);
        }
    
        // Apply specific filter conditions
        if (!empty($requestedParams['filterBy']) && !empty($requestedParams['filterIn'])) {
            $filterColumnMap = [
                'os' => 'device_os',
                'country' => 'country_code',
                'offer' => 'offer_id'
            ];
            
            foreach($requestedParams['filterIn'] as $filyKey => $filterAsIn){
                if (isset($filterColumnMap[$filyKey])) {
                    $trackingStats->where($filterColumnMap[$filyKey], $filterAsIn[0]);
                }
            }
        }

        $trackingStats->selectRaw("
            COUNT(*) as total_click,
            COUNT(CASE WHEN conversion_id IS NOT NULL THEN 1 END) as total_conversions,
            SUM(revenue) as total_revenue,
            SUM(payout) as total_payout
        ");

        // Apply conditional GROUP BY
        if (!empty($requestedParams['groupBy'])) {
            switch ($requestedParams['groupBy']) {
                case 'hour':
                    $trackingStats->selectRaw("HOUR(click_time) as element")->groupByRaw("HOUR(click_time)");
                    break;
                case 'day':
                    $trackingStats->selectRaw("DATE(click_time) as element")->groupByRaw("DATE(click_time)");
                    break;
                case 'month':
                    $trackingStats->selectRaw("DATE_FORMAT(click_time, '%Y-%m') as element")->groupByRaw("DATE_FORMAT(click_time, '%Y-%m')");
                    break;
                case 'country':
                    $trackingStats->selectRaw("country_name as element")->groupBy("country_name");
                    break;
                case 'browser':
                    $trackingStats->selectRaw("browser as element")->groupBy("browser");
                    break;
                case 'device':
                    $trackingStats->selectRaw("device_brand as element")->groupBy("device_brand");
                    break;
                case 'device_model':
                    $trackingStats->selectRaw("device_model as element")->groupBy("device_model");
                    break;
                case 'os':
                    $trackingStats->selectRaw("device_os as element")->groupBy("device_os");
                    break;
                case 'offer':
                    $trackingStats->selectRaw("offer_id as element")->groupBy("offer_id");
                    break;
                default:
                    // Do nothing if groupBy is invalid
                    break;
            }
        }
        $allStatistics = $trackingStats->get();
        
        $graphData = [];
        if($allStatistics->isNotEmpty()){
            foreach($allStatistics as $k => $v){
                if($requestedParams['groupBy']=='offer'){
                    $url = env('AFFISE_API_END').'offer/'.$v->element;
                    $response = HTTP::withHeaders([
                        'API-Key' => env('AFFISE_API_KEY'),
                    ])->get($url);
                    
                    if ($response->successful()) {
                        $offerDetails = $response->json();
                        $allStatistics[$k]->element = ucfirst($offerDetails['offer']['title']);
                    }
                }
                $graphData[$v->element]['conversion'] = $v->total_conversions;
                $graphData[$v->element]['clicks'] = $v->total_click;
            }
        }
        
        return view('reports.statistics',compact('pageTitle','allStatistics','allAffiliatesApp','requestedParams','graphData'));
    }

    public function conversions(Request $request){
        $pageTitle = 'Conversions';
        $allAffiliatesApp = App::where('affiliateId',auth()->user()->id)->get();
        $requestedParams = $request->all();
        $allCountry = Tracking::where('user_id', auth()->id())->distinct()->pluck('country_code', 'country_name');    
        $allOffers = [];
        $allTrackings = Tracking::where('user_id',auth()->user()->id)->groupBy('offer_id')->pluck('offer_id');
        $allOs = Tracking::where('user_id', auth()->id())->distinct()->pluck('device_os', 'device_os');   
        if(!empty($allTrackings)){
            foreach($allTrackings as $tracking){
                $url = env('AFFISE_API_END').'offer/'.$tracking;
                $response = HTTP::withHeaders([
                    'API-Key' => env('AFFISE_API_KEY'),
                ])->get($url);
                
                if ($response->successful()) {
                    $offerDetails = $response->json();
                    $allOffers[$tracking] = ucfirst($offerDetails['offer']['title']);
                }
            }
        }
        
        //filter section
        $trackingStats = Tracking::query();

        // Apply affiliate filter
        $trackingStats->whereNotNull('conversion_id');
        $trackingStats->where('user_id', auth()->user()->id);

        $requestedParams['range'] = $requestedParams['range'] ?? date('m/d/Y', strtotime('-6 days')).' - '.date('m/d/Y');
        // Apply date range filter
        if (!empty($requestedParams['range'])) {
            $separateDate = explode('-', $requestedParams['range']);
            $requestedParams['strd'] = trim($separateDate[0]);
            $requestedParams['endd'] = trim($separateDate[1]);
            $startDate = date('Y-m-d 00:00:00', strtotime(trim($separateDate[0])));
            $endDate = date('Y-m-d 23:59:59', strtotime(trim($separateDate[1])));
            $trackingStats->whereBetween('conversion_time', [$startDate, $endDate]); 
        }

        // Apply app filter
        if (!empty($requestedParams['appid']) && $requestedParams['appid'] > 0) {
            $trackingStats->where('app_id', $requestedParams['appid']);
        }

        // Apply country filter
        if (!empty($requestedParams['country'])) {
            $trackingStats->where('country_code', $requestedParams['country']);
        }

        // Apply offer filter
        if (!empty($requestedParams['offer']) && $requestedParams['offer'] > 0) {
            $trackingStats->where('offer_id', $requestedParams['offer']);
        }

        // Apply OS filter
        if (!empty($requestedParams['device_os'])) {
            $trackingStats->where('device_os', $requestedParams['device_os']);
        }

        // Apply OS filter
        if (!empty($requestedParams['goal'])) {
            $trackingStats->where('goal', $requestedParams['goal']);
        }

        $allConversions = $trackingStats->paginate(100)->appends(request()->query());
        return view('reports.conversions',compact('allAffiliatesApp','pageTitle','allConversions','allCountry','allOffers','allOs','requestedParams'));
    }

    public function postbacks(Request $request){
        $pageTitle = 'Postbacks';
        $allAffiliatesApp = App::where('affiliateId',auth()->user()->id)->get();
        $requestedParams = $request->all();
        
        $allTrackings = Tracking::where('user_id',auth()->user()->id)->groupBy('offer_id')->pluck('offer_id'); 
        $allOffers = [];
        if(!empty($allTrackings)){
            foreach($allTrackings as $tracking){
                $url = env('AFFISE_API_END').'offer/'.$tracking;
                $response = HTTP::withHeaders([
                    'API-Key' => env('AFFISE_API_KEY'),
                ])->get($url);
                
                if ($response->successful()) {
                    $offerDetails = $response->json();
                    $allOffers[$tracking] = ucfirst($offerDetails['offer']['title']);
                }
            }
        }

        //filter section
        $trackingStats = Tracking::query();

        // Apply affiliate filter
        $trackingStats->whereNotNull('conversion_id');
        $trackingStats->where('user_id', auth()->user()->id);

        $requestedParams['range'] = $requestedParams['range'] ?? date('m/d/Y', strtotime('-6 days')).' - '.date('m/d/Y');
        // Apply date range filter
        if (!empty($requestedParams['range'])) {
            $separateDate = explode('-', $requestedParams['range']);
            $requestedParams['strd'] = trim($separateDate[0]);
            $requestedParams['endd'] = trim($separateDate[1]);
            $startDate = date('Y-m-d 00:00:00', strtotime(trim($separateDate[0])));
            $endDate = date('Y-m-d 23:59:59', strtotime(trim($separateDate[1])));
            $trackingStats->whereBetween('conversion_time', [$startDate, $endDate]); 
        }

        // Apply app filter
        if (!empty($requestedParams['appid']) && $requestedParams['appid'] > 0) {
            $trackingStats->where('app_id', $requestedParams['appid']);
        }

        // Apply offer filter
        if (!empty($requestedParams['offer']) && $requestedParams['offer'] > 0) {
            $trackingStats->where('offer_id', $requestedParams['offer']);
        }

        // Apply OS filter
        if (!empty($requestedParams['goal'])) {
            $trackingStats->where('goal', $requestedParams['goal']);
        }

        if (!empty($requestedParams['status'])) {
            $trackingStats->where('http_code', $requestedParams['status']);
        }

        $allPostbacks = $trackingStats->paginate(100)->appends(request()->query());
        
        return view('reports.postbacks',compact('pageTitle','allPostbacks','allAffiliatesApp','requestedParams','allOffers'));
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
            $allTrackings = Tracking::groupBy('device_os')->pluck('device_os');
            if(!empty($allTrackings)){
                foreach($allTrackings as $tracking){
                    $returnOptions.='<option value="'.$tracking.'">'.ucfirst($tracking).'</option>';
                }
            }
        }elseif($filterBy=='offer'){
            $allTrackings = Tracking::where('user_id',auth()->user()->id)->groupBy('offer_id')->pluck('offer_id');
            if(!empty($allTrackings)){
                foreach($allTrackings as $tracking){
                    $url = env('AFFISE_API_END').'offer/'.$tracking;
                    $response = HTTP::withHeaders([
                        'API-Key' => env('AFFISE_API_KEY'),
                    ])->get($url);
                    
                    if ($response->successful()) {
                        $offerDetails = $response->json();
                        $returnOptions.='<option value="'.$tracking.'">'.ucfirst($offerDetails['offer']['title']).'</option>';
                    }
                }
            }
        }
        
        echo $returnOptions;die;
    }

    public function exportReport(Request $request){
        $data = $request->input('exportData');
        $exportType = $request->input('exportType') ?? '';

        $filename = date('d M Y').' - '.rand()."-report.csv";
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($data, $exportType) {
            $file = fopen('php://output', 'w');

            // Add CSV Heading
            fputcsv($file, $data['heading']);

            // Add Data Rows
            foreach ($data['data'] as $row) {
                if($exportType=='conversion'){
                    fputcsv($file, [
                        $row['click_id'], 
                        $row['conversion_id'], 
                        $row['click_time'], 
                        $row['created_at'], 
                        $row['status'], 
                        $row['offer_id'],
                        $row['goal'],
                        $row['payout'],
                        $row['country_name'],
                        $row['ip'],
                        $row['device_os'],
                        $row['device_type'],
                        $row['isp'],
                        $row['ua']
                    ]);
                }elseif($exportType=='postback'){
                    fputcsv($file, [
                        $row['postback'], 
                        $row['conversion_id'], 
                        $row['offerName'], 
                        $row['goal'], 
                        $row['status'], 
                        $row['payout'],
                        $row['goal'],
                        $row['payout'],
                        $row['http_code'],
                        $row['error'],
                        $row['ceated_at'],
                        $row['id']
                    ]);
                }else{
                    fputcsv($file, [
                        $row['element'], 
                        $row['clicks'], 
                        $row['conversions'], 
                        $row['cvr'], 
                        $row['epc'], 
                        $row['earnings']
                    ]);
                }
                
            }

            fclose($file);
        };
       

        return response()->stream($callback, 200, $headers);
    }
}
