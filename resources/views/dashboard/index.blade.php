@extends('layouts.default')
@section('content')

<div class="px-[15px] py-[15px]  md:px-[20px] md:py-[20px] lg:px-[30px] lg:py-[30px]">
    <div class="flex flex-wrap md:flex-nowrap items-center gap-[15px] mb-[30px]">
        <div class="pinkbg flex flex-col justify-center  items-start gap-[5px] w-[100%] sm:w-[150px] md:w-[180px] lg:w-[200px] xl:w-[300px] 2xl:w-[365px] h-[130px]  rounded-[7px] lg:rounded-[10px] px-[15px] py-[15px] md:px-[20px] md:py-[20px] lg:px-[30px] lg:py-[30px] activeApps">
            <h2 class="text-[18px] font-[500] text-[#fff]">Active Apps</h2>
            <h3 class="text-[38px] font-[700] text-[#fff]">70</h3>
        </div>

        <div
            class="bluebg flex flex-col justify-center items-start gap-[5px]  w-[100%] sm:w-[150px] md:w-[180px] lg:w-[200px] xl:w-[300px] 2xl:w-[365px] h-[130px]  rounded-[7px] lg:rounded-[10px] px-[30px] py-[30px] activeApps">
            <h2 class="text-[18px] font-[500] text-[#fff]">Revenue</h2>
            <h3 class="text-[38px] font-[700] text-[#fff]">$100</h3>
        </div>
    </div>

    <div class="bg-[#fff] px-[15px] py-[15px] lg:px-[30px] lg:py-[30px] rounded-[8px] lg:rounded-[10px]">
        <h2 class="mb-[15px] text-[20px] font-[500] text-[#1A1A1A] mb-[15px]">Your Revenue</h2>
        <div class="w-full">
            <canvas id="roundedLineChart"></canvas>
        </div>
        <div class="flex items-center gap-[5px] md:gap-[15px]">
            <button
                class="w-[120px] md:w-[120px] lg:w-[130px] bg-[#E36F3D] px-[5px] py-[10px] rounded-[4px] text-[12px] m:text-[14px] font-[500] text-[#fff] text-center">Last
                7 Days</button>
            <button
                class="w-[120px] md:w-[120px] lg:w-[130px] bg-[#FFF3ED] px-[5px] py-[10px] rounded-[4px] text-[12px] m:text-[14px]  font-[500] text-[#E36F3D] text-center">Last
                15 Days</button>

            <button
                class="w-[120px] md:w-[125px] lg:w-[130px] bg-[#FFF3ED] px-[5px] py-[10px] rounded-[4px] text-[12px] m:text-[14px]  font-[500] text-[#E36F3D] text-center">Last
                30 Days</button>
        </div>
    </div>
</div> 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('roundedLineChart').getContext('2d');

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