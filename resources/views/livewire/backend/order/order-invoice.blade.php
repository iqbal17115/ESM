<div>
    <style>
        #invoiceFoo{
            text-align: right;
        }
   @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }
            #orderSummary{
                text-align: center;
            }
            table td::before {
                /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
            #billedTo{
            display: none;
        }
        #individualOrder{
             background: #eeefee;
        }
        #invoiceFoo{
            text-align: center;
        }
        }

    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-right font-size-16">
                            Order # {{$OrderInvoice->code}}<br>
                            Date: {{$OrderInvoice->order_date}}
                        </h4>
                        <div class="mb-4">
                            <img src="@if($InvoiceSetting) {{ asset('storage/photo/'.$InvoiceSetting->logo)}}@endif" alt="logo" style="height:40px;"/>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6" id="billedTo">
                            <address style="font-size: 15px;">
                                <strong>Billed To:</strong><br>
                                {{$OrderInvoice->Contact->business_name}}<br>
                                {{$OrderInvoice->Contact->shipping_address}},@if($OrderInvoice->Contact->District){{($OrderInvoice->Contact->District->name)}}@endif<br>
                                {{$OrderInvoice->Contact->mobile}}<br>

                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <address class="mt-2 mt-sm-0" style="font-size: 15px;">
                                <strong>Shipped To:</strong><br>
                                {{$OrderInvoice->Contact->business_name}}<br>
                                {{$OrderInvoice->Contact->shipping_address}},@if($OrderInvoice->Contact->District){{($OrderInvoice->Contact->District->name)}}@endif<br>
                                {{$OrderInvoice->Contact->mobile}}<br>
                            </address>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-6 mt-3">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Visa ending **** 4242<br>
                                jsmith@email.com
                            </address>
                        </div>
                        <div class="col-sm-6 mt-3 text-sm-right">
                            <address>
                                <strong>Sale Date:</strong><br>
                                {{$SaleInvoice->sale_date}}<br><br>
                            </address>
                        </div>
                    </div> --}}
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 font-weight-bold" id="orderSummary">Order summary</h3>
                    </div>
                    <div class="table-responsive table-responsive-xl">
                        <table class="table table-nowrap" style="font-size: 15px;">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">Sr.</th>
                                    <th class="text-center">Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-right">MRP</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                    $subTotal=0;
                                @endphp
                             @foreach ($OrderInvoice->OrderDetail as $orderDetail)
                                <tr id="individualOrder">
                                    <td>
                                        <span style="float: left;color: red;font-weight: bold;">
                                            {{ ++$i }}.
                                        </span>
                                        <br>
                                    </td>
                                    <td>
                                       <center>
                                        <img class="rounded"
                                        @if($orderDetail->Product->ProductImageFirst)
                                          src="{{ asset('storage/photo/'.$orderDetail->Product->ProductImageFirst->image)}}"
                                        @else
                                          src="{{ asset('image-not-available.jpg')}}"
                                        @endif
                                        style="height:80px; weight:80px;" alt="Image2" class="img-circle img-fluid">
                                       </center>
                                    </td>
                                    <td>
                                        <center>
                                            <span style="color: black;float: left;">{{$orderDetail->Product->name}}</span>
                                            <br>
                                        </center>
                                    </td>
                                    <td data-label="Quantity">{{$orderDetail->quantity}}</td>
                                    <td class="text-right" data-label="MRP">{{$orderDetail->unit_price}}</td>
                                    <td class="text-right" data-label="Amount">{{$orderDetail->unit_price * $orderDetail->quantity}}</td>
                                    @php
                                        $subTotal += $orderDetail->unit_price * $orderDetail->quantity;
                                    @endphp
                                </tr>
                              @endforeach
                              <tr>
                                <td colspan="5" id="invoiceFoo">
                                    <strong>Sub Total</strong>
                                </td>
                                <td id="invoiceFoo">
                                    @if($currencySymbol)
                                         {{ $currencySymbol->symbol }}
                                    @endif
                                    {{$subTotal}}
                                </td>
                            </tr>
                            <tr id="invoiceFoo">
                                <td colspan="5" class="border-0" id="invoiceFoo">
                                    <strong>Discount</strong></td>
                                <td class="border-0" id="invoiceFoo">
                                    @if($currencySymbol)
                                        {{ $currencySymbol->symbol }}
                                    @endif
                                    @if($OrderInvoice->discount)
                                         {{$OrderInvoice->discount}}
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            {{-- <tr id="invoiceFoo">
                                <td colspan="5" class="border-0" id="invoiceFoo">
                                    <strong>Shipping</strong></td>
                                <td class="border-0" id="invoiceFoo">
                                    @if($currencySymbol)
                                       {{ $currencySymbol->symbol }}
                                    @endif
                                    @if($OrderInvoice->shipping_charge)
                                       {{$OrderInvoice->shipping_charge}}
                                       @else
                                       0
                                       @endif
                                </td>
                            </tr> --}}
                            <tr id="invoiceFoo">
                                <td colspan="5" class="border-0" id="invoiceFoo">
                                    <strong>Total</strong></td>
                                <td class="border-0" id="invoiceFoo">
                                    <h4 class="m-0">
                                        @if($currencySymbol)
                                           {{ $currencySymbol->symbol }}
                                        @endif
                                        {{$subTotal + $OrderInvoice->shipping_charge - $OrderInvoice->discount}}
                                    </h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                 {{-- Start Note --}}
                                 <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title" style="color: #ff5c00;;font-weight:bold;">রিপ্লেস প্রডাক্টের নাম & সংখ্যা</h5>
                                      <p class="card-text">
                                          {!!$OrderInvoice->note!!}
                                       </p>
                                    </div>
                                  </div>
                                {{-- End Note --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="float-left p-1">
                            @if($InvoiceSetting)
                               {!!$InvoiceSetting->invoice_footer!!}
                            @endif
                        </div>
                        <div class="float-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Column -->
    </div>
    <!-- end row -->


<footer class="footer">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <script>document.write(new Date().getFullYear())</script> © Skote.
        </div>
        <div class="col-sm-6">
            <div class="text-sm-right d-none d-sm-block">
                Design & Develop by Themesbrand
            </div>
        </div>
    </div>
</div>
</footer>
</div>
