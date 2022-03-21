@extends('layouts.front_end')
@section('content')
<div>
    <style>
        #headerOneCheckOut,
        #sticky-header,
        #headerThreeCheckout,
        #footerOneCheckOut {
            display: none;
        }
    </style>
    <x-slot name="title">
        Category
    </x-slot>
    <x-slot name="header">
        Category
    </x-slot>
    <!-- main-area -->
    <main>
        <div class="text-center py-2 rounded" style="background-color: black;position: fixed;width: 100%;z-index: 2;">
            {{-- <a href="{{ route('home') }}" class="float-left">
                <i class="fas fa-arrow-left pl-1" style="color: white;font-size: 20px;"></i>
            </a> --}}
            <span class="mt-1" style="color: white;font-weight: bold; font-size: 20px;">
                রেজিষ্ট্রেশন
            </span>
        </div>
        <!-- my-account-area -->
        <section class="my-account-area pattern-bg pt-50 pb-20"
            data-background="{{ URL::asset('venam/') }}/img/bg/pattern_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="my-account-bg"
                            data-background="{{ URL::asset('venam/') }}/img/bg/my_account_bg.png">
                            <div class="my-account-content">
                                <p style="color: #ff5c00;">আপনাকে স্বাগতম পাইকারী ইলেকট্রনিক্স অ্যাপে</p>
                                <div class="direct-login">
                                    <a class="btn-hover" href="{{route('sign-in')}}"
                                        style="background-color: red;font-weight: bold;"><i
                                            class="form-grp-btn"></i>লগইন</a>
                                    {{-- <a href="#" class="xing"><i class="fab fa-xing"></i>Login with xing</a> --}}
                                </div>
                                {{-- <x-jet-authentication-card> --}}
                                <x-slot name="logo">
                                </x-slot>
                                <x-jet-validation-errors class="mb-4" />
                                <form method="POST" action="{{ route('register') }}" class="login-form">
                                    @csrf
                                    <div class="form-grp">
                                        <x-jet-label for="name" value="{{ __('আপনার নাম') }}" />
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                            :value="old('name')" required autofocus autocomplete="name"
                                            placeholder="আপনার নাম লিখুন" />
                                    </div>
                                    <div class="form-grp">
                                        <x-jet-label for="business_name" value="{{ __('দোকানের নাম') }}" />
                                        <x-jet-input id="business_name" class="block mt-1 w-full" type="text"
                                            name="business_name" :value="old('business_name')" required autofocus
                                            autocomplete="business_name" placeholder="আপনার দোকানের নাম লিখুন" />
                                    </div>
                                    <div class="form-grp">
                                        <x-jet-label for="mobile" value="{{ __('মোবাইল নাম্বার') }}" />
                                        <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile"
                                            :value="old('mobile')" required placeholder="মোবাইল নাম্বার লিখুন" />
                                    </div>

                            <div class="form-grp">
                                <x-jet-label for="address" value="{{ __('জেলা') }}" />
                                <select class="custom-select district" name="district_id" required>
                                    <option value="">সিলেক্ট করুন</option>
                                    @foreach ($Districts as $zilla)
                                    <option value="{{$zilla->id}}"
                                        class="district-items division_id_{{$zilla->division_id}} " style="color:black;"
                                        @if($zilla->
                                        name=='Dhaka') selected @endif>{{$zilla->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-grp">
                                <x-jet-label for="address" value="{{ __('ডেলিভারি এড্রেস') }}" />
                                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address"
                                    :value="old('address')" placeholder="আপনার ডেলিভারি ঠিকানা লিখুন" />
                            </div>

                            <div class="form-grp">
                                <x-jet-label for="password" value="{{ __('পাসওয়ার্ড') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" placeholder="সর্বনিম্ন ৪ সংখ্যার পার্সওয়ার্ড দিন" />
                                {{-- <i class="far fa-eye"></i> --}}
                            </div>
                            <div class="form-grp">
                                <x-jet-label for="password_confirmation" value="{{ __('কনফার্ম পাসওয়ার্ড') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="কনফার্ম পাসওয়ার্ড দিন" />
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms" />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms
                                                of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                                Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                            @endif

                            <div class="form-grp-bottom">
                                <div class="remember">
                                    <input type="checkbox" id="check" checked>
                                    <label for="check">I agree to the <a href="{{route('privacy-policy')}}">Privacy
                                            Policy</a> and <a href="{{route('terms-conditios')}}"> Terms & Conditions
                                        </a> of Paikari Electronics.</label>
                                </div>
                            </div>
                            <div class="form-grp-btn">
                                <center>
                                    <button type="submit" class="btn"
                                        style="background: #ff6000;color:white;">রেজিস্ট্রার
                                    </button>
                                </center>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
</section>
<!-- my-account-area-end -->
</main>
<!-- main-area-end -->

</div>
@endsection
