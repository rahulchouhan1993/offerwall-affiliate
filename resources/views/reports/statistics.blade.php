@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] md:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
       <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
          <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Graph & Statistics</h2>
          <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#D272D2] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Export</button>
       </div>
       <form method="get" id="filterStats" >
       <div class="flex flex-col items-center justify-center gap-[15px]">
          <div class="w-full flex flex-col gap-[10px]">
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label
                   class="min-w-[160px] w-[100%] md:w-[10%] text-[14px] font-[500] text-[#898989] ">Group by:</label>
                <select name="groupBy" class="sel2fld w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                   <option value="hour" @if($recordGroupBy=='hour') selected @endif>Hour</option>
                   <option value="day" @if($recordGroupBy=='day') selected @endif>Date</option>
                   <option value="month" @if($recordGroupBy=='month') selected @endif>Month</option>
                   <option value="country" @if($recordGroupBy=='country') selected @endif>Country</option>
                   <option value="browser" @if($recordGroupBy=='browser') selected @endif>Browser</option>
                   <option value="device" @if($recordGroupBy=='device') selected @endif>Device Brand</option>
                   <option value="device_model" @if($recordGroupBy=='device_model') selected @endif>Device Model</option>
                   <option value="os" @if($recordGroupBy=='os') selected @endif>Device OS</option>
                   <option value="offer" @if($recordGroupBy=='offer') selected @endif>Offer</option>
                </select>
             </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Range:</label>
                <input name="range" class="dateRange w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" type="text" value="{{ $completeDate }}" />
             </div>
             <div class="w-[100%] flex flex-wrap lg:flex-nowrap items-start xl:items-center justify-between gap-[10px]">
                <label class="min-w-[160px] w-[100%] lg:w-[10%] text-[14px] font-[500] text-[#898989] ">Filter by:</label>
                <div class="w-[100%] xl:w-[85%] 2xl:w-[90%] flex justify-between flex-wrap xl:flex-nowrap  items-center gap-[5px] md:gap-[8px] lg:gap-[10px] xl:gap-[15px]">
                   <div class="w-[100%] lg:w-[100%] xl:w-[60.5%]  2xl:w-[70.7%] flex flex-wrap xl:flex-nowrap items-center gap-[10px]">
                      <select name="filterBy" class="sel2fld filterByDrop w-[100%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                        <option value="">Select</option>
                        <option value="country">Country</option>
                        {{-- <option value="devices">Device</option> --}}
                        <option value="os" >Operating System</option>
                        <option value="offer" >Offer</option>
                      </select>
                      <select  class="search-input-filter w-[100%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" name="filterByValue">
                      </select>
                      
                      
                   </div>
                   <div class="w-[100%] lg:w-[100%] xl:w-[24%] 2xl:w-[24%] flex items-center justify-end  gap-[10px]">

                   <a href="javascript:void(0);" class="addCustomFilter w-[90px] xl:w-[120px] bg-[#D272D2] px-[20px] py-[11px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center" >Add</a>
                      <button
                         class="w-[140px] bg-[#D272D2] px-[20px] py-[11px] w-[90px] xl:w-[120px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center" type="submit">Apply</button>
                      <a href="{{ route('report.statistics') }}"
                         class="w-[140px] bg-[#F5EAF5] px-[20px] py-[11px] w-[90px] xl:w-[120px] border border-[#F5EAF5] rounded-[4px] text-[14px] font-[500] text-[#D272D2] text-center" >Clear</a>
                   </div>
                </div>
             </div>
             <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
               <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Active filters:</label>
                  <div class="w-[90%] flex flex-wrap items-center gap-[10px] allFilterInCommon">
                     @if(!empty($filterByValue))
                        @foreach ($filterByValue as $k => $inValue)
                        <div class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none"> <input type="hidden" name="filterIn[{{ $k }}][]" value="{{ $inValue[0] }}"><input type="hidden" name="filterInValue[{{$k }}][]" value="{{ $filterByText[$k][0] }}"> {{ $filterByText[$k][0] }} <button class="removeActiveOne w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]"> <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg> </button> </div>
                        @endforeach
                     @endif
                  </div>
             </div>
          </div>
       </div>
       </form>
       <div class="my-[20px]">
          <canvas id="statisticsGraph"></canvas>
       </div> 
      @php 
         $headingArray = ['hour' => 'Hour','day' => 'Day','month' => 'Month','country' => 'Country','browser' => 'Browsers','device' => 'Devices','device_model' => 'Device Model','os' => 'Operating System'];
      @endphp
      <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
          <div class="w-[100%] overflow-x-scroll tableScroll">
             <table
                class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                <tr>
                   <th
                      class="bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">
                      {{ $headingArray[$recordGroupBy] ?? 'Hour' }}
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Views
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Clicks
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Conversions
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      CVR
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      EPC
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      EPU
                   </th>
                   <th
                      class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                      Payout
                   </th>
                </tr>
                @if(!empty($allStatistics['stats']))
                @foreach ($allStatistics['stats'] as $stats)
                
                <tr>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $stats['slice'][$recordGroupBy] }}
                   </td>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $stats['views'] }}
                   </td>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $stats['traffic']['uniq'] ?? 'N/A' }}
                   </td>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                       {{ $stats['actions']['confirmed']['count'] ?? 'N/A' }}
                   </td>
                   @php 
                     $confirmCount = $stats['actions']['confirmed']['count'] ?? 0; 
                     $trafficCount = $stats['traffic']['uniq'] ?? 0;
                     if($trafficCount>0){
                        $percentage = number_format(($confirmCount / $trafficCount) * 100, 2).' %';
                     }else{
                        $percentage = 'N/A';
                     }
                  @endphp
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      {{ $percentage }} 
                   </td>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      $ {{ $stats['affiliate_epc'] ?? 'N/A' }}
                   </td>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      N/A
                   </td>
                   <td
                      class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                      $ {{ $stats['epc'] ?? 'N/A' }}
                   </td>
                </tr>
                @endforeach
                @endif
             </table>
          </div>
          
       </div>
    </div>
 </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('statisticsGraph').getContext('2d');

        fetch("{{ route('chart.data') }}")
            .then(response => response.json())
            .then(data => {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels, // Dynamic labels from API
                        datasets: [
                            {
                                label: 'Rounded Line Dataset',
                                data: data.lineData, // Dynamic data from API
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderWidth: 2,
                                tension: 0.6, // Smoothness of the line (rounded effect)
                                fill: true, // Optional: Fill area under the line
                                pointRadius: 5, // Point size
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            tooltip: {
                                enabled: true // Show tooltips on hover
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Months'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Values'
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching chart data:', error));
   });

   

   $(document).on('change','.filterByDrop',function(){
      $('.loader-fcustm').show();
      $.ajax({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: '{{ route("filterGroup") }}/'+$(this).val(), // URL to send request
         type: 'GET', // HTTP method
         success: function (response) {
            $('.loader-fcustm').hide();
            $('.search-input-filter').html(response).select2();
         },
         error: function (xhr) {
            $('#response').html('<p>An error occurred. Please try again.</p>');
         }
      });
   });

   $(document).on('click','.addCustomFilter',function(){
      if($('.search-input-filter').val()!='' && $('.filterByDrop').val()!=''){
         $('.allFilterInCommon').append('<div class=" flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none"><input type="hidden" name="filterIn['+$('.filterByDrop').val()+'][]" value="'+$('.search-input-filter').val()+'"><input type="hidden" name="filterInValue['+$('.filterByDrop').val()+'][]" value="'+$('.search-input-filter option:selected').text()+'"> '+$('.search-input-filter option:selected').text()+' <button class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]"> <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg> </button> </div>');
         $('.search-input-filter').val('');
      }
   });

   $('#filterStats').on('submit',function(){
      $('.loader-fcustm').show();
   })

   $(document).on('click','.removeActiveOne',function(){
      $(this).parent().remove();
   });

   $('.search-input-filter').select2();
</script>

@stop