<?php
use App\Http\Controllers\Backend\DatatableController;

use App\Http\Livewire\Backend\Setting\CompanyInfo;
use App\Http\Livewire\Backend\Setting\Currency;
use App\Http\Livewire\Backend\Setting\Vat;
use App\Http\Livewire\Backend\Setting\Warehouse;
use App\Http\Livewire\Backend\Setting\PaymentMethod;
use App\Http\Livewire\Backend\Product\Unit;
use App\Http\Livewire\Backend\Product\Brand;
use App\Http\Livewire\Backend\Product\Category;
use App\Http\Livewire\Backend\Product\SubCategory;
use App\Http\Livewire\Backend\Product\SubSubCategory;
use App\Http\Livewire\Backend\Product\Product;
use App\Http\Livewire\Backend\Product\ProductList;
use App\Http\Livewire\Backend\Contact\ContactCategory;
use App\Http\Livewire\Backend\Contact\Customer;
use App\Http\Livewire\Backend\Contact\Supplier;
use App\Http\Livewire\Backend\Contact\Staff;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {

    // Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'contact-info', 'as' => 'contact-info.'], function () {
        Route::get('contact-category', ContactCategory::class)->name('contact-category');
        Route::get('customer', Customer::class)->name('customer');
        Route::get('supplier', Supplier::class)->name('supplier');
        Route::get('staff', Staff::class)->name('staff');
    });

    Route::group(['prefix' => 'member', 'middleware' => ['auth']], function () {
        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('unit', Unit::class)->name('unit');
            Route::get('brand', Brand::class)->name('brand');
            Route::get('category', Category::class)->name('category');
            Route::get('sub-category', SubCategory::class)->name('sub-category');
            Route::get('sub-sub-category', SubSubCategory::class)->name('sub-sub-category');
            Route::get('product/{id?}', Product::class)->name('product');
            Route::get('product-list', ProductList::class)->name('product-list');
        });

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::get('companyinfo', CompanyInfo::class)->name('companyinfo');
            Route::get('currency', Currency::class)->name('currency');
            Route::get('vat', Vat::class)->name('vat');
            Route::get('warehouse', Warehouse::class)->name('warehouse');
            Route::get('payment-method', PaymentMethod::class)->name('payment-method');
            // Route::get('branch', Branch::class)->name('branch');
            // Route::get('delivery-method', DeliveryMethod::class)->name('delivery-method');
            // Route::get('invoice-setting', InvoiceSetting::class)->name('invoice-setting');
            // Route::get('coupon-code', CouponCode::class)->name('coupon-code');
            // Route::get('shipping-charge', ShippingCharge::class)->name('shipping-charge');
            // Route::get('warehouse', Warehouse::class)->name('warehouse');
            // Route::get('slider', Slider::class)->name('slider');
            // Route::get('point-policy', PointPolicy::class)->name('point-policy');
            // Route::get('breaking-news', BreakingNews::class)->name('breaking-news');
            // Route::get('language', Language::class)->name('language');
            // Route::get('manage-language/{id?}', ManageLanguage::class)->name('manage-language');
        });

    });

    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        // Route::get('branch_table', [DatatableController::class, 'BranchTable'])->name('branch_table');
        Route::get('currency_table', [DatatableController::class, 'CurrencyTable'])->name('currency_table');
        Route::get('vat_table', [DatatableController::class, 'VatTable'])->name('vat_table');
        Route::get('warehouse_table', [DatatableController::class, 'WarehouseTable'])->name('warehouse_table');
        Route::get('unit_table', [DatatableController::class, 'UnitTable'])->name('unit_table');
        Route::get('brand_table', [DatatableController::class, 'BrandTable'])->name('brand_table');
        Route::get('category_table', [DatatableController::class, 'CategoryTable'])->name('category_table');
        Route::get('sub_category_table', [DatatableController::class, 'SubCategoryTable'])->name('sub_category_table');
        Route::get('sub_sub_category_table', [DatatableController::class, 'SubSubCategoryTable'])->name('sub_sub_category_table');
        Route::get('product_table', [DatatableController::class, 'ProductTable'])->name('product_table');
        Route::get('paymentMethod_table', [DatatableController::class, 'paymentMethodTable'])->name('paymentMethod_table');
        Route::get('contact_category_table', [DatatableController::class, 'ContactCategoryTable'])->name('contact_category_table');
        Route::get('customer_table', [DatatableController::class, 'CustomerTable'])->name('customer_table');
        Route::get('supplier_table', [DatatableController::class, 'SupplierTable'])->name('supplier_table');
        Route::get('staff_table', [DatatableController::class, 'StaffTable'])->name('staff_table');
        // Route::get('delivery_method_table', [DatatableController::class, 'DeliveryMethodTable'])->name('delivery_method_table');
        // Route::get('warehouse_table', [DatatableController::class, 'WarehouseTable'])->name('warehouse_table');
        // Route::get('unit_table', [DatatableController::class, 'UnitTable'])->name('unit_table');
        // Route::get('slider_table', [DatatableController::class, 'SliderTable'])->name('slider_table');
        // Route::get('invoiceSetting_table', [DatatableController::class, 'InvoiceSettingTable'])->name('invoiceSetting_table');
        // Route::get('shipping_charge', [DatatableController::class, 'ShippingChargeTable'])->name('shipping_charge');
        // Route::get('coupon_table', [DatatableController::class, 'CouponTable'])->name('coupon_table');
        // Route::get('invoiceSave', [DatatableController::class, 'InvoiceTable'])->name('invoiceSave');
        // Route::get('purchase_list', [DatatableController::class, 'PurchaseListTable'])->name('purchase_list');
        // Route::get('sale_list', [DatatableController::class, 'SaleListTable'])->name('sale_list');
        // Route::get('news_list', [DatatableController::class, 'NewsListTable'])->name('news_list');
        // Route::get('language_list', [DatatableController::class, 'LanguageListTable'])->name('language_list');
        // Route::get('manage_language_list', [DatatableController::class, 'LanguageListTable'])->name('manage_language_list');
        // Route::get('vendor_table', [DatatableController::class, 'VendorListTable'])->name('vendor_table');
        // Route::get('vendor_approved_table', [DatatableController::class, 'VendorApprovedListTable'])->name('vendor_approved_table');
        // Route::get('vendor_cancel_table', [DatatableController::class, 'VendorCancelListTable'])->name('vendor_cancel_table');
        // Route::get('all_user_table', [DatatableController::class, 'AllUserList'])->name('all_user_table');
        // Route::get('offer_table', [DatatableController::class, 'OfferList'])->name('offer_table');
    });

});
