@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        Supplier PAYMENT
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4 class="card-title">Supplier Payment</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{route('transaction.supplier-payment-report')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">Payment Report</button></a>
                            </div>
                        </div><!-- end col-->
                    </div><hr>
                    <form wire:submit.prevent="paymentSave">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Code</label>
                                <input class="form-control" type="text" wire:model.lazy="code" placeholder="Payment Code">
                                 @error('code') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Date</label>
                                <input id="date" type="date" class="form-control" wire:model.lazy="date" placeholder="Date">
                                @error('date') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Transaction ID</label>
                                <input class="form-control" type="text" wire:model.lazy="transaction_id" placeholder="Transaction ID">
                                 @error('transaction_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">Payment Method</label>
                                <select class="form-control" wire:model.lazy="payment_method_id" id="select2-dropdown">
                                    <option>Payment Method</option>
                                   @foreach ($payment_methods as $payment_method)
                                       <option value="{{ $payment_method->id }}">{{ $payment_method->name }}</option>
                                   @endforeach
                                </select>
                                @error('payment_method_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">Supplier</label>
                                <select class="form-control" wire:model.lazy="contact_id" id="select2-dropdown">
                                    <option>Select Supplier</option>
                                   @foreach ($contacts as $contact)
                                       <option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
                                   @endforeach
                                </select>
                                @error('contact_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Search Purchase Code</label>
                                <livewire:component.purchase-invoice-search-dropdown/>

                                {{-- <label for="basicpill-firstname-input">Sale Code</label>
                                <select class="form-control" wire:model.lazy="sale_code">
                                    <option value="">Select Code</option>
                                    @foreach ($sale_codes as $sale_code)
                                         <option value="{{$sale_code->code}}">{{$sale_code->code}}</option>
                                    @endforeach
                                </select> --}}

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Amount</label>
                                <input class="form-control" type="text" wire:model.lazy="total_amount" placeholder="Amount">
                                 @error('total_amount') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Receipt No</label>
                                <input class="form-control" type="text" wire:model.lazy="receipt_no" placeholder="Receipt No">
                                 {{-- @error('receipt_no') <span class="error">{{ $message }}</span> @enderror --}}
                            </div>
                        </div>

                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Comments/Narration</label>
                                <input class="form-control" type="text" wire:model.lazy="Comments/Narration" placeholder="Comments/Narration">
                                 @error('Comments/Narration') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <center><button type="submit" class="btn btn-primary">Submit</button></center>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Code</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($payments as $payment)

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{ ++$i }}</a> </td>
                                    <td>{{$payment->code}}</td>
                                    <td>
                                        @if(isset($payment->Contact->first_name))
                                        {{$payment->Contact->first_name}} {{$payment->Contact->last_name}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$payment->date}}
                                    </td>
                                    <td>
                                        {{$payment->total_amount}}
                                    </td>
                                    <td>
                                        @if($payment->Branch)
                                        {{$payment->Branch->name}}
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info text-primary p-1"><i class="bx bx-printer font-size-18"></i></button>
                                        <button class="btn btn-dark text-primary p-1" wire:click="editPayment({{$payment->id}})"><i class="mdi mdi-pencil font-size-18"></i></button>
                                        <button class="btn btn-primary text-danger p-1" wire:click="deletePayment({{$payment->id}})"><i class="mdi mdi-close font-size-18"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
        <!-- Plugins js -->
        <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
@endpush

