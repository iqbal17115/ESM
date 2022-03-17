<footer class="footer bg-dark position-relative">
            <div class="footer-middle">
                <div class="container position-static">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <a href="demo7.html">
                                    <img src="@if ($companyInfo) {{ asset('storage/photo/' . $companyInfo->logo) }} @endif" style="height:44px;width:111px;" alt="Logo" class="logo-footer">
                                </a>
                                <p class="m-b-4 ls-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec
                                    vestibulum magna, et dapibus lacus. Duis nec vestibulum magna, et dapibus lacus.</p>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                        title="Linkedin"></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                            <div class="widget mb-2">
                                <h4 class="widget-title pb-1">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Shipping & Delivery</a></li>
                                    <li><a href="#">Orders History</a></li>
                                    <li><a href="#">Advanced Search</a></li>
                                    <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="demo7-about.html">About Us</a></li>
                                    <li><a href="#">Corporate Sales</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                            <div class="widget widget-post">
                                <h4 class="widget-title pb-1">Latest News</h4>

                                <ul class="links">
                                    <li><a href="#">Top Jeans Collection<br /><span class="font1">JULY 23,
                                                2021</span></a></li>
                                    <li><a href="#">Post Format Standard<br /><span class="font1">FEBRUARY 26,
                                                2020</span></a></li>
                                    <li><a href="#">Post Format Video<br /><span class="font1">FEBRUARY 26,
                                                2019</span></a></li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Subscribe newsletter</h4>
                                <p class="mb-2 ls-0">Get all the latest information on events, sales and offers. Sign up
                                    for
                                    newsletter:
                                </p>
                                <form action="#" class="mb-0">
                                    <input type="email" class="form-control" placeholder="Email address" required>

                                    <input type="submit" class="btn btn-primary ls-10 shadow-none" value="Subscribe">
                                </form>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">© @if ($companyInfo) {{ $companyInfo->name }} @endif. {{ date("Y") }}. All Rights Reserved</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <div class="payment-icons mr-0">
                            <span class="payment-icon visa"
                                style="background-image: url({{ URL::asset('porto/') }}/assets/images/payments/payment-visa.svg)"></span>
                            <span class="payment-icon paypal"
                                style="background-image: url({{ URL::asset('porto/') }}/assets/images/payments/payment-paypal.svg)"></span>
                            <span class="payment-icon stripe"
                                style="background-image: url({{ URL::asset('porto/') }}/assets/images/payments/payment-stripe.png)"></span>
                            <span class="payment-icon verisign"
                                style="background-image:  url({{ URL::asset('porto/') }}/assets/images/payments/payment-verisign.svg)"></span>
                        </div>
                    </div>
                </div>
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->