<footer class="footer font2 main-footer">
    {{-- <div class="footer-top appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
        <div class="widget-newsletter d-flex align-items-center align-items-sm-start flex-column flex-xl-row  justify-content-xl-between">
            <div class="widget-newsletter-info text-center text-sm-left d-flex flex-column flex-sm-row align-items-center mb-1 mb-xl-0">
                <i class="icon-envolope"></i>
                <div class="widget-info-content">
                    <h5 class="widget-newsletter-title mb-0">
                        Subscribe To Our Newsletter</h5>
                    <p class="widget-newsletter-content mb-0">Get all the latest information on Events, Sales and Offers.
                    </p>
                </div>
            </div>
            <form action="#" class="mb-0 w-lg-max mt-2 mt-md-0">
                <div class="footer-submit-wrapper d-flex align-items-center">
                    <input type="email" class="form-control mb-0" placeholder="Your E-mail Address" size="40" required>
                    <button type="submit" class="btn btn-primary btn-sm text-transform-none">Subscribe
                        Now!</button>
                </div>
            </form>
        </div>
    </div> --}}

    <div class="footer-middle">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget">
                    <h3 class="widget-title">Customer Services</h3>
                    <div class="widget-content">
                        <ul>
                            <li><a href="{{route('contact-us')}}">Help Center</a></li>
                            <li>
                                <a href="{{route('return-policy')}}">
                                    Returns policy
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget">
                    <h3 class="widget-title">Menu</h3>
                    <div class="widget-content">
                        <ul>
                            <li>
                                <a href="{{route('privacy-policy')}}">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="{{route('terms-condition')}}">
                                    Terms & Conditions
                                </a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget">
                    <h3 class="widget-title">My Account</h3>
                    <div class="widget-content">
                        <ul>
                            <li>
                                <a href="{{route('my-account')}}">
                                    My Account
                                </a>
                            </li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget">
                    <h3 class="widget-title">Follow Us</h3>
                    <div class="widget-content">
                        <div class="social-icons">
                            <a @if($companyInfo) href="{{$companyInfo->facebook_link}}" @endif class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom d-sm-flex align-items-center">
        <div class="footer-left">
            <span class="footer-copyright">@if($companyInfo) {{ $companyInfo->name }} @endif &copy;	 {{ date("Y") }}. All Rights
                Reserved</span>
        </div>

        <div class="footer-right ml-auto mt-1 mt-sm-0">
            <div class="payment-icons mr-0">
                <!-- <span class="payment-icon visa" style="background-image: url(porto/asset(assets/images/payments/payment-visa.svg)"></span>
                <span class="payment-icon paypal" style="background-image: url(porto/assets/images/payments/payment-paypal.svg)"></span>
                <span class="payment-icon stripe" style="background-image: url(porto/assets/images/payments/payment-stripe.png)"></span>
                <span class="payment-icon verisign" style="background-image:  url(porto/assets/images/payments/payment-verisign.svg)"></span> -->
            </div>
        </div>
    </div>
    <!-- End .footer-bottom -->
</footer>
<!-- End .footer -->
