@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] md:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
       <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
          <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Overview</h2>
          <button
             class="w-[140px] bg-[#E36F3D] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Export</button>
       </div>
       <div class="flex flex-col items-center justify-center gap-[15px]">
          <div class="w-full flex flex-col gap-[10px]">
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label
                   class="min-w-[160px] w-[100%] md:w-[10%] text-[14px] font-[500] text-[#898989] ">Range:</label>
                <input type="date" name="" id=""
                   class="w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none"
                   placeholder="2024-12-10">
             </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Currency:</label>
                <select
                   class="w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                   <option>Europe/Amsterdam(UTC=01:00)</option>
                   <option>India/USA(UTC=01:00)</option>
                </select>
             </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Currency:</label>
                <select
                   class="w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                   <option>Courtina</option>
                   <option>Courtina 2</option>
                </select>
             </div>
             <div class="w-[100%] flex items-center flex-wrap justify-start lg:flex-nowrap gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Filter by:</label>
                <div class="w-[100%] xl:w-[90%] flex flex-wrap xl:flex-nowrap  items-center gap-[5px] md:gap-[8px] lg:gap-[10px] xl:gap-[15px]">
                   <div class="w-[100%] xl:w-[80%] flex flex-wrap xl:flex-nowrap items-center gap-[10px]">
                      <select
                         class="w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option>Offers</option>
                         <option>Offers 2</option>
                      </select>
                      <select
                         class="w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option>Os</option>
                         <option>Os 2</option>
                      </select>
                      <select
                         class="w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option>Goal</option>
                         <option>Goal 2</option>
                      </select>
                      <select
                         class="w-[100%] xl:w-[25%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                         <option>Smart links</option>
                         <option>Smart links 2</option>
                      </select>
                   </div>
                   <div class="w-[100%] xl:w-[20%] flex items-center justify-start xl:justify-between gap-[10px]">
                      <button
                         class="w-[140px] bg-[#E36F3D] px-[20px] py-[11px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Apply</button>
                      <button
                         class="w-[140px] bg-[#FFF3ED] px-[20px] py-[11px] w-[100px] border border-[#FFF3ED] rounded-[4px] text-[14px] font-[500] text-[#E36F3D] text-center">Clear</button>
                   </div>
                </div>
             </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Active filters:</label>
                <div class="w-[90%] flex flex-wrap items-center gap-[10px]">
                   <div
                      class=" flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                      Filter001
                      <button
                         class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]">
                         <svg
                            width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                      </button>
                   </div>
                   <div class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                      Filter001
                      <button
                         class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]">
                         <svg
                            width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                      </button>
                   </div>
                   <div
                      class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                      Filter001
                      <button
                         class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]">
                         <svg
                            width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                      </button>
                   </div>
                   <div
                      class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                      Filter001
                      <button
                         class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]">
                         <svg
                            width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                      </button>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
          <div class="w-[100%] overflow-x-scroll tableScroll">
             <table
                class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                <tr>
                   <th
                      class="bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">
                      Date
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Offer
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      IP
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Device
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Status
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Income
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Name of goal
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Sub1
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Sub2
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Sub3
                   </th>
                   {{-- <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] text-center px-[10px] py-[13px] text-left whitespace-nowrap">
                      UserAgent
                   </th> --}}
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] text-center px-[10px] py-[13px] text-left whitespace-nowrap">
                      Comment
                   </th>
                   <th
                      class="bg-[#F6F6F6] rounded-tr-[10px] text-[14px] text-center font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      ID
                   </th>
                </tr>
                @if(!empty($allConversions['conversions']))
                @foreach ($allConversions['conversions'] as $conversion)
                <tr>
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['created_at'] }}
                   </td>
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['offer']['title'] }}
                   </td>
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['country_name'].' '.$conversion['ip'] }}
                   </td>
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['device'].' '.$conversion['os'] }}
                   </td>
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      @if($conversion['status']=='confirmed')
                      <div class="inline-flex bg-[#F3FEE7] border border-[#BCEE89] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#6EBF1A] text-center uppercase">
                        {{ $conversion['status'] }} </div>
                      @else
                      <div class="inline-flex bg-[#fee7e7] border border-[#ee8989] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#bf1a1a] text-center uppercase">
                        {{ $conversion['status'] }} </div>
                      @endif
                      
                   </td>
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $conversion['earnings'] }}
                   </td>
                    @php
                        $goalConv = ($conversion['goal'] == '') ? '--' : $conversion['goal'];
                    @endphp
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $goalConv }}
                   </td>
                   @php
                        $sub1conv = ($conversion['sub1'] == '') ? '--' : $conversion['sub1'];
                    @endphp
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $sub1conv }}
                   </td>
                   @php
                        $sub2conv = ($conversion['sub2'] == '') ? '--' : $conversion['sub2'];
                    @endphp
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $sub2conv }}
                   </td>
                   @php
                        $sub3conv = ($conversion['sub3'] == '') ? '--' : $conversion['sub3'];
                    @endphp
                   <td
                      class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $sub3conv }}
                   </td>
                   {{-- <td
                      class="text-[14px] font-[500] text-[#808080] text-center px-[10px] py-[10px] text-left whitespace-nowrap ">
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
                      class="text-[14px] font-[500] text-[#808080] text-center px-[10px] py-[10px] text-left whitespace-nowrap">
                      {{ $commnetconv }}
                   </td>
                   <td
                      class="text-[14px] font-[500] text-[#808080] text-center px-[10px] py-[10px] text-left whitespace-nowrap">
                      {{ $conversion['id'] }}
                   </td>
                </tr>
                @endforeach
                @endif
             </table>
          </div>
          <div class="pagination mt-[20px] flex gap-[10px] items-center justify-end">
             @if($prevPage)
             <a href="{{ route('report.conversions', ['page' => $prevPage, 'status' => $conversionsStatus]) }}" class="btn group inline-flex gap-[8px] items-center bg-[#FFF3ED] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#E36F3D] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M5 1L1 5L5 9" stroke="#E36F3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-[#fff]" />
                </svg>
                Previous
             </a>
             @endif
             @php
             $totalPages = ceil($totalCount / $perPage);
             $range = 3; // Number of pages to display before and after the current page
             $start = max($currentPage - $range, 1);
             $end = min($currentPage + $range, $totalPages);
             @endphp
             @if($start > 1)
             <a href="{{ route('report.conversions', ['page' => 1, 'status' => $conversionsStatus]) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
             1
             </a>
             @if($start > 2)
             <span class="text-[#808080] px-[5px]">...</span>
             @endif
             @endif
             @for($i = $start; $i <= $end; $i++)
             <a href="{{ route('report.conversions', ['page' => $i, 'status' => $conversionsStatus]) }}" class="{{ $i == $currentPage ? 'btn-active btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]' : 'btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]' }}">
             {{ $i }}
             </a>
             @endfor
             @if($end < $totalPages)
             @if($end < $totalPages - 1)
             <span class="text-[#808080] px-[5px]">...</span>
             @endif
             <a href="{{ route('report.conversions', ['page' => $totalPages, 'status' => $conversionsStatus]) }}" class="btn inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
             {{ $totalPages }}
             </a>
             @endif
             @if($nextPage)
             <a href="{{ route('report.conversions', ['page' => $nextPage, 'status' => $conversionsStatus]) }}" class="btn group inline-flex gap-[5px] items-center bg-[#FFF3ED] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#E36F3D] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
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