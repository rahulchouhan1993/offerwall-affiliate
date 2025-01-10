@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] lg:p-[35px]">
        <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
            <div class="flex items-center justify-between gap-[25px] w-[100%]  mb-[15px]">
                <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Overview</h2>
                <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#E36F3D] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Export</button>
            </div>

            <div class="flex items-center justify-between flex-wrap lg:flex-nowrap gap-[10px]">
                <div class="w-[100%] md:w-auto flex items-center flex-wrap md:flex-nowrap gap-[10px]">
                    <select class="w-[100%]  bg-[#F6F6F6] px-[15px] py-[12px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none">
                        <option>Status</option>
                        <option>Status 2</option>
                    </select>
                    <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#E36F3D] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Apply</button>
                    <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#FFF3ED] px-[20px] py-[10px] w-[100px] border border-[#FED5C3] rounded-[4px] text-[14px] font-[500] text-[#E36F3D] text-center">Clear</button>
                </div>

                <div class="inline-flex w-[100%] md:w-auto items-center gap-[10px]">
                    <input type="text" name="" id="" class="w-[100%] md:w-[100%] lg:w-[90%] bg-[#F6F6F6] px-[15px] py-[10px] text-[12px] font-[500] text-[#808080] border-[1px] border-[#E6E6E6] rounded-[4px] hover:outline-none focus:outline-none" placeholder="Search">
                    <button class="w-[100px] md:w-[110px] lg:w-[140px] bg-[#E36F3D] px-[20px] py-[10px] w-[100px] rounded-[4px] text-[14px] font-[500] text-[#fff] text-center">Search</button>
                </div>
            </div>



            <div class="flex flex-col justify-between items-center gap-[5px] w-[100%] mt-[30px] ">
                
                <div class="w-[100%] overflow-x-scroll tableScroll">
                    <table class="w-[100%] border-collapse border-spacing-0 rounded-[10px] border-separate border border-[#E6E6E6]">
                        <tr>
                            <th class="bg-[#F6F6F6] rounded-tl-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap ">Postback URL</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Conversion ID</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Affiliate</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Offer</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Goal</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Status</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Payouts</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap"></th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">HTTP code</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Error</th>
                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Date</th>




                            <th class="bg-[#F6F6F6] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">Comment</th>
                            <th class="bg-[#F6F6F6] rounded-tr-[10px] text-[14px] font-[500] text-[#1A1A1A] px-[10px] py-[13px] text-left whitespace-nowrap">ID</th>
                        </tr>

                        <tr>
                            <td class="max-w-[200px] text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-normal ">https://img.freepik.com/premium-vector/faceless-bowler-player-throwing-ball-gradient-lights-line-against</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">background_1302-37098w=996</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">(27) Wonnads / Innoovative</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">hid=YmMyMTA2M2Y</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">1</td>

                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap "><div class="inline-flex bg-[#F3FEE7] border border-[#BCEE89] rounded-[5px] px-[10px] py-[4px] text-[12px] font-[600] text-[#6EBF1A] text-center uppercase">Aprroved</div></td>

                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">USD 1</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">-</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">200</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">-</td>
                            <td class="text-[14px] font-[500] text-[#808080] px-[10px] py-[10px] text-left whitespace-nowrap ">17.12.2024</td>
                           
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
@stop