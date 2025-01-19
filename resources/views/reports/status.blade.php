@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] lg:p-[35px]">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-[15px] w-[100%] ">
                <div class="w-[100%] lg:w-[100%] bg-[#fff] p-[15px] md:p-[20px] rounded-[10px]">
                    <div class="flex items-center justify-between gap-[10px] mb-[10px]">
                        <h2 class="text-[20px] text-[#1A1A1A] font-[600]">Settings</h2>
                    </div>
                    <div class="flex items-center gap-[20px] mb-[20px]">
                        <h2 class="text-[16px] text-[#4D4D4D]  font-[600]">Disable conversion report</h2>
                        <div class="switch">
                            <label class="switch">
                                <input type="checkbox" >
                                <span class="slider round"></span>
                              </label>
                        </div>
                    </div>

                    <div class="flex items-center gap-[20px]">
                        <h2 class="text-[16px] text-[#4D4D4D] font-[600]">Disable conversion report</h2>
                        <div class="switch">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                              </label>
                        </div>
                    </div>

                    <div class="flex flex-col gap-[20px] bg-[#F6F6F6] border-[1px] border-[#E6E6E6] p-[40px] mt-[40px] mb-[40px]">
                        <h3 class="text-[20px] font-[600] text-[#4D4D4D]">Terms and condition</h3>
                        <p class="text-[14px] text-[#898989] font-[500]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <div class="flex gap-[10px] md:gap-[20px]">
                        <button class="flex items-center justify-center w-[110px] md:w-[170px] px-[4px] py-[12px] md:px-[15px] md:py-[15px] rounded-[5px] bg-[#E36F3D]  hover:bg-[#000] text-[12px] md:text-[14px] font-[500] text-[#fff] hover:text-[#fff]">Save Changes</button>
    
                        <button class="flex items-center justify-center w-[110px] md:w-[170px] px-[4px] py-[12px] md:px-[15px] md:py-[15px] rounded-[5px] bg-[#FFF3ED]  hover:bg-[#000] text-[14px] font-[500] text-[#E36F3D] hover:text-[#fff]">Cancle</button>
                    </div>
                </div>
            </div>
    </div>
@stop