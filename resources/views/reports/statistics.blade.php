@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] md:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
        <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
            <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Graph & Statistics</h2>
           
        </div>

        <div class="flex flex-col items-center justify-center gap-[15px]">
            <div class="w-full flex flex-col gap-[10px]">
                <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                    <label
                        class="min-w-[160px] w-[100%] md:w-[10%] text-[14px] font-[500] text-[#898989] ">Group by:</label>

                        <select
                        class="w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                        <option>Hour</option>
                        <option>Hour 2</option>
                    </select>
                </div>

                <div class="w-[100%] flex flex-col lg:flex-row items-start lg:items-center justify-start gap-[10px]">
                    <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Range:</label>
                    <select
                        class="w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                        <option>Select date</option>
                        <option>Select date 2</option>
                    </select>
                </div>

              
                <div class="w-[100%] flex items-center flex-wrap justify-end lg:flex-nowrap gap-[10px]">
                    <label class="min-w-[160px] w-[10%] text-[14px] font-[500] text-[#898989] ">Filter by:</label>
                    <div class="w-[100%] xl:w-[90%] flex flex-wrap lg:flex-nowrap  items-center gap-[5px] md:gap-[8px] lg:gap-[10px] xl:gap-[15px]">
                        <div class="w-[100%] lg:w-[65%] xl:w-[75%] flex flex-wrap xl:flex-nowrap items-center gap-[10px]">
                            <select
                                class="w-[100%] bg-[#F6F6F6] px-[15px] py-[12px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                                <option>Select date</option>
                                <option>Select date 2</option>
                            </select>
                        </div>
                        <div class="w-[100%] lg:w-[35%] xl:w-[24%] flex items-center justify-end  gap-[10px]">
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
                                class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]"><svg
                                    width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                        </div>

                        <div class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                            Filter001
                            <button
                                class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]"><svg
                                    width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                        </div>

                        <div
                            class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                            Filter001
                            <button
                                class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]"><svg
                                    width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                        </div>

                        <div
                            class="flex items-center gap-[20px] bg-[#F6F6F6] pl-[15px] text-[14px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                            Filter001
                            <button
                                class="w-[40px] h-[40px] flex items-center justify-center gap-[5px] bg-[#fff] border-l-[1px] border-l-[#E6E6E6]"><svg
                                    width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4033 1.29822L0.999773 10.7018" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.4033 10.7018L0.999772 1.29822" stroke="#A1A1A1" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="my-[20px]">
            <canvas id="statisticsGraph"></canvas>
        </div>


        <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">

            <div class="w-[100%] overflow-x-scroll tableScroll">
                <table
                    class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                    <tr>
                        <th
                            class="bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">
                            Hour</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            Views</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            Clicks</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            Conversions</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            CVR</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            EPC</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            EPU</th>
                        <th
                            class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">
                            Payout</th>
                        
                    </tr>

                    <tr>
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            00</td>
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            11</td>
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            11</td>
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            1</td>
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            9.09%
                        </td>

                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            $0.01</td>
                       
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            $0.000</td>
                        <td
                            class="border-b-[1px] border-b-[#E6E6E6] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            $0.07</td>
                       
                    </tr>


                    <tr>
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            00</td>
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            11</td>
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            11</td>
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            1</td>
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            9.09%
                        </td>

                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            $0.01</td>
                       
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            $0.000</td>
                        <td
                            class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">
                            $0.07</td>
                       
                    </tr>
                </table>
            </div>


            <div class="w-[100%] flex flex-col gap-[10px] md:gap-[0] md:flex-row justify-between mt-[30px]">
                <h2 class="text-[14px] text-[#808080] font-[500]">Showing 1 to 4 of 4 entries</h2>
                <div class="inline-flex gap-[8px]">
                    <a href="#"
                        class="group inline-flex gap-[8px] items-center bg-[#FFF3ED] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#E36F3D] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1L1 5L5 9" stroke="#E36F3D" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="group-hover:stroke-[#fff] " />
                        </svg> Previous</a>

                    <a href="#"
                        class="inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">1</a>

                    <a href="#"
                        class="inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">2</a>

                    <a href="#"
                        class="inline-flex gap-[8px] items-center bg-[#fff] border border-[#E6E6E6] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#808080] text-center hover:bg-[#E36F3D] hover:text-[#fff]">3</a>


                    <a href="#"
                        class="group inline-flex gap-[5px] items-center bg-[#FFF3ED] border border-[#FED5C3] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#E36F3D] text-center hover:bg-[#E36F3D] hover:text-[#fff]">
                        Next <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L1 9" stroke="#E36F3D" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="group-hover:stroke-[#fff] " />
                        </svg> </a>


                </div>
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
</script>
@stop