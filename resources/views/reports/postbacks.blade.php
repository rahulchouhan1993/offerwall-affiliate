@extends('layouts.default')
@section('content')
@php
   use Illuminate\Support\Facades\Http;
@endphp
<div class="bg-[#f2f2f2] p-[15px] lg:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
       <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
          <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Overview</h2>
          <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#D272D2] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Export</button>
       </div>
       <form method="get" id="postbackForm">
       <div class="w-full flex items-center justify-between flex-wrap lg:flex-nowrap gap-[10px]">
          <div class="w-[100%] flex items-end flex-wrap xl:flex-nowrap gap-[10px]">
            <div class="flex flex-col items-start  justify-start gap-[10px] w-[100%] xl:w-[45%]">
                <label class="min-w-[160px] w-[100%] md:w-[10%] text-[14px] font-[500] text-[#898989] ">Apps:</label>
                <select name="appid" class="appendAffiliateApps sel2fld w-[100%] xl:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                   <option value="" >Select</option>
                   @if($allAffiliatesApp && $allAffiliatesApp->isNotEmpty())
                      @foreach ($allAffiliatesApp as $affiliateApp)
                         <option value="{{ $affiliateApp->id }}" @if(isset($urlForPagination['appid'])==$affiliateApp->id) selected @endif>{{ $affiliateApp->appName }}</option>
                      @endforeach
                   @endif
                </select>
             </div>
            <div class="flex flex-wrap md:flex-nowrap items-start gap-[10px] w-[100%] xl:w-[45%]">
                <div class="w-[100%]">
                    <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Start Date</label>
                    <input type="text" name="range"  class="dateRange w-[100%] bg-[#F6F6F6] px-[15px] py-[12px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Date" value="{{ $urlForPagination['range'] ?? '' }}">
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap items-start gap-[10px] w-[100%] xl:w-[45%]">
                <div class="w-[100%]">
                <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Start Date</label>
                    <select name="status" class="filterByStatus bg-[#F6F6F6] px-[15px] py-[12px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                        <option value="">Select</option>
                        <option value="1" @if(isset($urlForPagination['status']) && $urlForPagination['status']==1) selected @endif>Confirmed</option>
                        <option value="0" @if(isset($urlForPagination['status']) && $urlForPagination['status']==2) selected @endif>Rejected</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap md:flex-nowrap items-start gap-[10px] w-[100%] xl:w-[45%]">
                <div class="w-[100%]">
                <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Start Date</label>
                    <select class="search-postback-filter w-[100%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" name="offer">
                        <option value="">Select Offer </option>
                    @foreach($allOffers['offers'] as $offer)
                        <option value="{{ $offer['offer_id'] }}" @if(isset($urlForPagination['offer']) && $urlForPagination['offer']==$offer['offer_id']) selected @endif>{{ $offer['title'] }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap items-start gap-[10px] w-[100%] xl:w-[45%]">
                <div class="w-[100%]">
                <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Start Date</label>
                    <input type="text" name="goal"  class="goal-postback-filter w-[100%] bg-[#F6F6F6] px-[15px] py-[12px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Goal Name" value="{{ $urlForPagination['goal'] ?? '' }}">
                </div>
            </div>
            <div class="w-[100%] xl:w-[55%] flex items-center gap-[10px]">
                <button class="w-[80px] md:w-[90px] lg:w-[100px] xl:w-[130px] 2xl:w-[140px] bg-[#D272D2] px-[3px] py-[12px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Apply</button>
                <a href="{{ route('report.postbacks') }}" class="w-[80px] md:w-[90px] lg:w-[100px] xl:w-[130px] 2xl:w-[140px] bg-[#F5EAF5] px-[20px] py-[10px] w-[100px] border border-[#FED5C3] rounded-[4px] text-[14px] font-[500] text-[#D272D2] text-center">Clear</a>
            </div>
          </div>
       </div>
    </form>
       <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
          <div class="w-[100%] overflow-x-scroll tableScroll">
             <table class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                <tr>
                   <th class="bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">Postback URL</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Conversion ID</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Offer</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Goal</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Status</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Payouts</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap"></th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">HTTP code</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Error</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Date</th>
                   <th class="bg-[#F6F6F6] rounded-tr-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">ID</th>
                </tr>
                @if(!empty($allPostbacks['postbacks']))
                @foreach ($allPostbacks['postbacks'] as $postBacks)
                @php
                  $url = env('AFFISE_API_END') . "offer/".$postBacks['offer_id'];
                  $response = HTTP::withHeaders([
                        'API-Key' => env('AFFISE_API_KEY'),
                  ])->get($url);
                  if ($response->successful()) {
                     $offerDetail = $response->json();
                     $offerName = $offerDetail['offer']['title'];
                  }else{
                     $offerName = 'N/A';
                  }
                @endphp
                <tr>
                   <td title="https://uttdp.trckinnovative.com/postback/provider/YqJeA7iPuF?secure_key=rdEwgEyH7Z&uuid=925ac38213f9417289e43ce6ac85b376&transaction_id=679e8589f4b0420001df6b62&campaign_id=3680&payout=5.5" class="bigcontent text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-normal breakword">{{ $postBacks['postback_url'] }}</td>
                   <td title="https://uttdp.trckinnovative.com/postback/provider/YqJeA7iPuF?secure_key=rdEwgEyH7Z&uuid=925ac38213f9417289e43ce6ac85b376&transaction_id=679e8589f4b0420001df6b62&campaign_id=3680&payout=5.5" class="bigcontent text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $postBacks['conversion_id'] }}</td>
                   <td title="https://uttdp.trckinnovative.com/postback/provider/YqJeA7iPuF?secure_key=rdEwgEyH7Z&uuid=925ac38213f9417289e43ce6ac85b376&transaction_id=679e8589f4b0420001df6b62&campaign_id=3680&payout=5.5" class="bigcontent text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $offerName }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $postBacks['goal'] }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      <div class="inline-flex bg-[#F3FEE7] border border-[#BCEE89] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#6EBF1A] text-center uppercase">Success</div>
                   </td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $postBacks['payouts'] ?? 'N/A'; }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">-</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $postBacks['http_code'] ?? 'N/A'; }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">-</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ date('d M Y', $postBacks['date']['sec']) }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $postBacks['_id']['$id'] }}</td>
                </tr>
                @endforeach
                @endif
             </table>
         </div>
         <div class="pagination mt-[20px] flex flex-wrap gap-[10px] items-center justify-end">
            @if($prevPage)
            @php 
            $urlForPagination['page'] =$nextPage;
            @endphp
                <a href="{{ route('report.postbacks', $urlForPagination) }}" class="btn group inline-flex gap-[8px] items-center bg-[#F5EAF5] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#D272D2] text-center hover:bg-[#D272D2] hover:text-[#fff]">
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L1 5L5 9" stroke="#D272D2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-[#fff]" />
                    </svg> Previous
                </a>
            @endif
        
            @php
                $totalPages = ceil($totalCount / $perPage);
                $range = 3; // Number of pages to display before and after the current page
                $start = max($currentPage - $range, 1);
                $end = min($currentPage + $range, $totalPages);
            @endphp
        
            @if($start > 1)
            @php 
            $urlForPagination['page'] =1;
            @endphp
                <a href="{{ route('report.postbacks', $urlForPagination) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]">
                    1
                </a>
                @if($start > 2)
                    <span class="text-[#808080] px-[5px]">...</span>
                @endif
            @endif
        
            @for($i = $start; $i <= $end; $i++)
            @php 
            $urlForPagination['page'] =$i;
            @endphp
                <a href="{{ route('report.postbacks', $urlForPagination) }}" class="{{ $i == $currentPage ? 'btn-active btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]' : 'btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]' }}">
                    {{ $i }}
                </a>
            @endfor
        
            @if($end < $totalPages)
                @if($end < $totalPages - 1)
                    <span class="text-[#808080] px-[5px]">...</span>
                @endif
                @php 
                $urlForPagination['page'] =$totalPages;
                @endphp
                <a href="{{ route('report.postbacks', $urlForPagination) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]">
                    {{ $totalPages }}
                </a>
            @endif
        
            @if($nextPage)
            @php 
                $urlForPagination['page'] =$nextPage;
                @endphp
                <a href="{{ route('report.postbacks', $urlForPagination) }}" class="btn group inline-flex gap-[5px] items-center bg-[#F5EAF5] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#D272D2] text-center hover:bg-[#D272D2] hover:text-[#fff]">
                    Next
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L1 9" stroke="#D272D2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-[#fff]" />
                    </svg>
                </a>
            @endif
        </div>
       </div>
    </div>
</div>
<script>
    $('.filterByStatus').select2({
         placeholder: "Select Status",
         allowClear: true // Adds a clear (X) button
    });
    $('#postbackForm').on('submit',function(){
      $('.loader-fcustm').show();
   });
   $('.search-postback-filter').select2({
    placeholder: "Select Offer",
    allowClear: true // Adds a clear (X) button
   });
   
</script>
@stop