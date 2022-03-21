<?php

namespace App\Http\Controllers;

use App\Models\Backend\Inventory\PurchaseInvoice;
use Carbon\Carbon;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Inventory\SaleInvoice;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\Setting\PaymentMethod;
use App\Models\FrontEnd\Order;
use App\Traits\GetBalance;
use App\Models\Inventory\Category;
use Illuminate\Support\Facades\DB;
use App\Traits\Receivable;
use App\Traits\Payable;
use App\Traits\ProfitLoss;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use GetBalance;
    use Receivable;
    use Payable;
    use ProfitLoss;
    public function PayableReportData(Request $request)
    {
        $Contact = Contact::whereType('Customer');
        // dd($Contact);
        if ($request->contact_id) {
            $Contact->where('id', $request->contact_id);
        }
        $Contact->get();
        $this->i = 1;

        return DataTables::of($Contact)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('opening_balance', function ($data) {
                return $this->getPurchaseBill(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->opening_bill - $this->getPurchasePaid(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->opening_paid;
                // return 1;
            })
            ->addColumn('credit', function ($data) {
                return $this->getPurchaseBill(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_bill;
            })
            ->addColumn('debit', function ($data) {
                return $this->getPurchasePaid(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_paid;
                // return 1;
            })
            ->addColumn('closing_balance', function ($data) {
                return $this->getPurchaseBill(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_bill - $this->getPurchasePaid(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_paid;
            })
            ->toJson();
    }

    public function PayableReport()
    {
        $ContactLists = Contact::whereType('Supplier')->get();
        return view('Reports.payable_report', compact('ContactLists'));
    }
    public function ReceivableReportData(Request $request)
    {
        $Contact = Contact::whereType('Customer');
        // dd($Contact);
        if ($request->contact_id) {
            $Contact->where('id', $request->contact_id);
        }
        $Contact->get();
        $this->i = 1;

        return DataTables::of($Contact)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('opening_balance', function ($data) {
                return $this->getSaleBill(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->opening_bill - $this->getSalePaid(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->opening_paid;
                // return 1;
            })
            ->addColumn('credit', function ($data) {
                return $this->getSaleBill(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_bill;
            })
            ->addColumn('debit', function ($data) {
                return $this->getSalePaid(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_paid;
                // return 1;
            })
            ->addColumn('closing_balance', function ($data) {
                return $this->getSaleBill(['contact_id' => $data->id])->current_bill - $this->getSalePaid(['contact_id' => $data->id, 'from_date' => Carbon::parse(request()->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse(request()->to_date)->format('Y-m-d')])->current_paid;
            })
            ->toJson();
    }

    public function ReceivableReport()
    {
        $ContactLists = Contact::whereType('Customer')->get();
        return view('Reports.receivable_report', compact('ContactLists'));
    }
    public function ProfitLossReportData(Request $request)
    {
        $orders = Order::whereStatus('delivered')->orderBy('id', 'desc');
        if ($request->contact_id) {
            $orders->where('contact_id', $request->contact_id);
        }
        if ($request->from_date && $request->to_date) {
            $orders->whereDate('order_date', '>=', Carbon::parse($request->from_date)->format('Y-m-d'))->whereDate('order_date', '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        }
        $orders->get();
        $this->i = 1;

        return DataTables::of($orders)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('business_name', function ($data) {
                return $data->Contact->business_name;
            })
            ->addColumn('sale_code', function ($data) {
                return $data->SaleInvoice ? $data->SaleInvoice->code : '';
            })
            ->addColumn('profit_loss', function ($data) {
                $profit_loss = 0;
                $purchase_price = 0;
                $sale_price = 0;

                foreach($data->OrderDetail as $detail){
                  $purchase_price += ($detail->Product->purchase_price * $detail->quantity);
                  $sale_price += ($detail->unit_price * $detail->quantity);
                }
                return $sale_price-$purchase_price;
            })
            ->toJson();
    }
    public function ProfitLossReport()
    {
        $ContactLists = Contact::whereType('Customer')->get();
        return view('Reports.profit_loss_report', compact('ContactLists'));
    }
    public function SupplierDueReportData(Request $request)
    {
        $Contact = Contact::whereType('Supplier');
        if ($request->contact_id) {
            $Contact->where('id', $request->contact_id);
        }
        $Contact->get();
        $this->i = 1;

        return DataTables::of($Contact)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('grand_total', function ($data) {
                return $data->PurchaseInvoice->sum('payable_amount');
            })
            ->addColumn('amount', function ($data) {
                return $data->PurchasePayment->sum('total_amount');
            })
            ->addColumn('due_amount', function ($data) {
                return $data->PurchaseInvoice->sum('payable_amount') - $data->PurchasePayment->sum('total_amount');
            })
            ->toJson();
    }
    public function SupplierDueReport()
    {
        $ContactLists = Contact::where('type', 'Supplier')->get();
        return view('Reports.supplier_due_report',[
            'ContactLists'=>$ContactLists
        ]);
    }
    public function CustomerDueReportData(Request $request)
    {
        $Contact = Contact::whereType('Customer');
        if ($request->contact_id) {
            $Contact->where('id', $request->contact_id);
        }
        $Contact->get();
        $this->i = 1;

        return DataTables::of($Contact)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('grand_total', function ($data) {
                return $data->SaleInvoice->sum('payable_amount');
            })
            ->addColumn('amount', function ($data) {
                return $data->SalePayment->sum('total_amount');
            })
            ->addColumn('due_amount', function ($data) {
                return $data->SaleInvoice->sum('payable_amount') - $data->SalePayment->sum('total_amount');
            })
            ->toJson();
    }
    public function CustomerDueReport()
    {
        $ContactLists = Contact::where('type', 'Customer')->get();
        return view('Reports.customer_due_report',[
            'ContactLists'=>$ContactLists
        ]);
    }
    public function SupplierLedgerReportData(Request $request)
    {
     $GetFilterData = [];
        if ($request->contact_id) {
            $openingClosingBill = $this->getPurchaseBill(['contact_id' => $request->contact_id, 'from_date' => Carbon::parse($request->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse($request->to_date)->format('Y-m-d')]);
            $openingClosingPaid = $this->getPurchasePaid(['contact_id' => $request->contact_id, 'from_date' => Carbon::parse($request->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse($request->to_date)->format('Y-m-d')]);
            $payments = DB::table("purchase_payments")
            ->whereNull('deleted_at')
            ->whereDate('date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('contact_id', $request->contact_id)
            ->select(DB::raw("'SupplierPayment' as type"),"purchase_payments.purchase_invoice_id as purchase_invoice_id" ,"purchase_payments.contact_id as contact_id","purchase_payments.date as txn_date","purchase_payments.code as code","purchase_payments.total_amount as amount");

            $Transaction = DB::table("purchase_invoices")
            ->whereNull('deleted_at')
            ->whereDate('purchase_date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('purchase_date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('contact_id', $request->contact_id)

            ->select(DB::raw("'Purchase' as type"),"purchase_invoices.id as purchase_invoice_id",  "purchase_invoices.contact_id as contact_id","purchase_invoices.purchase_date as txn_date","purchase_invoices.code as code","purchase_invoices.payable_amount as amount")
            ->unionall($payments)
            ->orderBy('purchase_invoice_id','asc')
             ->get();
            $openingBalance =$openingClosingBill->opening_bill- $openingClosingPaid->opening_paid;
            $GetFilterData[1]['id'] = 1;
            $GetFilterData[1]['code'] = '';
            $GetFilterData[1]['txn_date'] = '';
            $GetFilterData[1]['particulars'] = 'Previous Opening Balance';
            $GetFilterData[1]['debit'] = '';
            $GetFilterData[1]['credit'] = '';
            $GetFilterData[1]['balance'] = $openingBalance;
            $x = 2;
            $CreditBalance = $openingBalance+ $openingClosingBill->current_bill-$openingClosingPaid->current_paid;
        } else {
            $Transaction = [];
            $CreditBalance = false;
        }

        foreach ($Transaction as $getTransaction) {

            $GetFilterData[$x]['id'] = $x;
            $GetFilterData[$x]['txn_date'] = Carbon::parse($getTransaction->txn_date)->format('d-M-Y');
            $GetFilterData[$x]['code'] = $getTransaction->code;
            $ParticularDetails = $getTransaction->type;
            $GetFilterData[$x]['particulars'] = $ParticularDetails;
            if ($getTransaction->type=="Purchase") {
                $GetFilterData[$x]['debit'] = $getTransaction->amount;
                $openingBalance = $openingBalance + $getTransaction->amount;
            } else {
                $GetFilterData[$x]['debit'] = '';
            }

            if ($getTransaction->type=="SupplierPayment") {
                $GetFilterData[$x]['credit'] = $getTransaction->amount;
                $openingBalance = $openingBalance - $getTransaction->amount;
            } else {
                $GetFilterData[$x]['credit'] = '';
            }

            $GetFilterData[$x]['balance'] = $openingBalance;
            ++$x;
        }
        if ($CreditBalance) {
            $GetFilterData[$x]['id'] = $x;
            $GetFilterData[$x]['code'] = '';
            $GetFilterData[$x]['txn_date'] = '';
            $GetFilterData[$x]['particulars'] = 'Closing Balance';
            $GetFilterData[$x]['debit'] = '';
            $GetFilterData[$x]['credit'] = '';
            $GetFilterData[$x]['balance'] = $CreditBalance;
        }

        return DataTables::of($GetFilterData)->toJson();
    }
    public function SupplierLedgerReport()
    {
        $ContactLists = Contact::where('type', 'Supplier')->get();
        return view('Reports.supplier_ledger_report', [
            'ContactLists' => $ContactLists,
        ]);
    }

    public function CustomerLedgerReportData(Request $request)
    {
     $GetFilterData = [];
        if ($request->contact_id) {
            $openingClosingBill = $this->getSaleBill(['contact_id' => $request->contact_id, 'from_date' => Carbon::parse($request->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse($request->to_date)->format('Y-m-d')]);
            $openingClosingPaid = $this->getSalePaid(['contact_id' => $request->contact_id, 'from_date' => Carbon::parse($request->from_date)->format('Y-m-d'), 'to_date' => Carbon::parse($request->to_date)->format('Y-m-d')]);
            $payments = DB::table("sale_payments")
            ->whereNull('deleted_at')
            ->whereDate('date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('contact_id', $request->contact_id)
            ->select(DB::raw("'CustomerPayment' as type"),"sale_payments.sale_invoice_id as sale_invoice_id" ,"sale_payments.contact_id as contact_id","sale_payments.date as txn_date","sale_payments.code as code","sale_payments.total_amount as amount");

            $Transaction = DB::table("sale_invoices")
            ->whereNull('deleted_at')
            ->whereDate('sale_date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('sale_date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('contact_id', $request->contact_id)

            ->select(DB::raw("'Sale' as type"),"sale_invoices.id as sale_invoice_id",  "sale_invoices.contact_id as contact_id","sale_invoices.sale_date as txn_date","sale_invoices.code as code","sale_invoices.payable_amount as amount")
            ->unionall($payments)
            ->orderBy('sale_invoice_id','asc')
             ->get();

            $openingBalance =$openingClosingBill->opening_bill- $openingClosingPaid->opening_paid;
            $GetFilterData[1]['id'] = 1;
            $GetFilterData[1]['code'] = '';
            $GetFilterData[1]['txn_date'] = '';
            $GetFilterData[1]['particulars'] = 'Previous Opening Balance';
            $GetFilterData[1]['debit'] = '';
            $GetFilterData[1]['credit'] = '';
            $GetFilterData[1]['balance'] = $openingBalance;
            $x = 2;
            $CreditBalance = $openingBalance+ $openingClosingBill->current_bill-$openingClosingPaid->current_paid;
        } else {
            $Transaction = [];
            $CreditBalance = false;
        }

        foreach ($Transaction as $getTransaction) {

            $GetFilterData[$x]['id'] = $x;
            $GetFilterData[$x]['txn_date'] = Carbon::parse($getTransaction->txn_date)->format('d-M-Y');
            $GetFilterData[$x]['code'] = $getTransaction->code;
            $ParticularDetails = $getTransaction->type;
            $GetFilterData[$x]['particulars'] = $ParticularDetails;
            if ($getTransaction->type=="Sale") {
                $GetFilterData[$x]['credit'] = $getTransaction->amount;
                $openingBalance = $openingBalance + $getTransaction->amount;
            } else {
                $GetFilterData[$x]['credit'] = '';
            }

            if ($getTransaction->type=="CustomerPayment") {
                $GetFilterData[$x]['debit'] = $getTransaction->amount;
                $openingBalance = $openingBalance - $getTransaction->amount;
            } else {
                $GetFilterData[$x]['debit'] = '';
            }

            $GetFilterData[$x]['balance'] = $openingBalance;
            ++$x;
        }
        if ($CreditBalance) {
            $GetFilterData[$x]['id'] = $x;
            $GetFilterData[$x]['code'] = '';
            $GetFilterData[$x]['txn_date'] = '';
            $GetFilterData[$x]['particulars'] = 'Closing Balance';
            $GetFilterData[$x]['debit'] = '';
            $GetFilterData[$x]['credit'] = '';
            $GetFilterData[$x]['balance'] = $CreditBalance;
        }

        return DataTables::of($GetFilterData)->toJson();
    }
    public function CustomerLedgerReport()
    {
        $ContactLists = Contact::where('type', 'Customer')->get();
        return view('Reports.customer_ledger_report', [
            'ContactLists' => $ContactLists,
        ]);
    }
    public function CashBankBookReportData(Request $request)
    {
        $GetFilterData = [];
        if ($request->payment_method_id) {
            $openingClosingPayment = $this->getPaymentBalance(['payment_method_id' => $request->payment_method_id, 'start_date' => Carbon::parse($request->from_date)->format('Y-m-d'), 'end_date' => Carbon::parse($request->to_date)->format('Y-m-d')]);
            $openingClosingTransaction = $this->getTransactionBalance(['payment_method_id' => $request->payment_method_id, 'start_date' => Carbon::parse($request->from_date)->format('Y-m-d'), 'end_date' => Carbon::parse($request->to_date)->format('Y-m-d')]);
            $sale_payments = DB::table("sale_payments")
            ->whereNull('deleted_at')
            ->whereDate('date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('payment_method_id', $request->payment_method_id)
            ->select("payments.contact_id as contact_id","sale_payments.date as txn_date","sale_payments.code as code","sale_payments.total_amount");

            $purchase_payments = DB::table("purchase_payments")
            ->whereNull('deleted_at')
            ->whereDate('date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('payment_method_id', $request->payment_method_id)
            ->select("payments.contact_id as contact_id","purchase_payments.date as txn_date","purchase_payments.code as code","purchase_payments.total_amount");

            $Transaction = DB::table("payments")
            ->whereNull('deleted_at')
            ->whereDate('date', '>=', Carbon::parse($request->from_date)->format('y-m-d'))
            ->whereDate('date', '<=', Carbon::parse($request->to_date)->format('y-m-d'))
            ->where('payment_method_id', $request->payment_method_id)
            ->select("make_transactions.type as type","make_transactions.contact_id as contact_id","make_transactions.date as txn_date","make_transactions.code as code","make_transactions.amount")
            ->unionall($sale_payments)
            ->unionall($purchase_payments)
            ->orderBy('txn_date','asc')
             ->get();
            //  dd($Transaction);
            $openingBalance =$openingClosingPayment->opening_balance + $openingClosingTransaction->opening_balance;
            $GetFilterData[1]['id'] = 1;
            $GetFilterData[1]['code'] = '';
            $GetFilterData[1]['txn_date'] = '';
            $GetFilterData[1]['particulars'] = 'Previous Opening Balance';
            $GetFilterData[1]['debit'] = '';
            $GetFilterData[1]['credit'] = '';
            $GetFilterData[1]['balance'] = $openingBalance;
            $x = 2;
            $CreditBalance = $openingBalance + $openingClosingPayment->current_balance+ $openingClosingTransaction->current_balance;
        } else {
            $Transaction = [];
            $CreditBalance = false;
        }
        foreach ($Transaction as $getTransaction) {

            $GetFilterData[$x]['id'] = $x;
            $GetFilterData[$x]['txn_date'] = Carbon::parse($getTransaction->txn_date)->format('d-M-Y');
            $GetFilterData[$x]['code'] = $getTransaction->code;
            // $ParticularDetails = $getTransaction->type;

            if ($getTransaction->type == 'SupplierPayment') {
                $GetFilterData[$x]['particulars'] = 'Expense';
                $GetFilterData[$x]['credit'] = $getTransaction->amount;
                $openingBalance = $openingBalance - $getTransaction->amount;
                $GetFilterData[$x]['debit'] = '';
            }
            else if ($getTransaction->type == 'CustomerPayment') {
                $GetFilterData[$x]['particulars'] = 'Income';
                $GetFilterData[$x]['debit'] = $getTransaction->amount;
                $openingBalance = $openingBalance + $getTransaction->amount;
                $GetFilterData[$x]['credit'] = '';
            }
           else if ($getTransaction->type == 'SupplierPayment') {
                 $GetFilterData[$x]['particulars'] = 'Supplier Payment';
                $GetFilterData[$x]['credit'] = $getTransaction->amount;
                $openingBalance = $openingBalance - $getTransaction->amount;

                $GetFilterData[$x]['debit'] = '';
            }
           else if ($getTransaction->type == 'CustomerPayment') {
                $GetFilterData[$x]['particulars'] = 'Customer Payment';
                $GetFilterData[$x]['debit'] = $getTransaction->amount;
                $openingBalance = $openingBalance + $getTransaction->amount;
                $GetFilterData[$x]['credit'] = '';
            }


            $GetFilterData[$x]['balance'] = $openingBalance;
            ++$x;
        }
        if ($CreditBalance) {
            $GetFilterData[$x]['id'] = $x;
            $GetFilterData[$x]['code'] = '';
            $GetFilterData[$x]['txn_date'] = '';
            $GetFilterData[$x]['particulars'] = 'Closing Balance';
            $GetFilterData[$x]['debit'] = '';
            $GetFilterData[$x]['credit'] = '';
            $GetFilterData[$x]['balance'] = $CreditBalance;
        }

        return DataTables::of($GetFilterData)->toJson();
    }

    public function CashBankBookReport()
    {

        $paymentMethods = PaymentMethod::get();
        return view('Reports.cash_bank_book_report', compact('paymentMethods'));
    }

    public function StockReportData(Request $request)
    {
        $stock_item = Product::query();

        if ($request->category_id) {
            $stock_item->where('category_id', $request->category_id);
        }
        if ($request->branch_id) {
            $stock_item->where('branch_id', $request->branch_id);
        }
        if ($request->item_id) {
            $stock_item->where('id', $request->item_id);
        }
        $stock_item->get();

        $this->i = 1;

        return DataTables::of($stock_item)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('category_id', function ($data) {
                return $data->Category ? $data->Category->name : '';
            })
            ->addColumn('current_stock', function ($data) {
                if($data->PurchaseInvoiceDetail && $data->SaleInvoiceDetail){
                    return $data->PurchaseInvoiceDetail->sum('quantity')-$data->SaleInvoiceDetail->sum('quantity');
                }elseif($data->PurchaseInvoiceDetail){
                    return $data->PurchaseInvoiceDetail->sum('quantity');
                }elseif($data->SaleInvoiceDetail){
                    return (0-$data->SaleInvoiceDetail->sum('quantity'));
                }
            })
            ->addColumn('total', function ($data) {
                $qty = 0;
                if($data->PurchaseInvoiceDetail && $data->SaleInvoiceDetail){
                    $qty = $data->PurchaseInvoiceDetail->sum('quantity')-$data->SaleInvoiceDetail->sum('quantity');
                }elseif($data->PurchaseInvoiceDetail){
                    $qty = $data->PurchaseInvoiceDetail->sum('quantity');
                }elseif($data->SaleInvoiceDetail){
                    $qty = (0-$data->SaleInvoiceDetail->sum('quantity'));
                }

                return $qty * $data->regular_price;
            })
            ->toJson();
    }
    public function StockReport()
    {
        $branches = Branch::get();
        $categories = Category::get();
        $items = Product::get();
        return view('Reports.stock_report', compact('branches', 'categories', 'items'));
    }
    public function SaleDetailReportData(Request $request)
    {
        $sales = DB::table('sale_invoice_details')
            ->join('sale_invoices', 'sale_invoices.id', '=', 'sale_invoice_details.sale_invoice_id')
            ->join('products', 'products.id', '=', 'sale_invoice_details.product_id')
            ->join('contacts', 'contacts.id', '=', 'sale_invoices.contact_id')
            ->join('branches', 'branches.id', '=', 'sale_invoice_details.branch_id')
            ->whereNull('sale_invoice_details.deleted_at')
            ->orderBy('id', 'desc')
            ->select('sale_invoice_details.*', 'contacts.first_name as contact_name', 'sale_invoices.code as invoice_code', 'products.name as product_name', 'branches.name as branch_name');
        if ($request->branch_id) {
            $sales->where('sale_invoice_details.branch_id', $request->branch_id);
        }
        if ($request->category_id) {
            $sales->where('products.category_id', $request->category_id);
        }
        if ($request->contact_id) {
            $sales->where('sale_invoices.contact_id', $request->contact_id);
        }
        if ($request->from_date && $request->to_date) {
            $sales->whereDate('sale_invoice_details.created_at', '>=', Carbon::parse($request->from_date)->format('Y-m-d'))->whereDate('sale_invoice_details.created_at', '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        }
        $sales->get();
        $this->i = 1;

        return DataTables::of($sales)
            // ->orderColumns(['id', 'code'], '-:column $1')
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('sale_subtotal', function ($data) {
                return $data->quantity  * $data->unit_price;
            })
            // ->addColumn('branch_id', function ($data) {
            //     return $data->Branch ? $data->Branch->name : '';
            // })
            ->toJson();
    }

    public function SaleDetailReport()
    {
        $ContactLists = Contact::where('type', 'Customer')->get();
        $branches = Branch::get();
        $categories = Category::get();

        return view('Reports.sale_details_report', compact('branches', 'categories', 'ContactLists'));
    }
    public function PurchaseDetailReportData(Request $request)
    {
        $sales = DB::table('purchase_invoice_details')
            ->join('purchase_invoices', 'purchase_invoices.id', '=', 'purchase_invoice_details.purchase_invoice_id')
            ->join('products', 'products.id', '=', 'purchase_invoice_details.product_id')
            ->join('contacts', 'contacts.id', '=', 'purchase_invoices.contact_id')
            ->join('branches', 'branches.id', '=', 'purchase_invoice_details.branch_id')
            ->whereNull('purchase_invoice_details.deleted_at')
            ->orderBy('id', 'desc')
            ->select('purchase_invoice_details.*', 'contacts.first_name as contact_name', 'purchase_invoices.code as invoice_code', 'products.name as product_name', 'branches.name as branch_name');
        if ($request->branch_id) {
            $sales->where('purchase_invoice_details.branch_id', $request->branch_id);
        }
        if ($request->category_id) {
            $sales->where('products.category_id', $request->category_id);
        }
        if ($request->contact_id) {
            $sales->where('purchase_invoices.contact_id', $request->contact_id);
        }
        if ($request->from_date && $request->to_date) {
            $sales->whereDate('purchase_invoice_details.created_at', '>=', Carbon::parse($request->from_date)->format('Y-m-d'))->whereDate('purchase_invoice_details.created_at', '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        }
        $sales->get();
        $this->i = 1;

        return DataTables::of($sales)
            // ->orderColumns(['id', 'code'], '-:column $1')
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('purchase_subtotal', function ($data) {
                return $data->quantity  * $data->unit_price;
            })
            // ->addColumn('branch_id', function ($data) {
            //     return $data->Branch ? $data->Branch->name : '';
            // })
            ->toJson();
    }

    public function PurchaseDetailReport()
    {
        $ContactLists = Contact::where('type', 'Supplier')->get();
        $branches = Branch::get();
        $categories = Category::get();

        return view('Reports.purchase_details_report', compact('branches', 'categories', 'ContactLists'));
    }
    public function SaleReportData(Request $request)
    {
        $accounts_sale_invoice = SaleInvoice::query();

        if ($request->contact_id) {
            $accounts_sale_invoice->where('contact_id', $request->contact_id);
        }
        if ($request->branch_id) {
            $accounts_sale_invoice->where('branch_id', $request->branch_id);
        }
        $accounts_sale_invoice->whereDate('sale_date', '>=', Carbon::parse($request->from_date)->format('Y-m-d'))->whereDate('sale_date', '<=', Carbon::parse($request->to_date)->format('Y-m-d'))->get();

        $this->i = 1;

        return DataTables::of($accounts_sale_invoice)
            // ->orderColumns(['id', 'code'], '-:column $1')
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('user_id', function ($data) {
                return $data->User ? $data->User->name : '';
            })
            ->addColumn('contact_id', function ($data) {
                return $data->Contact ? $data->Contact->first_name.' '.$data->Contact->last_name : '';
            })
            ->addColumn('paid_amount', function ($data) {
                return $data->PurchasePayment ? $data->PurchasePayment->sum('total_amount') : 0;
            })
            ->addColumn('due', function ($data) {
                return $data->SalePayment ? $data->payable_amount-$data->SalePayment->sum('total_amount') : $data->payable_amount;
            })
            ->addColumn('discount', function ($data) {
                return $data->discount ? $data->discount : 0;
            })
            ->addColumn('shipping_charge', function ($data) {
                return $data->shipping_charge ? $data->shipping_charge : 0;
            })
            ->addColumn('vat', function ($data) {
                return $data->vat ? $data->vat : 0;
            })
            ->addColumn('branch_id', function ($data) {
                if ($data->Branch) {
                    return $data->Branch ? $data->Branch->name : '';
                } else {
                    return null;
                }
            })
            ->toJson();
    }

    public function SaleReport()
    {
        $ContactLists = Contact::where('type', 'Customer')->get();
        $branches = Branch::get();
        return view('Reports.sale_report', compact('ContactLists', 'branches'));
    }

    public function PurchaseReportDate(Request $request)
    {
        $accounts_sale_invoice = PurchaseInvoice::query();

        if ($request->contact_id) {
            $accounts_sale_invoice->where('contact_id', $request->contact_id);
        }
        if ($request->branch_id) {
            $accounts_sale_invoice->where('branch_id', $request->branch_id);
        }

        $accounts_sale_invoice->whereDate('purchase_date', '>=', Carbon::parse($request->from_date)->format('Y-m-d'))->whereDate('purchase_date', '<=', Carbon::parse($request->to_date)->format('Y-m-d'))->get();

        $this->i = 1;

        return DataTables::of($accounts_sale_invoice)
            // ->orderColumns(['id', 'code'], '-:column $1')
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('user_id', function ($data) {
                return $data->User ? $data->User->name : '';
            })
            ->addColumn('contact_id', function ($data) {
                return $data->Contact ? $data->Contact->first_name.' '.$data->Contact->last_name : '';
            })
            ->addColumn('paid_amount', function ($data) {
                return $data->PurchasePayment ? $data->PurchasePayment->sum('total_amount') : 0;
            })
            ->addColumn('due', function ($data) {
                return $data->PurchasePayment ? $data->payable_amount-$data->PurchasePayment->sum('total_amount') : $data->payable_amount;
            })
            ->addColumn('discount', function ($data) {
                return $data->discount ? $data->discount : 0;
            })
            ->addColumn('shipping_charge', function ($data) {
                return $data->shipping_charge ? $data->shipping_charge : 0;
            })
            ->addColumn('vat', function ($data) {
                return $data->vat ? $data->vat : 0;
            })
            ->addColumn('branch_id', function ($data) {
                if ($data->Branch) {
                    return $data->Branch ? $data->Branch->name : '';
                } else {
                    return null;
                }
            })
            ->toJson();
    }

    public function PurchaseReport()
    {
        $ContactLists = Contact::where('type', 'Supplier')->get();
        $branches = Branch::get();
        return view('Reports.purchase_report', compact('ContactLists', 'branches'));
    }
}
