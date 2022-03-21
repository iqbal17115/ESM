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
                লগইন
            </span>
        </div>
        <!-- my-account-area -->
        <section class="my-account-area pattern-bg pt-20 pb-20"
            data-background="{{ URL::asset('venam/') }}/img/bg/pattern_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="my-account-bg"
                            data-background="{{ URL::asset('venam/') }}/img/bg/my_account_bg.png">
                            <div class="my-account-content pb-150">
                                <p style="color: #ff5c00;">আপনাকে স্বাগতম পাইকারী ইলেকট্রনিক্স অ্যাপে</p>
                                <div class="direct-login">
                                    <a class="btn-hover" href="{{route('register')}}"
                                        style="background-color: red;font-weight: bold;"><i
                                            class="form-grp-btn"></i>রেজিষ্ট্রেশন করুন</a>
                                    {{-- <a href="#" class="xing"><i class="fab fa-xing"></i>Login with xing</a> --}}
                                </div>
                                <form method="POST" action="{{ route('customer_sign_in') }}" class="login-form">
                                    @csrf
                                    <div class="form-grp">
                                        <x-jet-label for="mobile" value="{{ __('মোবাইল নাম্বার') }}" />
                                        <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile"
                                            :value="old('mobile')" required autofocus
                                            placeholder="মোবাইল নাম্বার লিখুন" />
                                    </div>
                                    <div class="form-grp">
                                        <x-jet-label for="password" value="{{ __('পাসওয়ার্ড') }}" />
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="current-password"
                                            placeholder="আপনার পাসওয়ার্ড দিন" />
                                        <i class="far fa-eye" aria-hidden="true" onclick="visibility()"></i>
                                    </div>
                                    <div class="form-grp-bottom">
                                        <div class="remember">
                                            <label for="remember_me" class="flex items-center">
                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                        <div class="forget-pass">
                                            <a href="#">forgot password</a>
                                        </div>
                                    </div>
                                    <div class="form-grp-btn">
                                        {{-- <a href="#" class="btn">Login</a> --}}
                                        <center>
                                            <button class="btn" type="submit" style="background: #ff6000;color:white;">
                                                {{ __('লগইন') }}
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
        <br><br><br><br>
    </main>
    <!-- main-area-end -->

</div>
<script>
    function visibility() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection
