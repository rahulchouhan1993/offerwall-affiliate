@extends('layouts.default')
@section('content')
<div class="px-[15px] py-[15px]  md:px-[20px] md:py-[20px] lg:px-[30px] lg:py-[30px]">
    <div class="flex flex-wrap md:flex-nowrap items-center gap-[15px] mb-[30px]">
        <div class="pinkbg flex flex-col justify-center  items-start gap-[5px] w-[100%] sm:w-[150px] md:w-[180px] lg:w-[200px] xl:w-[300px] 2xl:w-[365px] h-[130px]  rounded-[7px] lg:rounded-[10px] px-[15px] py-[15px] md:px-[20px] md:py-[20px] lg:px-[30px] lg:py-[30px] activeApps">
            <h2 class="text-[18px] font-[500] text-[#fff]">Active Apps</h2>
            <h3 class="text-[38px] font-[700] text-[#fff]">{{ $activeApps ?? 0 }}</h3>
        </div>

        <div class="orangebg flex flex-col justify-center bg-[#EF7947] items-start gap-[5px]  w-[100%] sm:w-[200px] md:w-[265px] lg:w-[365px] h-[130px]  rounded-[7px] lg:rounded-[10px] px-[30px] py-[30px] activeApps">
            <h2 class="text-[18px] font-[500] text-[#fff]">Revenue</h2>
            <h3 class="text-[38px] font-[700] text-[#fff]">$ {{ $totalPayouts ?? 0 }}</h3>
        </div>
    </div>

    <div class="bg-[#fff] px-[15px] py-[15px] lg:px-[30px] lg:py-[30px] rounded-[8px] lg:rounded-[10px]">
        <div class="flex justify-between flex-wrap sm:flex-nowrap gap-[10px] items-center flex-wrap md-flex-nowrap mb-[25px]">
            <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Conversion Matrix</h2>
            <div x-data="select" class="flex flex-wrap w-[100%] sm:w-[190px] md-flex-nowrap items-start gap-[15px] justify-end " @click.outside="open = false">
                <div class="relative w-[100%] ">
                    <input name="range" class="dateRange w-[100%] bg-[#F6F6F6] px-[12px] py-[12px] text-[13px] font-[600] text-[#4D4D4D] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" type="text" value="">
                </div>
            </div>
        </div>
        <div class="w-full">
            <canvas id="roundedLineChart"></canvas>
        </div>
    </div>
</div> 
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('roundedLineChart').getContext('2d');
    let myChart; // Store chart instance globally

    function fetchChartData() {
        const dateRange = $('.dateRange').val();

        fetch(`{{ route('chart.data') }}?date_range=${encodeURIComponent(dateRange)}`)
            .then(response => response.json())
            .then(data => {
                // ✅ Destroy previous chart if it exists
                if (myChart) {
                    myChart.destroy();
                }

                // ✅ Create new chart
                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels, // Months
                        datasets: [
                            {
                                label: 'Conversions',
                                data: data.conversionData, // Conversion Data
                                borderColor: '#d272d2', // Deep Purple Border
                                backgroundColor: 'rgba(210, 114, 210, 0.2)', // Soft Purple Fill
                                borderWidth: 2,
                                tension: 0.4, // Smooth line effect
                                fill: true,
                                pointRadius: 5,
                                pointBackgroundColor: '#d272d2'
                            },
                            {
                                label: 'Clicks',
                                data: data.clickData, // Clicks Data
                                borderColor: '#ff6384', // Red Border
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true,
                                pointRadius: 5,
                                pointBackgroundColor: '#ff6384'
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
                                enabled: true
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
                                    text: 'Count'
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching chart data:', error));
    }

    // Fetch chart data initially
    fetchChartData();

    // ✅ Re-fetch chart data when filters (date range) change
    $('.dateRange').on('change', function () {
        fetchChartData();
    });
});
</script>
@stop