<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>
                    <a href="{{ route('category') }}">Categories</a>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{ route('sub-category', ['id'=>$category->id]) }}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="mobile-menu mt-2 mb-2">
                <li class="border-0">
                    <a href="#">
                        Special Offer!
                    </a>
                </li>
                <li class="border-0">
                    <a href="https://1.envato.market/DdLk5" target="_blank">
                        Buy Porto!
                        <span class="tip tip-hot">Hot</span>
                    </a>
                </li>
            </ul>

            <ul class="mobile-menu">
                <li><a href="login.html">My Account</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('cart') }}">Cart</a></li>
                <li><a href="login.html" class="login-link">Log In</a></li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="#">
            <input type="text" class="form-control mb-0" placeholder="Search..." required />
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        <div class="social-icons">
            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->