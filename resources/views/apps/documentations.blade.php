@extends('layouts.default')
@section('content')

<div class="bg-[#f2f2f2] p-[15px] lg:p-[35px]">
    <div class="bg-[#fff] p-[15px] md:p-[20px] rounded-[10px] mb-[20px]">
        <div class="flex gap-[40px] items-start justify-start">
            <div class="w-[15%] min-w-[275px]">
                <h2 class="text-[1.25rem] font-[600] text-[#000] mb-[25px]">Postback</h2>
                <ul class="w-full">
                    <li class="">
                        <button
                            class="w-full block p-[8px] tab-button px-4 py-2 rounded-[5px] border-b-2 border-transparent text-[16px] font-[400] text-left">Post
                            Back</button>
                    </li>

                    <li class="">
                        <button
                            class="w-full block p-[8px] tab-button px-4 py-2 rounded-[5px] border-b-2 border-transparent text-[16px] font-[400] text-left text-[#5e6278]">Global
                            Post</button>
                    </li>
                </ul>
            </div>

            <div class="w-[75%]">
                <div class="tab-content">
                    <h2 class="text-[1.6rem] text-[#3f4254] mb-[15px] font-[800]">Post Back</h2>
                    <p class="text-[1.10rem] font-[400] text-[#7e8299] mb-[20px]">Efficiently syndicate flexible content
                        via cost effective initiatives completely leverage vertical quality.
                        Turn your mobile visitors into your best customers.</p>
                    <div class="mt-[20px] mb-[30px]">
                        <ul class="w-full flex items-start flex-wrap">
                            <li
                                class="w-full flex items-start gap-[15px] border-dashed border-b-[1px] border-b-[#e4e6ef] py-[14px]">
                                <label
                                    class="w-[15%] min-w-[100px] text-[1.075rem] font-[600] text-[#3f4254] mb-[0]">Parameter</label>
                                <label
                                    class="w-[85%] text-[1.075rem] font-[600] text-[#3f4254] mb-[0]">Description</label>


                            </li>

                            <li
                                class="w-full flex items-center gap-[15px] border-dashed border-b-[1px] border-b-[#e4e6ef] py-[14px]">
                                <label class="w-[15%] min-w-[100px] text-[15px] text-[#000] mb-[0]">{user_id}</label>
                                <p class="w-[85%] text-[15px] text-[#000] mb-[0]">Efficiently syndicate flexible content
                                    via cost effective initiatives completely leverage vertical quality.
                                    Turn your mobile visitors into your best customers.</p>
                            </li>
                            <li
                                class="w-full flex items-center gap-[15px] border-dashed border-b-[1px] border-b-[#e4e6ef] py-[14px]">
                                <label class="w-[15%] min-w-[100px] text-[15px] text-[#000] mb-[0]">{user_id}</label>
                                <p class="w-[85%] text-[15px] text-[#000] mb-[0]">Efficiently syndicate flexible content
                                    via cost effective initiatives completely leverage vertical quality.
                                    Turn your mobile visitors into your best customers.</p>
                            </li>
                        </ul>
                    </div>

                    <h2 class="text-[1.6rem] text-[#3f4254] mb-[15px] font-[800]">Forming the postback URL</h2>
                    <p class="text-[1.10rem] font-[400] text-[#7e8299] mb-[20px]">As we use macros to build the postback
                        URL, it's as simple as incorporating each macro in the place corresponding to the parameter
                        value you want in the URL to which you want us to call. This way, you can use parameter names of
                        your choice.
                        <br><br>
                        In the following example, we have decided to receive the value in our currency "points" in the
                        parameter "pointsToReward" and the ID of the user on our website in the parameter "user".
                    </p>
                    <div class="overflow-auto mb-[40px]  w-full p-4 bg-[#181c32] rounded mt-3">

                        <code class="flex ] ">
                            <pre class="w-full flex text-[#fff] mb-0 text-[.875em]">&lt;?php

                            $secret = ""; // check your app info, use the SECRET not the API SECRET

                            $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
                            $transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : null;
                            $reward = isset($_GET['reward']) ? $_GET['reward'] : null;
                            $signature = isset($_GET['signature']) ? $_GET['signature'] : null;

                            // validate signature
                            if(md5($user_id.$transaction_id.$reward.$secret) != $signature)
                            {
                                echo "ERROR: Signature doesn't match";
                                return;
                            }

                            ?&gt;</pre>
                                                            </code>
                    </div>

                    <h2 class="text-[1.6rem] text-[#3f4254] mb-[15px] font-[800]">Responding to the Postback</h2>
                    <p class="text-[1.10rem] font-[400] text-[#7e8299] mb-[20px]">Our server will expect the following
                        answers: OK or 1

                        Any other response will cause our server to mark the postback as failed.

                        Our servers wait for a response for a maximum time of 60 seconds before the 'timeout'. In this
                        case, it will be retried sending the same transaction up to 5 occasions during the following
                        hours. Please, check if the transaction ID sent to you was already entered in your database.
                        This will prevent to give twice the same amount of virtual currency to the user because of the
                        timeout.
                    </p>
                </div>


                <div class="tab-content hidden">
                <h2 class="text-[1.6rem] text-[#3f4254] mb-[15px] font-[800]">Global Postback</h2>
                    <p class="text-[1.10rem] font-[400] text-[#7e8299] mb-[20px]">For every offer complete, we will make a call to the Global Postback URL that you indicated in your account settings. We will attach the information that you have required when completing the postback url. <br> Our server will make a HTTP GET request to your server including the parameters that you have added. Here is the list of available macros.</p>
                    <div class="mt-[20px] mb-[30px]">
                        <ul class="w-full flex items-start flex-wrap">
                            <li
                                class="w-full flex items-start gap-[15px] border-dashed border-b-[1px] border-b-[#e4e6ef] py-[14px]">
                                <label
                                    class="w-[15%] min-w-[100px] text-[1.075rem] font-[600] text-[#3f4254] mb-[0]">Parameter</label>
                                <label
                                    class="w-[85%] text-[1.075rem] font-[600] text-[#3f4254] mb-[0]">Description</label>


                            </li>

                            <li
                                class="w-full flex items-center gap-[15px] border-dashed border-b-[1px] border-b-[#e4e6ef] py-[14px]">
                                <label class="w-[15%] min-w-[100px] text-[15px] text-[#000] mb-[0]">{user_id}</label>
                                <p class="w-[85%] text-[15px] text-[#000] mb-[0]">Efficiently syndicate flexible content
                                    via cost effective initiatives completely leverage vertical quality.
                                    Turn your mobile visitors into your best customers.</p>
                            </li>
                            <li
                                class="w-full flex items-center gap-[15px] border-dashed border-b-[1px] border-b-[#e4e6ef] py-[14px]">
                                <label class="w-[15%] min-w-[100px] text-[15px] text-[#000] mb-[0]">{user_id}</label>
                                <p class="w-[85%] text-[15px] text-[#000] mb-[0]">Efficiently syndicate flexible content
                                    via cost effective initiatives completely leverage vertical quality.
                                    Turn your mobile visitors into your best customers.</p>
                            </li>
                        </ul>
                    </div>

                    <h2 class="text-[1.6rem] text-[#3f4254] mb-[15px] font-[800]">Forming the postback URL</h2>
                    <p class="text-[1.10rem] font-[400] text-[#7e8299] mb-[20px]">Our system IP is, 3.22.177.178 you should accept only postbacks coming from this IP address.

As we use macros to build the postback URL, it's as simple as incorporating each macro in the place corresponding to the parameter value you want in the URL to which you want us to call. This way, you can use parameter names of your choice.

In the following example, we have decided to receive the revenue in the parameter "money" and the transaction ID in the parameter "leadId".
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop