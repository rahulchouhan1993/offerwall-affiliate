@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] md:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
       <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
          <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Overview</h2>
          <button
             class="w-[140px] bg-[#D272D2] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Export</button>
       </div>
       <div class="flex flex-col items-center justify-center gap-[15px]">
         <form method="get" id="filterConversions">
          <div class="w-full flex flex-col gap-[10px]">
            <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
               <label class="min-w-[160px] w-[100%] md:w-[10%] text-[14px] font-[500] text-[#898989] ">Apps:</label>
               <select name="appid" class="appendAffiliateApps w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                  <option value="" >Select</option>
                  @if($allAffiliatesApp && $allAffiliatesApp->isNotEmpty())
                     @foreach ($allAffiliatesApp as $affiliateApp)
                        <option value="{{ $affiliateApp->id }}" @if($filterOptions['filterByAffApp']==$affiliateApp->id) selected @endif>{{ $affiliateApp->appName }}</option>
                     @endforeach
                  @endif
               </select>
            </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label class="min-w-[160px] w-[100%] md:w-[10%] text-[14px] font-[500] text-[#898989] ">Range:</label>
                <input type="text" name="range" class="dateRange w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none"
                   placeholder="2024-12-10" value="{{ $filterOptions['completeDate'] }}">
             </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Country:</label>
                <select name="country" class="countryOptions w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                  <option value="">Select</option>
                  @foreach ($allCountry as $country)
                     <option value="{{ $country->iso }}" @if($filterOptions['country'] == $country->iso) selected @endif>{{ $country->nicename }}</option>
                  @endforeach
                </select>
             </div>
             <div class="w-[100%] flex items-center flex-wrap justify-start lg:flex-nowrap gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Filter by:</label>
                <div class="w-[100%] xl:w-[90%] flex flex-wrap xl:flex-nowrap  items-center gap-[5px] md:gap-[8px] lg:gap-[10px] xl:gap-[15px]">
                   <div class="relative w-[100%] xl:w-[80%] flex flex-wrap xl:flex-nowrap items-center gap-[10px]">
                      <select name="offer"
                         class="offerOption w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option value="">Select</option>
                         @foreach ($allOffers['offers'] as $offer)
                           <option value="{{ $offer['offer_id'] }}" @if($filterOptions['offer'] == $offer['id']) selected @endif>{{ $offer['title'].' ('.$offer['offer_id'].')' }}</option>
                        @endforeach
                      </select>
                      <select name="os"
                         class="osOption w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option value="">Select</option>
                         <option value="Windows" @if($filterOptions['os'] == 'Windows') selected @endif>Windows</option>
                         <option value="macOS" @if($filterOptions['os'] == 'macOS') selected @endif>macOS</option>
                         <option value="Linux" @if($filterOptions['os'] == 'Linux') selected @endif>Linux</option>
                         <option value="Android" @if($filterOptions['os'] == 'Android') selected @endif>Android</option>
                         <option value="iOS" @if($filterOptions['os'] == 'iOS') selected @endif>iOS</option>
                      </select>
                      <select name="status"
                         class="conversionstatusOption w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option value="">Select</option>
                         <option value="1" @if($filterOptions['status'] == '1') selected @endif>Confirmed</option>
                         <option value="2" @if($filterOptions['status'] == '2') selected @endif>Pending</option>
                         <option value="3" @if($filterOptions['status'] == '3') selected @endif>Declined</option>
                         <option value="5" @if($filterOptions['status'] == '5') selected @endif>Hold</option>
                      </select>
                      <input name="goal" class="w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Goal" value="{{ $filterOptions['goal'] }}">
                      {{-- <input name="smartlink" class="w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Smart Link" value="{{ $filterOptions['smartLink'] }}"> --}}
                   </div>
                   <div class="w-[100%] xl:w-[20%] flex items-center justify-start xl:justify-between gap-[10px]">
                      <button
                         class="w-[140px] bg-[#D272D2] px-[20px] py-[11px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Apply</button>
                      <a href="{{ route('report.conversions') }}"
                         class="w-[140px] bg-[#F5EAF5] px-[20px] py-[11px] w-[100px] border border-[#F5EAF5] rounded-[4px] text-[14px] font-[500] text-[#D272D2] text-center">Clear</a>
                   </div>
                </div>
             </div>
          </div>
         </form>
       </div>
       <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
          <div class="w-[100%] overflow-x-scroll tableScroll">
             <table
                class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                <tr>
                   <th
                      class="bg-[#F6F6F6] rounded-tl-[10px] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">
                      Date
                   </th>
                   <th
                      class="bigcontent whitespace-normal breakword bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left">
                      Offer
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      IP
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Country
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Device
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Status
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Income
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Name of goal
                   </th>
                   <th
                      class=" whitespace-normal breakword bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left ">
                      Sub1
                   </th>
                   <th
                      class=" whitespace-normal breakword bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left ">
                      Sub2
                   </th>
                   <th
                      class=" whitespace-normal breakword bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left ">
                      Sub3
                   </th>
                   {{-- <th
                      class="bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] text-center px-[10px] py-[13px] text-left ">
                      UserAgent
                   </th> --}}
                   <th
                      class=" whitespace-normal breakword bg-[#F6F6F6] text-[10px] font-[500] text-[#1A1A1A] text-center px-[10px] py-[13px] text-left">
                      Comment
                   </th>
                   <th
                      class=" whitespace-normal breakword bg-[#F6F6F6] rounded-tr-[10px] text-[10px] text-center font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left">
                      ID
                   </th>
                </tr>
                @if(!empty($allConversions['conversions']))
                @foreach ($allConversions['conversions'] as $conversion)
                <tr>
                   <td
                      class="text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['created_at'] }}
                   </td>
                   <td title="AU - Ipsos iSay (TOI) [Responsive]" 
                      class="bigcontent  whitespace-normal breakword text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left  ">
                      {{ $conversion['offer']['title'] }}
                   </td>
                   <td
                      class="text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left  ">
                      {{ $conversion['ip'] }}
                   </td>
                   <td
                      class="text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left  ">
                      {{ $conversion['country_name'] }}
                   </td>
                   <td
                      class="text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['device'].' '.$conversion['os'] }}
                   </td>
                   <td
                      class="text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      @if($conversion['status']=='confirmed')
                      <div class="inline-flex bg-[#F3FEE7] border border-[#BCEE89] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#6EBF1A] text-center uppercase">
                        {{ $conversion['status'] }} </div>
                      @else
                      <div class="inline-flex bg-[#fee7e7] border border-[#ee8989] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#bf1a1a] text-center uppercase">
                        {{ $conversion['status'] }} </div>
                      @endif
                      
                   </td>
                   <td
                      class="text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      $ {{ $conversion['earnings'] }}
                   </td>
                    @php
                        $goalConv = ($conversion['goal'] == '') ? '--' : $conversion['goal'];
                    @endphp
                   <td title="ed63980ad7a44ce782323acf2e722887"
                      class="bigcontent text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $goalConv }}
                   </td>
                   @php
                        $sub1conv = ($conversion['sub1'] == '') ? '--' : $conversion['sub1'];
                    @endphp
                   <td title="ed63980ad7a44ce782323acf2e722887"
                      class="bigcontent whitespace-normal breakword text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left ">
                      {{ $sub1conv }}
                   </td>
                   @php
                        $sub2conv = ($conversion['sub2'] == '') ? '--' : $conversion['sub2'];
                    @endphp
                   <td title="ed63980ad7a44ce782323acf2e722887"
                      class="bigcontent whitespace-normal breakword text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left ">
                      {{ $sub2conv }}
                   </td>
                   @php
                        $sub3conv = ($conversion['sub3'] == '') ? '--' : $conversion['sub3'];
                    @endphp
                   <td
                      class=" whitespace-normal breakword text-[10px] font-[500] text-[#808080] px-[10px] py-[10px] text-left ">
                      {{ $sub3conv }}
                   </td>
                   {{-- <td
                      class="text-[10px] font-[500] text-[#808080] text-center px-[10px] py-[10px] text-left  ">
                      <button>
                         <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" stroke="#808080" />
                            <path
                               d="M7.10369 11.5V6.04545H8.61648V11.5H7.10369ZM7.86364 5.34233C7.63873 5.34233 7.44579 5.26776 7.2848 5.11861C7.12618 4.96709 7.04688 4.78598 7.04688 4.57528C7.04688 4.36695 7.12618 4.18821 7.2848 4.03906C7.44579 3.88755 7.63873 3.81179 7.86364 3.81179C8.08854 3.81179 8.2803 3.88755 8.43892 4.03906C8.59991 4.18821 8.6804 4.36695 8.6804 4.57528C8.6804 4.78598 8.59991 4.96709 8.43892 5.11861C8.2803 5.26776 8.08854 5.34233 7.86364 5.34233Z"
                               fill="#808080" />
                         </svg>
                      </button>
                   </td> --}}
                   @php
                        $commnetconv = ($conversion['comment'] == '') ? '--' : $conversion['comment'];
                    @endphp
                   <td
                      class=" whitespace-normal breakword text-[10px] font-[500] text-[#808080] text-center px-[10px] py-[10px] text-left ">
                      {{ $commnetconv }}
                   </td>
                   <td
                      class=" whitespace-normal breakword text-[10px] font-[500] text-[#808080] text-center px-[10px] py-[10px] text-left">
                      {{ $conversion['id'] }}
                   </td>
                </tr>
                @endforeach
                @endif
             </table>
          </div>
          
          <div class="pagination mt-[20px] flex flex-wrap gap-[10px] items-center justify-end">
            @if($prevPage)
            @php 
            $urlForPagination['page'] =$prevPage;
            @endphp
                <a href="{{ route('report.conversions', $urlForPagination) }}" class="btn group inline-flex gap-[8px] items-center bg-[#F5EAF5] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#D272D2] text-center hover:bg-[#D272D2] hover:text-[#fff]">
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
                <a href="{{ route('report.conversions', $urlForPagination) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]">
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
                <a href="{{ route('report.conversions', $urlForPagination) }}" class="{{ $i == $currentPage ? 'btn-active btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]' : 'btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]' }}">
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
                <a href="{{ route('report.conversions', $urlForPagination) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#D272D2] hover:text-[#fff]">
                    {{ $totalPages }}
                </a>
            @endif
        
            @if($nextPage)
            @php 
            $urlForPagination['page'] =$nextPage;
            @endphp
                <a href="{{ route('report.conversions', $urlForPagination) }}" class="btn group inline-flex gap-[5px] items-center bg-[#F5EAF5] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#D272D2] text-center hover:bg-[#D272D2] hover:text-[#fff]">
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
    $(document).ready(function() {
      $('.offerOption').select2({
         placeholder: "Select an offer",
         allowClear: true // Adds a clear (X) button
      });
      $('.countryOptions').select2({
         placeholder: "Select country",
         allowClear: true // Adds a clear (X) button
      });
      $('.osOption').select2({
         placeholder: "Select OS",
         allowClear: true // Adds a clear (X) button
      });
      $('.conversionstatusOption').select2({
         placeholder: "Select status",
         allowClear: true // Adds a clear (X) button
      });
      $('.appendAffiliateApps').select2({
         placeholder: "Select an app",
         allowClear: true // Adds a clear (X) button
      });
   });
   $('#filterConversions').on('submit',function(){
      $('.loader-fcustm').show();
   })
   
</script>
@stop