@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] md:p-[35px]">
    <form method="POST" action={{ route('apps.add',['id'=>$id]) }}>
        @csrf
        <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[8px] md:rounded-[10px]">
            <h2 class="mb-[20px] text-[20px] text-[#1A1A1A] font-[600] ">
                Basic Information 
            </h2>  
            <div class="flex flex-wrap gap-x-[20px] gap-y-[30px] w-[100%] ">
                <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                    <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">App Name <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" name="appname" required class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->appName }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Your App/Game/site name.</div>
                </div>

                <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                    <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">App URL <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" name="appurl" required class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->appUrl }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Your website domain or AppStore link of your app.</div>
                </div>

                <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                    <label class="flex items-center gap-[5px] text-[14] text-[#898989]">Currency Name Singular <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" name="currencyname" required class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->currencyName }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Name your currency</div>
                </div>


                <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                    <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Currency Name Plural <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" required name="currencynamep" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->currencyNameP }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Name of your currency as a plural.</div>
                </div>

                <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                    <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Currency Value <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" name="currencyvalue" required class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->currencyValue }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[10px]">How many of your game/app currency units will a user earn for $1.00? </div>
                </div>

                <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                    <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Rounding <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" name="rounding" required class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->rounding }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[10px]">How many decimals your currency has.. </div>
                </div>
            </div>
        </div>

        <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[8px] md:rounded-[10px] mt-[30px]">
            <h2 class="mb-[20px] text-[20px] text-[#1A1A1A] font-[600] ">
                Postback 
            </h2>  
            <div class="flex flex-wrap gap-x-[20px] gap-y-[30px] w-[100%] ">
                <div class="flex flex-col gap-[10px] w-[100%] ">
                    <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Postback URL <div class="text-[#F23765] mt-[-2px]">*</div></label>
                    <input type="text" name="postback" required class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" value="{{ $appData->postback }}">
                    <div class="text-[12px] text-[#A1A1A1] leading-[15px]">Whenever a user completes an offer, we will make a call to this URL by sending all the information needed to help you to give the virtual currency to your users. Check the postback documentation in order to create your postback url. </div>
                </div>
            </div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@stop