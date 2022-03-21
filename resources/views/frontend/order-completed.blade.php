@extends('layouts.front_end')
@section('content')
<div>
    <style>
        #headerOneCheckOut,
        #sticky-header,
        #headerThreeCheckout,
        #footerOneCheckOut, #mobileResponsiveFooter {
            display: none;
        }
    </style>
    <x-slot name="title">
        Home
    </x-slot>
    <x-slot name="header">
        Home
    </x-slot>
    <main>


        <!-- order-complete-area -->
        <section class="order-complete-area pt-20 pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="order-complete-bg" data-background="img/bg/order_comp_bg.png"
                            style="background-color: rgb(241, 232, 232);">
                            <div class="order-complete-content">
                                <div style="color: black; font-weight: bold;"> আপনার অর্ডারটি কমপ্লিট হয়েছে!</div>
                                <div class="pt-2" style="color: black;font-size: 15px;"><span class=""
                                        style="color: red; font-size: 25px;">*</span>অর্ডার নাম্বার - <span
                                        style="color: red; font-weight: bold;">{{$orderCode}}</span></div>
                                <br><br>
                                <div style="color: black;font-weight: bold;">অর্ডার করার জন্যে আপনাকে অসংখ্য ধন্যবাদ!
                                </div>
                                <div class="py-0 my-0" style="color: black;">আপনার অর্ডারটি প্রসেসিং অবস্থায় আছে,আমরা
                                    খুব অল্প সময়ের মধ্যে আপনার অর্ডারটি ডেলিভারি করে দিব,ইনশা-আল্লাহ।</div>
                                <a href="{{route('my-account')}}" class="btn" style="background-color: brown;">আপনার
                                    অর্ডার গুলি দেখুন</a>
                                <a href="{{route('home')}}" class="btn mt-2">আরও অর্ডার করুন</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- order-complete-area-end -->
    </main>
</div>


@endsection
