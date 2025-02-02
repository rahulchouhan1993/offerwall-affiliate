@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] lg:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
       <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
          <h2 class="text-[20px] text-[#1A1A1A] font-[600]">My Apps</h2>
          <a href="{{ route('apps.add') }}" class="flex items-center justify-center gap-[13px] w-[130px] lg:w-[149px] bg-[#D272D2] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">
             <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.375 0.375C7.72 0.375 8 0.655 8 1V6.375H13.375C13.5408 6.375 13.6997 6.44085 13.8169 6.55806C13.9342 6.67527 14 6.83424 14 7C14 7.16576 13.9342 7.32473 13.8169 7.44194C13.6997 7.55915 13.5408 7.625 13.375 7.625H8V13C8 13.1658 7.93415 13.3247 7.81694 13.4419C7.69973 13.5592 7.54076 13.625 7.375 13.625C7.20924 13.625 7.05027 13.5592 6.93306 13.4419C6.81585 13.3247 6.75 13.1658 6.75 13V7.625H1.375C1.20924 7.625 1.05027 7.55915 0.933058 7.44194C0.815848 7.32473 0.75 7.16576 0.75 7C0.75 6.83424 0.815848 6.67527 0.933058 6.55806C1.05027 6.44085 1.20924 6.375 1.375 6.375H6.75V1C6.75 0.655 7.03 0.375 7.375 0.375Z" fill="white"/>
             </svg>
             New App
            </a>
       </div>
       <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
          <div class="w-[100%] overflow-x-scroll tableScroll">
             <table class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                <tr>
                   <th class="bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">Name</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Status</th>
                   <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Created</th>
                   <th class="w-[130px] bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-right whitespace-nowrap">Actions</th>
                </tr>
                @if($allApps && $allApps->isNotEmpty())
                @foreach ($allApps as $apps)
                <tr>
                    <td class="max-w-[500px] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-normal ">
                       <strong>{{ $apps->appName }}</strong>
                       <p class="whitespace-normal text-[12px] text-[#808080]">{{ $apps->appUrl }}</p>
                    </td>
                    @if( $apps->status==1)
                    <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                        <a href="{{ route('apps.status',['id'=>$apps->id]) }}" class="inline-flex bg-[#F3FEE7] border border-[#BCEE89] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#6EBF1A] text-center uppercase">Aprroved</a>
                     </td>
                    @else
                    <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                        <a href="{{ route('apps.status',['id'=>$apps->id]) }}" class="inline-flex bg-[#f19a9a] border border-[#ff6d6d] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#e13a3a] text-center uppercase">Not Approved</a>
                     </td>
                    @endif
                    
                    <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">{{ date('d M Y',strtotime($apps->created_at)) }}</td>
                    <td class="w-[130px] text-[14px] font-[500] text-[#5E72E4] px-[10px] py-[10px] text-left whitespace-nowrap ">
                       <div class="flex items-center justify-center gap-[10px]">
                          <a href="{{ route('apps.add',['id'=>$apps->id]) }}" class="flex items-center justify-center w-[35px] bg-[#FFF3ED] py-[10px] w-[100px] border border-[#FED5C3] rounded-[4px] text-[14px] font-[500] text-[#D272D2] text-center">
                             <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7436 11.5797C13.8252 11.661 13.8899 11.7576 13.9341 11.864C13.9783 11.9704 14.001 12.0844 14.001 12.1996C14.001 12.3147 13.9783 12.4288 13.9341 12.5351C13.8899 12.6415 13.8252 12.7381 13.7436 12.8194L12.8182 13.7426C12.7369 13.8242 12.6403 13.8889 12.534 13.9331C12.4276 13.9773 12.3135 14 12.1984 14C12.0832 14 11.9692 13.9773 11.8628 13.9331C11.7564 13.8889 11.6598 13.8242 11.5785 13.7426L7.45399 9.61736L6.05094 13.2759C6.05094 13.2832 6.04511 13.2912 6.04146 13.2992C5.95218 13.5074 5.80363 13.6847 5.61431 13.8091C5.425 13.9334 5.20328 13.9993 4.97678 13.9986H4.91917C4.68295 13.9886 4.4555 13.9063 4.26756 13.7628C4.07963 13.6194 3.94028 13.4217 3.86835 13.1964L0.0566518 1.52288C-0.00878299 1.31872 -0.0167032 1.10048 0.0337606 0.892115C0.0842245 0.683751 0.191121 0.493319 0.342716 0.341725C0.494311 0.19013 0.684743 0.0832327 0.893107 0.0327688C1.10147 -0.017695 1.31971 -0.00977481 1.52387 0.05566L13.1974 3.86736C13.4205 3.94199 13.6159 4.08233 13.7578 4.26995C13.8997 4.45757 13.9816 4.68372 13.9927 4.91872C14.0039 5.15371 13.9437 5.38658 13.8201 5.58677C13.6965 5.78695 13.5153 5.94511 13.3002 6.04047L13.2769 6.04995L9.61835 7.45518L13.7436 11.5797Z" fill="#D272D2"/>
                             </svg>
                            </a>
                          <a href="{{ route('apps.integration',['id'=>$apps->id]) }}" class="flex items-center justify-center w-[35px] bg-[#FFF3ED] py-[10px] w-[100px] border border-[#FED5C3] rounded-[4px] text-[14px] font-[500] text-[#D272D2] text-center">
                             <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.000976562 14V10.6944L10.2677 0.447208C10.4232 0.304615 10.5951 0.19443 10.7833 0.116652C10.9715 0.0388738 11.1691 -1.52588e-05 11.376 -1.52588e-05C11.5829 -1.52588e-05 11.7838 0.0388738 11.9788 0.116652C12.1737 0.19443 12.3423 0.311096 12.4843 0.466652L13.5538 1.55554C13.7093 1.69814 13.8229 1.86665 13.8944 2.0611C13.966 2.25554 14.0015 2.44999 14.001 2.64443C14.001 2.85184 13.9655 3.04966 13.8944 3.23788C13.8234 3.4261 13.7098 3.59773 13.5538 3.75277L3.30654 14H0.000976562ZM11.3565 3.73332L12.4454 2.64443L11.3565 1.55554L10.2677 2.64443L11.3565 3.73332Z" fill="#D272D2"/>
                             </svg>
                            </a>
                       </div>
                    </td>
                 </tr>
                @endforeach
                @endif
             </table>
          </div>
       </div>
    </div>
 </div>
@stop