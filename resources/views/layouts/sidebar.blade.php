<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background-color: #11324D;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('/dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('setting.companyinfo')}}">Company Profile</a></li>
                    <li><a href="{{route('setting.currency')}}">Currency</a></li>
                    <li><a href="{{route('setting.vat')}}">Vat</a></li>
                    <li><a href="{{route('setting.warehouse')}}">Warehouse</a></li>
                    <li><a href="{{route('setting.payment-method')}}">Payment Method</a></li>
                    </ul>
                </li>

                <!-- Start Product Menu -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Products</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.product')}}">Add Product</a></li>
                        <li><a href="{{route('product.product-list')}}">All Product List</a></li>
                        <li><a href="{{route('product.category')}}">Category</a></li>
                        <li><a href="{{route('product.sub-category')}}">Sub Category</a></li>
                        <li><a href="{{route('product.sub-sub-category')}}">Sub Sub Category</a></li>
                        <li><a href="{{route('product.brand')}}">Brand</a></li>
                        <li><a href="{{route('product.unit')}}">Unit</a></li>
                    </ul>
                </li>
                <!-- End Product Menu -->
                <!-- Start Contact -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Contact</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contact-info.contact-category')}}">Contact Category</a></li>
                        <li><a href="{{route('contact-info.customer')}}">Customer</a></li>
                        <li><a href="{{route('contact-info.supplier')}}">Supplier</a></li>
                        <li><a href="{{route('contact-info.staff')}}">Staff</a></li>
                    </ul>
                </li>
                <!-- End Contact -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
