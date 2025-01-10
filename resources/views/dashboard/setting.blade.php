@extends('layouts.default')
@section('content')


<div class="p-[15px] md:p-[35px] ">
        <div class="bg-[#fff] p-[15px] md:p-[20px] lg:p-[40px] rounded-[8px] md:rounded-[10px]">
            <h2 class="mb-[35px] text-[20px] text-[#1A1A1A] font-[600] ">
                Settings    
            </h2>   
            <div class="flex flex-col gap-[25px] w-[100%] ">
                <div class="flex flex-wrap md:flex-nowrap gap-[20px] w-[100%">
                    <div class="flex flex-col gap-[10px] w-[100%] md:w-[50%]">
                        <label for="" class="text-[14] text-[#898989]">First Name</label>
                        <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none">
                    </div>
                    
                    <div class="flex flex-col gap-[10px] w-[100%] md:w-[50%]">
                        <label for="" class="text-[14] text-[#898989]">Last Name</label>
                        <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none">
                    </div>
                </div>

                <div class="flex gap-[20px] w-[100%">
                    <div class="flex flex-col gap-[10px] w-[100%]">
                        <label for="" class="text-[14] text-[#898989]">Email</label>
                        <input type="Email" name="First Name" id="" placeholder="make@gmail.com" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none">
                    </div>
                </div>

                <div class="flex gap-[20px] w-[100%">
                    <div class="flex flex-col gap-[10px] w-[100%]">
                        <label for="" class="text-[14] text-[#898989]">Current Password</label>
                        <div class="relative">
                            <input type="password" name="First Name" id="" placeholder="**********" class="flex w-[100%] px-[15px] py-[15px] pr-[50px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none  focus:outline-none">
                            <button class="absolute top-[20px] right-[15px]"><svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.93336 3.8C8.34989 3.8 7.79031 4.03178 7.37773 4.44436C6.96515 4.85695 6.73337 5.41652 6.73337 6C6.73337 6.58348 6.96515 7.14306 7.37773 7.55564C7.79031 7.96822 8.34989 8.2 8.93336 8.2C9.51684 8.2 10.0764 7.96822 10.489 7.55564C10.9016 7.14306 11.1334 6.58348 11.1334 6C11.1334 5.41652 10.9016 4.85695 10.489 4.44436C10.0764 4.03178 9.51684 3.8 8.93336 3.8ZM8.93336 9.66667C7.9609 9.66667 7.02827 9.28036 6.34064 8.59272C5.65301 7.90509 5.2667 6.97246 5.2667 6C5.2667 5.02754 5.65301 4.09491 6.34064 3.40728C7.02827 2.71964 7.9609 2.33333 8.93336 2.33333C9.90583 2.33333 10.8385 2.71964 11.5261 3.40728C12.2137 4.09491 12.6 5.02754 12.6 6C12.6 6.97246 12.2137 7.90509 11.5261 8.59272C10.8385 9.28036 9.90583 9.66667 8.93336 9.66667ZM8.93336 0.5C5.2667 0.5 2.13537 2.78067 0.866699 6C2.13537 9.21933 5.2667 11.5 8.93336 11.5C12.6 11.5 15.7314 9.21933 17 6C15.7314 2.78067 12.6 0.5 8.93336 0.5Z" fill="#A1A1A1"/>
                                </svg>
                                </button>
                        </div>
                    </div>
                </div>

                <div class="flex gap-[20px] w-[100%">
                    <div class="flex flex-col gap-[10px] w-[100%]">
                        <label for="" class="text-[14] text-[#898989]">New Password</label>
                        <div class="relative">
                            <input type="password" name="First Name" id="" placeholder="************" class="flex w-[100%] px-[15px] py-[15px] pr-[50px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none  focus:outline-none">
                            <button class="absolute top-[20px] right-[15px]"><svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.93336 3.8C8.34989 3.8 7.79031 4.03178 7.37773 4.44436C6.96515 4.85695 6.73337 5.41652 6.73337 6C6.73337 6.58348 6.96515 7.14306 7.37773 7.55564C7.79031 7.96822 8.34989 8.2 8.93336 8.2C9.51684 8.2 10.0764 7.96822 10.489 7.55564C10.9016 7.14306 11.1334 6.58348 11.1334 6C11.1334 5.41652 10.9016 4.85695 10.489 4.44436C10.0764 4.03178 9.51684 3.8 8.93336 3.8ZM8.93336 9.66667C7.9609 9.66667 7.02827 9.28036 6.34064 8.59272C5.65301 7.90509 5.2667 6.97246 5.2667 6C5.2667 5.02754 5.65301 4.09491 6.34064 3.40728C7.02827 2.71964 7.9609 2.33333 8.93336 2.33333C9.90583 2.33333 10.8385 2.71964 11.5261 3.40728C12.2137 4.09491 12.6 5.02754 12.6 6C12.6 6.97246 12.2137 7.90509 11.5261 8.59272C10.8385 9.28036 9.90583 9.66667 8.93336 9.66667ZM8.93336 0.5C5.2667 0.5 2.13537 2.78067 0.866699 6C2.13537 9.21933 5.2667 11.5 8.93336 11.5C12.6 11.5 15.7314 9.21933 17 6C15.7314 2.78067 12.6 0.5 8.93336 0.5Z" fill="#A1A1A1"/>
                                </svg>
                                </button>
                        </div>
                    </div>
                </div>

                <div class="flex gap-[20px] w-[100%">
                    <div class="flex flex-col gap-[10px] w-[100%]">
                        <label for="" class="text-[14] text-[#898989]">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="First Name" id="" placeholder="***********" class="flex w-[100%] px-[15px] py-[15px] pr-[50px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none  focus:outline-none">
                            <button class="absolute top-[20px] right-[15px]"><svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.93336 3.8C8.34989 3.8 7.79031 4.03178 7.37773 4.44436C6.96515 4.85695 6.73337 5.41652 6.73337 6C6.73337 6.58348 6.96515 7.14306 7.37773 7.55564C7.79031 7.96822 8.34989 8.2 8.93336 8.2C9.51684 8.2 10.0764 7.96822 10.489 7.55564C10.9016 7.14306 11.1334 6.58348 11.1334 6C11.1334 5.41652 10.9016 4.85695 10.489 4.44436C10.0764 4.03178 9.51684 3.8 8.93336 3.8ZM8.93336 9.66667C7.9609 9.66667 7.02827 9.28036 6.34064 8.59272C5.65301 7.90509 5.2667 6.97246 5.2667 6C5.2667 5.02754 5.65301 4.09491 6.34064 3.40728C7.02827 2.71964 7.9609 2.33333 8.93336 2.33333C9.90583 2.33333 10.8385 2.71964 11.5261 3.40728C12.2137 4.09491 12.6 5.02754 12.6 6C12.6 6.97246 12.2137 7.90509 11.5261 8.59272C10.8385 9.28036 9.90583 9.66667 8.93336 9.66667ZM8.93336 0.5C5.2667 0.5 2.13537 2.78067 0.866699 6C2.13537 9.21933 5.2667 11.5 8.93336 11.5C12.6 11.5 15.7314 9.21933 17 6C15.7314 2.78067 12.6 0.5 8.93336 0.5Z" fill="#A1A1A1"/>
                                </svg>
                                </button>
                        </div>
                    </div>
                </div>

                <div class="flex gap-[10px] md:gap-[20px]">
                    <button class="flex items-center justify-center w-[110px] md:w-[170px] px-[4px] py-[12px] md:px-[15px] md:py-[15px] rounded-[5px] bg-[#E36F3D]  hover:bg-[#000] text-[12px] md:text-[14px] font-[500] text-[#fff] hover:text-[#fff]">Save Changes</button>

                    <button class="flex items-center justify-center w-[110px] md:w-[170px] px-[4px] py-[12px] md:px-[15px] md:py-[15px] rounded-[5px] bg-[#FFF3ED]  hover:bg-[#000] text-[14px] font-[500] text-[#E36F3D] hover:text-[#fff]">Discard</button>
                </div>
            </div>
        </div>
    </div>


@stop