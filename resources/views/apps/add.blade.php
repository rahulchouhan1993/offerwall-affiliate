@extends('layouts.default')
@section('content')
<div class="bg-[#f2f2f2] p-[15px] md:p-[35px]">
    <form method="POST">
        @csrf
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[8px] md:rounded-[10px]">
        <h2 class="mb-[20px] text-[20px] text-[#1A1A1A] font-[600] ">
            Basic Information(The Cash Bag)    
        </h2>  
        <div class="flex flex-wrap gap-x-[20px] gap-y-[30px] w-[100%] ">
            <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">App Name <div class="text-[#F23765] mt-[-2px]">*</div></label>
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="The Cash Bag">
                <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Your App/Game/site name.</div>
            </div>

            <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">App URL <div class="text-[#F23765] mt-[-2px]">*</div></label>
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="https://play.google.com/store/apps/details?id">
                <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Your App/Game/site name</div>
            </div>

            <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Currency Name Singular <div class="text-[#F23765] mt-[-2px]">*</div></label>
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="Cash">
                <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Name your currency</div>
            </div>


            <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Currency Name Plural <div class="text-[#F23765] mt-[-2px]">*</div></label>
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="Cash">
                <div class="text-[12px] text-[#A1A1A1] leading-[10px]">Name your currency</div>
            </div>

            <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Currency Value <div class="text-[#F23765] mt-[-2px]">*</div></label>
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="500">
                <div class="text-[12px] text-[#A1A1A1] leading-[10px]">How many of your game.</div>
            </div>

            <div class="flex flex-col gap-[10px] w-[100%] md:w-[32%]">
                <label for="" class="flex items-center gap-[5px] text-[14] text-[#898989]">Rounding <div class="text-[#F23765] mt-[-2px]">*</div></label>
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="No decimals">
                <div class="text-[12px] text-[#A1A1A1] leading-[10px]">How many decimals</div>
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
                <input type="text" name="First Name" id="" class="flex px-[15px] py-[15px] rounded-[5px] bg-[#F6F6F6] text-[14px] text-[#4D4D4D] font-[600] hover:outline-none focus:outline-none" placeholder="The Cash Bag">
                <div class="text-[12px] text-[#A1A1A1] leading-[15px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</div>
            </div>
        </div>
    </div>
</form>
</div>
@stop