<aside class="col-lg-3 order-lg-first sidebar-home mobile-sidebar">
    <div class="sidebar-wrapper">
        <div class="side-menu-wrapper text-uppercase border-0 font2">
            {{-- <h2 class="side-menu-title ls-n-10">Specials and Offers</h2> --}}
            {{-- <nav class="side-nav">
                <ul class="menu menu-vertical with-icon sf-arrows d-block no-superfish">
                    <li style="color: #3a494e; font-size: 13px; text-transform: capitalize;">
                        <a href="#" class="p-0"><i class="icon-percent-shape"></i>Special
                            Offers<span class="sf-with-ul menu-btn"></span></a>
                        <ul>
                            <li><a href="#">Special Offers</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="#" class="p-0"><i class="icon-business-book"></i>Our
                            Recipes<span class="sf-with-ul menu-btn"></span></a>

                        <ul>
                            <li><a href="#">Our Recipes</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </nav>

            <h2 class="side-menu-title ls-n-10 pb-2" style="margin-left: 60px;" id="categories">Categories</h2>

            <nav class="side-nav" style="margin-left: 60px;">
                <ul class="menu menu-vertical sf-arrows d-block no-superfish">
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('search-category-wise',['id'=>$category->id]) }}" style="font-size: 12px; font-weight: normal;">{{$category->name}}<span
                                class="sf-with-ul menu-btn" style="font-size: 12px;"></span></a>

                                <div class="megamenu megamenu-fixed-width megamenu-one">
                                    <div class="row">
                                        @foreach ($category->SubCategory as $subCategory)
                                        <div class="col-lg-3 mb-1 pb-2">
                                            <a href="#" class="nolink pl-0 d-lg-none d-block">VARIATION
                                                1</a>
                                            <a href="{{ route('search-subCategory-wise', ['id' => $subCategory->id]) }}" class="nolink pl-0">{{$subCategory->name}}</a>
                                            <ul class="submenu">
                                                @foreach ($subCategory->SubSubCategory as $subSubCategory)
                                                <li><a href="{{ route('search-subSubCategory-wise', ['id' => $subSubCategory->id]) }}">{{ $subSubCategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            <!-- End .megamenu -->
                        </li>
                    @endforeach
                </ul>
            </nav>

            {{-- <h2 class="side-menu-title ls-n-10">Customer Services</h2> --}}

            {{-- <nav class="side-nav">
                <ul class="menu menu-vertical main-vertical sf-arrows d-block pb-0 no-superfish">
                    <li>

                    </li>
                    <li>
                        <a href="{{ route('product-search') }}">Products<span class="sf-with-ul menu-btn"></span></a>
                    </li>
                    <li>
                        <a href="{{ route('home')}}">
                            @if($companyInfo) {{ $companyInfo->name }} @endif
                        </a>
                    </li>
                </ul>
            </nav> --}}
        </div>
        <!-- End .side-menu-container -->
    </div>
    <!-- End .sidebar-wrapper -->
</aside>
<!-- End .col-lg-3 -->
