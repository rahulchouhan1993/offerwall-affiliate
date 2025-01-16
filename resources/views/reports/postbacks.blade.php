@extends('layouts.default')
@section('content')
@php
   use Illuminate\Support\Facades\Http;
@endphp
<div class="bg-[#f2f2f2] p-[15px] lg:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
       <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
          <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Overview</h2>
          <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#E36F3D] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Export</button>
       </div>
       <div class="flex items-center justify-between flex-wrap lg:flex-nowrap gap-[10px]">
          <div class="w-[100%] md:w-auto flex items-end flex-wrap md:flex-nowrap gap-[10px]">
            <div class="flex flex-wrap md:flex-nowrap items-start gap-[10px] w-[100%] lg:w-[45%]">
                <div class="w-[100%] md:w-[31%]">
                    <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Start Date</label>
                    <input type="Date" name="" id="" class="w-[100%] bg-[#F6F6F6] px-[15px] py-[10px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Date">
                </div>

                <div class="w-[100%] md:w-[31%]">
                    <label class="flex items-center gap-[5px] text-[14] text-[#898989]">End Date</label>
                    <input type="Date" name="" id="" class="w-[100%] bg-[#F6F6F6] px-[15px] py-[10px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Date">
                </div>

                <div class="w-[100%] md:w-[31%]">
                    <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Filter By</label>
                    <input type="Date" name="" id="" class="w-[100%] bg-[#F6F6F6] px-[15px] py-[10px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Date">
                </div>
            </div>

            <div class="w-[100%] lg:w-[55%] flex items-center gap-[10px]">
             <select class="w-[35%]  bg-[#F6F6F6] px-[15px] py-[12px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                <option>Status</option>
                <option>Status 2</option>
             </select>
             <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#E36F3D] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Apply</button>
             <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#FFF3ED] px-[20px] py-[10px] w-[100px] border border-[#FED5C3] rounded-[4px] text-[14px] font-[500] text-[#E36F3D] text-center">Clear</button>
          </div>
         
          </div>
       </div>
       <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
          <div class="w-[100%] overflow-x-scroll tableScroll">
             <table class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                <tr>
                   <th class="w-[500px] min-w-[500px] bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">Postback URL</th>
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
                   <td class="w-[500px] min-w-[500px] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-normal breakword">{{ $postBacks['postback_url'] }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $postBacks['conversion_id'] }}</td>
                   <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ $offerName }}</td>
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
                <a href="{{ route('report.postbacks', ['page' => $prevPage, 'status' => $postbackStatus]) }}" class="btn group inline-flex gap-[8px] items-center bg-[#FFF3ED] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#E36F3D] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L1 5L5 9" stroke="#E36F3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-[#fff]" />
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
                <a href="{{ route('report.postbacks', ['page' => 1, 'status' => $postbackStatus]) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                    1
                </a>
                @if($start > 2)
                    <span class="text-[#808080] px-[5px]">...</span>
                @endif
            @endif
        
            @for($i = $start; $i <= $end; $i++)
                <a href="{{ route('report.postbacks', ['page' => $i, 'status' => $postbackStatus]) }}" class="{{ $i == $currentPage ? 'btn-active btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]' : 'btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]' }}">
                    {{ $i }}
                </a>
            @endfor
        
            @if($end < $totalPages)
                @if($end < $totalPages - 1)
                    <span class="text-[#808080] px-[5px]">...</span>
                @endif
                <a href="{{ route('report.postbacks', ['page' => $totalPages, 'status' => $postbackStatus]) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                    {{ $totalPages }}
                </a>
            @endif
        
            @if($nextPage)
                <a href="{{ route('report.postbacks', ['page' => $nextPage, 'status' => $postbackStatus]) }}" class="btn group inline-flex gap-[5px] items-center bg-[#FFF3ED] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#E36F3D] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                    Next
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L1 9" stroke="#E36F3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-[#fff]" />
                    </svg>
                </a>
            @endif
        </div>
       </div>
    </div>
</div>
@stop