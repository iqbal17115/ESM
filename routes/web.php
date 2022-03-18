<?php
use App\Http\Controllers\Backend\DatatableController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Livewire\Backend\Setting\CompanyInfo;
use App\Http\Livewire\Backend\Setting\Currency;
use App\Http\Livewire\Backend\Setting\Vat;
use App\Http\Livewire\Backend\Setting\Warehouse;
use App\Http\Livewire\Backend\Setting\PaymentMethod;
use App\Http\Livewire\Backend\Setting\Slider;
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
use App\Http\Livewire\Backend\Inventory\Purchase;
use App\Http\Livewire\Backend\Inventory\PurchaseInvoice;
use App\Http\Livewire\Backend\Inventory\PurchaseList;
use App\Http\Livewire\Backend\Inventory\Sale;
use App\Http\Livewire\Backend\Inventory\SaleInvoice;
use App\Http\Livewire\Backend\Inventory\SaleList;
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
// Start Frontend Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('category', [HomeController::class, 'AllCategory'])->name('category');
Route::get('sub-category/{id}', [HomeController::class, 'AllSubCategory'])->name('sub-category');
Route::get('shop/{id?}', [HomeController::class, 'Shop'])->name('shop');
Route::get('product-details/{id?}', [HomeController::class, 'productDetails'])->name('product-details');
Route::get('cart', [HomeController::class, 'CartPage'])->name('cart');
Route::get('checkout', [HomeController::class, 'Checkout'])->name('checkout');
Route::get('/product-search/', [HomeController::class, 'productSearch'])->name('product-search');
Route::get('/feature-wise/{feature}', [HomeController::class, 'FeatureWise'])->name('feature-wise');
Route::get('/all-category-wise/{id?}', [HomeController::class, 'allCategoryWise'])->name('all-category-wise');
Route::get('/search-category-wise/{id?}', [HomeController::class, 'searchByCategory'])->name('search-category-wise');
Route::get('/search-subCategory-wise/{id?}', [HomeController::class, 'searchBySubCategory'])->name('search-subCategory-wise');
Route::get('/search-subSubCategory-wise/{id?}', [HomeController::class, 'searchBySubSubCategory'])->name('search-subSubCategory-wise');
Route::get('/search-brand-wise/{id?}', [HomeController::class, 'searchByBrand'])->name('search-brand-wise');
Route::post('/ajax/add-to-card-store', [HomeController::class, 'addToCardStore'])->name('ajax-add-to-card-store');
Route::post('/ajax/add-to-card-quantity-update', [HomeController::class, 'cartProductQuantityUpdate'])->name('ajax-add-to-card-quantity-update');
Route::post('/ajax/add-to-card-product-delete', [HomeController::class, 'cartProductDelete'])->name('ajax-add-to-card-product-delete');
Route::get('/confirm-order', [HomeController::class, 'HomePage'])->name('confirm-order');
Route::post('/confirm-order', [HomeController::class, 'confirmOrder'])->name('confirm-order');
// End Frontend Route

Route::Post('customer_sign_in', [LoginController::class, 'authenticate'])->name('customer_sign_in');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {

    // Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('purchase/{id?}', Purchase::class)->name('purchase');
        Route::get('purchase-invoice/{id}', PurchaseInvoice::class)->name('purchase-invoice');
        Route::get('purchase-list', PurchaseList::class)->name('purchase-list');
        Route::get('sale/{id?}', Sale::class)->name('sale');
        Route::get('sale-invoice/{id}', SaleInvoice::class)->name('sale-invoice');
        Route::get('sale-list', SaleList::class)->name('sale-list');
    });

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
            Route::get('slider', Slider::class)->name('slider');
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

        Route::get('slider_table', [DatatableController::class, 'SliderTable'])->name('slider_table');
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
        Route::get('purchase_list', [DatatableController::class, 'PurchaseListTable'])->name('purchase_list');
        Route::get('sale_list', [DatatableController::class, 'SaleListTable'])->name('sale_list');

        // Route::get('delivery_method_table', [DatatableController::class, 'DeliveryMethodTable'])->name('delivery_method_table');
        // Route::get('warehouse_table', [DatatableController::class, 'WarehouseTable'])->name('warehouse_table');
        // Route::get('unit_table', [DatatableController::class, 'UnitTable'])->name('unit_table');
        // Route::get('invoiceSetting_table', [DatatableController::class, 'InvoiceSettingTable'])->name('invoiceSetting_table');
        // Route::get('shipping_charge', [DatatableController::class, 'ShippingChargeTable'])->name('shipping_charge');
        // Route::get('coupon_table', [DatatableController::class, 'CouponTable'])->name('coupon_table');
        // Route::get('invoiceSave', [DatatableController::class, 'InvoiceTable'])->name('invoiceSave');
        // Route::get('purchase_list', [DatatableController::class, 'PurchaseListTable'])->name('purchase_list');
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
