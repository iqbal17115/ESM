@extends('layouts.front_end')
@section('content')
<div>
    <style>
        .offers-container {
            display: flex;
            justify-content: center;
        }

        .offer-one,
        .offer-two,
        .offer-three {
            width: 250px;
            height: 300px;
            background-color: white;
            border: 2px solid #aec6cf;
            margin: 10px;
            margin-top: 60px;
            position: relative;
            /* background-image: url('http://baconmockup.com/300/200'); */
            background-repeat: no-repeat;
            transition: all 600ms ease-in-out;
            transform: translateY(0px);
        }

        .animate {
            transform: translateY(-30px);
        }

        .circle {
            width: 70px;
            height: 70px;
            border-radius: 100%;
            background-color: #DE5233;
            position: absolute;
            top: -50px;
            left: 125px;
            transform: translateX(-50%);
            box-shadow: 0px 0px 0px 3px white, 0px 0px 0px 5px #DE5233;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 800ms ease-in-out;
        }

        .circle span {
            font-weight: 300;
            font-size: 20px;
            color: #fff;
        }

        .offer-one-container,
        .offer-two-container,
        .offer-three-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        a:hover {
            box-shadow: 0px 0px 0px 3px #DE5233 inset, 0px 0px 0px 5px white inset;
        }

        .bottom {
            width: inherit;
            height: 50%;
            background-color: #aec6cf;
            position: absolute;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .bottom h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .bottom p {
            font-weight: 300;
            font-size: 12px;
            margin-bottom: 10px;
        }

        #headerOneCheckOut,
        #sticky-header,
        #headerThreeCheckout,
        #footerOneCheckOut {
            display: none;
        }





        #mobileResponsiveFooter {
            display: none;
        }
    </style>
    <x-slot name="title">
        Category
    </x-slot>
    <x-slot name="header">
        Category
    </x-slot>

    <main>
        <!-- checkout-area -->
        <section class="checkout-area pb-20">
            <div class="text-center py-2 rounded"
                style="background-color: black;position: fixed;width: 100%;z-index: 2;">
                <a href="{{ route('home') }}" class="float-left">
                    {{-- <i class="fas fa-backspace" style="color: rgb(0, 0, 0);font-size: 30px;"></i> --}}
                    <i class="fas fa-arrow-left pl-1" style="color: white;font-size: 20px;"></i>
                </a>
                <span class="mt-1" style="color: white;font-weight: bold; font-size: 20px;">
                    Offers
                </span>
            </div>
            {{--
            <hr class="mb-0 mt-3">
            <br>
            <br> --}}
            <div class="container pt-50">
                <div class="border border-1 card ">
                    {{-- Start Card List --}}
                    <div class="card">
                        <div class="">

                            <div class="row">
                                @foreach ($offers as $offer)
                                <div class="col-md-3">
                                    <div class="offer-one-container">
                                        <a href="{{$offer->link}}">
                                        <div class="offer-one" style="background-image: url({{asset('storage/photo/'.$offer->image)}});background-size: cover;
                                            background-size: contain;">
                                            <div class="circle">
                                                <span>
                                                    @if($offer->discount_percent)
                                                     {{$offer->discount_percent}}%
                                                    @else
                                                    @if($currencySymbol)
                                                     <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                    @endif
                                                     {{$offer->discount}}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="bottom">
                                                <h1>{{$offer->title}}</h1>
                                                <p>{{$offer->description}}</p>
                                            </div>
                                        </div>
                                        </a>
                                        <a href="{{$offer->link}}" class="px-2">Offer</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    {{-- End Card List --}}
                </div>
            </div>

        </section>
        <!-- checkout-area-end -->
    </main>
    <!-- end row -->

</div>
