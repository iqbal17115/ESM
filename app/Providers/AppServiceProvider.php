<?php

namespace App\Providers;

use App\Models\Backend\Inventory\SaleInvoice;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\Setting\BreakingNews;
use App\Models\Backend\Setting\CompanyInfo;
use App\Models\UserProfile\ProfileSetting;
use App\Models\Backend\Setting\InvoiceSetting;
use App\Models\Backend\Setting\Language;
use App\Models\District;
use App\Models\User;
use App\Models\FrontEnd\Order;
use App\Models\Inventory\Currency;
use App\Models\Notification;
use App\Models\Backend\Offer\Offer;
use App\Services\AddToCardService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Categories
        View::composer('*', function ($view) {

            $view->with('language', Language::whereIsDefault(1)->first());
            $view->with('Districts', District::orderBy('name', 'asc')->get());
            $view->with('categories', Category::orderBy('id', 'desc')->get());
            // $view->with('categoryImageLast', Category::whereTopShow(1)->orderBy('id', 'desc')->first());
            // $view->with('subCategories', SubCategory::orderBy('id', 'desc')->get());
            // $view->with('subSubCategories', SubSubCategory::orderBy('id', 'desc')->get());
            $view->with('companyInfo', CompanyInfo::first());
            $view->with('InvoiceSetting', InvoiceSetting::first());
            $view->with('currencySymbol', Currency::whereIsActive(1)->first());
            $view->with('cardBadge', AddToCardService::cardTotalProductAndAmount());
            $view->with('BreakingNews', BreakingNews::whereIsActive(1)->get());
            $view->with('orders_count', Order::whereStatus('processing')->count());
            $view->with('offers', Offer::whereIsActive(1)->get());
            $view->with('ProfileSettings', ProfileSetting::first());

            // Start Order Notification
            $view->with('notifications', Notification::where('status', null)->get());
            // End Order Notification
        });

        View::composer('livewire.dashboard', function ($view) {
            // Start Month Wise Sell
            $i = 12;
            while ($i > 0) {
                $i--;
                $month[$i] = date('Y-m', strtotime("-$i month"));
            }

            $totalSale = SaleInvoice::whereBetween('sale_date', [$month[11] . '-01', $month[0] . '-31'])->sum('payable_amount');
            $one = SaleInvoice::whereBetween('sale_date', [$month[11] . '-01', $month[11] . '-31'])->sum('payable_amount');
            $two = SaleInvoice::whereBetween('sale_date', [$month[10] . '-01', $month[10] . '-29'])->sum('payable_amount');
            $three = SaleInvoice::whereBetween('sale_date', [$month[9] . '-01', $month[9] . '-31'])->sum('payable_amount');
            $four = SaleInvoice::whereBetween('sale_date', [$month[8] . '-01', $month[8] . '-30'])->sum('payable_amount');
            $five = SaleInvoice::whereBetween('sale_date', [$month[7] . '-01', $month[7] . '-31'])->sum('payable_amount');
            $six = SaleInvoice::whereBetween('sale_date', [$month[6] . '-01', $month[6] . '-30'])->sum('payable_amount');
            $seven = SaleInvoice::whereBetween('sale_date', [$month[5] . '-01', $month[5] . '-31'])->sum('payable_amount');
            $eight = SaleInvoice::whereBetween('sale_date', [$month[4] . '-01', $month[4] . '-31'])->sum('payable_amount');
            $nine = SaleInvoice::whereBetween('sale_date', [$month[3] . '-01', $month[3] . '-30'])->sum('payable_amount');
            $ten = SaleInvoice::whereBetween('sale_date', [$month[2] . '-01', $month[2] . '-31'])->sum('payable_amount');
            $eleven = SaleInvoice::whereBetween('sale_date', [$month[1] . '-01', $month[1] . '-30'])->sum('payable_amount');
            $twelve = SaleInvoice::whereBetween('sale_date', [$month[0] . '-01', $month[0] . '-31'])->sum('payable_amount');


            if ($totalSale == 0) {
                $totalSale = 1;
            }

            $view->with('totalSale', $totalSale);
            $view->with('one', $one);
            $view->with('two', $two);
            $view->with('three', $three);
            $view->with('four', $four);
            $view->with('five', $five);
            $view->with('six', $six);
            $view->with('seven', $seven);
            $view->with('eight', $eight);
            $view->with('nine', $nine);
            $view->with('ten', $ten);
            $view->with('eleven', $eleven);
            $view->with('twelve', $twelve);


            // End Month Wise Sell

            // Start Month Wise User Rate
            $allUser = User::count();
            // dd($year);
            $totalUser = User::whereBetween('created_at', [$month[11] . '-01', $month[0] . '-31'])->count();
            $month_1 = User::whereBetween('created_at', [$month[11] . '-01', $month[11] . '-31'])->count();
            $month_2 = User::whereBetween('created_at', [$month[10] . '-01', $month[10] . '-29'])->count();
            $month_3 = User::whereBetween('created_at', [$month[9] . '-01', $month[9] . '-31'])->count();
            $month_4 = User::whereBetween('created_at', [$month[8] . '-01', $month[8] . '-30'])->count();
            $month_5 = User::whereBetween('created_at', [$month[7] . '-01', $month[7] . '-31'])->count();
            $month_6 = User::whereBetween('created_at', [$month[6] . '-01', $month[6] . '-30'])->count();
            $month_7 = User::whereBetween('created_at', [$month[5] . '-01', $month[5] . '-31'])->count();
            $month_8 = User::whereBetween('created_at', [$month[4] . '-01', $month[4] . '-31'])->count();
            $month_9 = User::whereBetween('created_at', [$month[3] . '-01', $month[3] . '-30'])->count();
            $month_10 = User::whereBetween('created_at', [$month[2] . '-01', $month[2] . '-31'])->count();
            $month_11 = User::whereBetween('created_at', [$month[1] . '-01', $month[1] . '-30'])->count();
            $month_12 = User::whereBetween('created_at', [$month[0] . '-01', $month[0] . '-31'])->count();

            if ($totalUser == 0) {
                $totalUser = 1;
            }
            $view->with('totalUser', $totalUser);
            $view->with('month_1', $month_1);
            $view->with('month_2', $month_2);
            $view->with('month_3', $month_3);
            $view->with('month_4', $month_4);
            $view->with('month_5', $month_5);
            $view->with('month_6', $month_6);
            $view->with('month_7', $month_7);
            $view->with('month_8', $month_8);
            $view->with('month_9', $month_9);
            $view->with('month_10', $month_10);
            $view->with('month_11', $month_11);
            $view->with('month_12', $month_12);
            // End Month Wise User Rate

            // Start Top Selling Product
            if ($allUser == 0) {
                $allUser = 1;
            }
            $view->with('allUser', $allUser);
            $view->with('total_quantity', SaleInvoiceDetail::sum('quantity'));
            $view->with('best_Selling_products', SaleInvoiceDetail::groupBy('product_id')
                ->selectRaw('product_id, sum(quantity) as quantity')
                ->orderBy('quantity', 'desc')
                ->take(10)
                ->get());
            // End Top Selling Product

            // Start Top Selling Product
            $view->with('top_five_customers', SaleInvoice::groupBy('contact_id')
            ->selectRaw('contact_id, sum(payable_amount) as payable_amount')
            ->orderBy('payable_amount', 'desc')
            ->take(10)
            ->get());
            // End Top Selling Product

            // Start Order

            $totalOrder = Order::whereBetween('order_date', [$month[11] . '-01', $month[0] . '-31'])->sum('payable_amount');
            if ($totalOrder == 0) {
                $totalOrder = 1;
            }
            $month_1_1 = Order::whereBetween('order_date', [$month[11] . '-01', $month[11] . '-31'])->sum('payable_amount');
            $month_2_2 = Order::whereBetween('order_date', [$month[10] . '-01', $month[10] . '-29'])->sum('payable_amount');
            $month_3_3 = Order::whereBetween('order_date', [$month[9] . '-01', $month[9] . '-31'])->sum('payable_amount');
            $month_4_4 = Order::whereBetween('order_date', [$month[8] . '-01', $month[8] . '-30'])->sum('payable_amount');
            $month_5_5 = Order::whereBetween('order_date', [$month[7] . '-01', $month[7] . '-31'])->sum('payable_amount');
            $month_6_6 = Order::whereBetween('order_date', [$month[6] . '-01', $month[6] . '-30'])->sum('payable_amount');
            $month_7_7 = Order::whereBetween('order_date', [$month[5] . '-01', $month[5] . '-31'])->sum('payable_amount');
            $month_8_8 = Order::whereBetween('order_date', [$month[4] . '-01', $month[4] . '-31'])->sum('payable_amount');
            $month_9_9 = Order::whereBetween('order_date', [$month[3] . '-01', $month[3] . '-30'])->sum('payable_amount');
            $month_10_10 = Order::whereBetween('order_date', [$month[2] . '-01', $month[2] . '-31'])->sum('payable_amount');
            $month_11_11 = Order::whereBetween('order_date', [$month[1] . '-01', $month[1] . '-30'])->sum('payable_amount');
            $month_12_12 = Order::whereBetween('order_date', [$month[0] . '-01', $month[0] . '-31'])->sum('payable_amount');

            $view->with('totalOrder', $totalOrder);
            if ($totalOrder == 0) {
                $totalOrder = 1;
            }
            $view->with('month_1_1', $month_1_1);
            $view->with('month_2_2', $month_2_2);
            $view->with('month_3_3', $month_3_3);
            $view->with('month_4_4', $month_4_4);
            $view->with('month_5_5', $month_5_5);
            $view->with('month_6_6', $month_6_6);
            $view->with('month_7_7', $month_7_7);
            $view->with('month_8_8', $month_8_8);
            $view->with('month_9_9', $month_9_9);
            $view->with('month_10_10', $month_10_10);
            $view->with('month_11_11', $month_11_11);
            $view->with('month_12_12', $month_12_12);
            // End Order

        });
    }
}
