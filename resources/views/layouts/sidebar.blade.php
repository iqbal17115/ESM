<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('/admin')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">01</span>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view processing_order')
                        <li><a href="{{route('order.order-processing')}}">Processing Order</a></li>
                        @endcan
                        @if(!Auth::user()->hasAnyRole('manager'))
                        @can('view shipped_order')
                        <li><a href="{{route('order.order-shipped')}}">Shipped Order</a></li>
                        @endcan
                        @can('view delivered_order')
                        <li><a href="{{route('order.order-delivered')}}">Delivered Order</a></li>
                        @endcan
                        @can('view returned_order')
                        <li><a href="{{route('order.order-returned')}}">Returned Order</a></li>
                        @endcan
                        @can('view all_order')
                        <li><a href="{{route('order.order-cancel')}}">Cancelled Order</a></li>
                        <li><a href="{{route('order.order-list')}}">All Order</a></li>
                        @endcan
                        @endif
                    </ul>
                </li>
                @if(!Auth::user()->hasAnyRole('manager'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Products</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        {{-- @can('view product') --}}
                        <li><a href="{{route('product.product')}}">Add Product</a></li>
                        <li><a href="{{route('product.product-list')}}">All Product List</a></li>
                        {{-- @endcan --}}
                        @can('view category')
                        <li><a href="{{route('product.category')}}">Category</a></li>
                        @endcan
                        <li><a href="{{route('product.sub-category')}}">Sub Category</a>
                        </li>
                        <li><a href="{{route('product.sub-sub-category')}}">Sub Sub Category</a></li>
                        @can('view brand')
                        <li><a href="{{route('product.brand')}}">Brand</a></li>
                        @endcan
                        @can('view unit')
                        <li><a href="{{route('product.unit')}}">Unit Info</a></li>
                        @endcan

                        <li><a href="{{route('product.product-feature')}}">Product Feature</a></li>

                        {{-- <li><a href="{{route('product.color')}}">Color</a></li> --}}
                        {{-- <li><a href="{{route('product.size')}}">Size</a></li> --}}
                    </ul>
                </li>
                @endif
                @if(!Auth::user()->hasAnyRole('manager'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Offer</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('offer.offer')}}">Offer</a></li>
                    </ul>
                </li>
                @endif
                @if(!Auth::user()->hasAnyRole('manager') && !Auth::user()->hasAnyRole('editor'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Ecommerce Setting</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        @can('view slider')
                        <li><a href="{{route('setting.slider')}}">Slider</a></li>
                        @endcan
                        @can('view breaking_news')
                        <li><a href="{{route('setting.breaking-news')}}">Breaking News</a></li>
                        @endcan
                        @can('view company_info')
                        <li><a href="{{route('setting.companyinfo')}}">Company Info</a></li>
                        @endcan
                        @can('view vat')
                        <li><a href="{{route('setting.vat')}}">Vat</a></li>
                        @endcan
                        @can('view shipping_charge')
                        <li><a href="{{route('setting.shipping-charge')}}">Shipping Charge</a></li>
                        @endcan
                        @can('view currency')
                        <li><a href="{{route('setting.currency')}}">Currency</a></li>
                        @endcan
                        @can('view delivery_method')
                        <li><a href="{{route('setting.delivery-method')}}">Delivery Method</a></li>
                        @endcan
                        @can('view invoice_setting')
                        <li><a href="{{route('setting.invoice-setting')}}">Invoice Setting</a></li>
                        @endcan
                        @can('view payment_method')
                        <li><a href="{{route('setting.payment-method')}}">Payment Method</a></li>
                        @endcan
                        @can('view coupon_code')
                        <li><a href="{{route('setting.coupon-code')}}">Coupon code</a></li>
                        @endcan

                        @can('view point_policy')
                        <li><a href="{{route('setting.point-policy')}}">Point Policy</a></li>
                        @endcan
                        @can('view language')
                        <li><a href="{{route('setting.language')}}">Language</a></li>
                        @endcan
                        <li><a href="{{route('setting.manage-language')}}">Manage Language</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Vendor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view vendor')
                        <li><a href="{{route('vendor.vendor-list')}}">Panding List</a></li>
                        <li><a href="{{route('vendor.vendor-approved-list')}}">Approved List</a></li>
                        <li><a href="{{route('vendor.vendor-cancel-list')}}">Cancel List</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Contact Us</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('message')}}">Messages</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Contact Info</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view contact')
                        <li><a href="{{route('contact-info.contact-category')}}">Contact Category</a></li>
                        <li><a href="{{route('contact-info.customer')}}">Customer</a></li>
                        <li><a href="{{route('contact-info.supplier')}}">Supplier</a></li>
                        <li><a href="{{route('contact-info.staff')}}">Staff</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Inventory</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        @can('view purchase')
                        <li><a href="{{route('inventory.purchase')}}">Purchase</a></li>
                        @endcan
                        @can('view sales')
                        <li><a href="{{route('inventory.sale')}}">Sale</a></li>
                        @endcan
                        @can('view purchase')
                        <li><a href="{{route('inventory.purchase-list')}}">Purchase List</a></li>
                        @endcan
                        @can('view sales')
                        <li><a href="{{route('inventory.sale-list')}}">Sale List</a></li>
                        @endcan
                        @can('view stockadjustment')
                        <li><a href="{{route('inventory.stock-adjustment')}}">Stock Adjustment</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Transaction</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view customerpayment')
                        <li><a href="{{route('transaction.customer-payment')}}">Customer Payment</a></li>
                        @endcan
                        @can('view supplierpayment')
                        <li><a href="{{route('transaction.supplier-payment')}}">Supplier Payment</a></li>
                        @endcan
                        @can('view customerpayment')
                        <li><a href="{{route('transaction.customer-payment-report')}}">Customer Payment Report</a></li>
                        @endcan
                        @can('view supplierpayment')
                        <li><a href="{{route('transaction.supplier-payment-report')}}">Supplier Payment Report</a></li>
                        @endcan
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view purchasereports')
                        <li><a href="{{route('report.purchase-report-new')}}">Purchase Report New</a></li>
                        @endcan
                        @can('view salesreports')
                        <li><a href="{{route('report.sale-report-new')}}">Sale Report New</a></li>
                        @endcan
                        @can('view purchasereports')
                        <li><a href="{{route('report.purchase-details-report-new')}}">Purchase Details Report New</a>
                        </li>
                        @endcan
                        @can('view salesreports')
                        <li><a href="{{route('report.sale-details-report-new')}}">Sales Detail Report New</a></li>
                        @endcan
                        <li><a href="{{route('report.cash-bank-book-report-new')}}">Cash Bank Book Report New</a>
                        </li>
                        @can('view stockreports')
                        <li><a href="{{route('report.stock-report-new')}}">Stock Report New</a></li>
                        @endcan
                        <li><a href="{{route('report.customer-ledger-report-new')}}">Customer Ledger Report New</a></li>
                        <li><a href="{{route('report.supplier-ledger-report-new')}}">Supplier Ledger Report New</a></li>
                        <li><a href="{{route('report.customer-due-report-new')}}">Customer Due Report New</a></li>
                        <li><a href="{{route('report.supplier-due-report-new')}}">Supplier Due Report New</a></li>
                        <li><a href="{{route('report.profit-loss-report-new')}}">Profit Loss Report New</a></li>
                        <li><a href="{{route('report.receivable-report-new')}}">Receiveable Report New</a></li>
                        <li><a href="{{route('report.payable-report-new')}}">Payable Report New</a></li>
                        <li><a href="{{route('report.coupons-report')}}">Coupons Report</a></li>
                        <li><a href="{{route('report.stock-adjustment-report')}}">Stock Adjustment Report</a></li>
                        <li><a href="{{route('report.purchase-return-report')}}">Purchase Return Report</a></li>
                        <li><a href="{{route('report.sales-return-report')}}">Sales Return Report</a></li>

                        @can('view orderports')
                        <li><a href="{{route('report.order-report')}}">Order Report</a></li>
                        @endcan
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Account Setting</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        @can('view branch')
                        <li><a href="{{route('setting.branch')}}">Branch</a></li>
                        @endcan
                        @can('view vat')
                        <li><a href="{{route('setting.vat')}}">Vat</a></li>
                        @endcan
                        @can('view shipping_charge')
                        <li><a href="{{route('setting.shipping-charge')}}">Shipping Charge</a></li>
                        @endcan
                        @can('view warehouse')
                        <li><a href="{{route('setting.warehouse')}}">Warehouse</a></li>
                        @endcan
                        @can('view delivery_method')
                        <li><a href="{{route('setting.delivery-method')}}">Delivery Method</a></li>
                        @endcan
                        @can('view payment_method')
                        <li><a href="{{route('setting.payment-method')}}">Payment Method</a></li>
                        @endcan
                        @can('view coupon_code')
                        <li><a href="{{route('setting.coupon-code')}}">Coupon code</a></li>
                        @endcan
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
