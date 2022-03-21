<div>
    {{-- The Master doesn't talk, he acts. --}}
</div>
@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        Sale List
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Sale List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{route('inventory.purchase')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">New Sale</button></a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="SaleTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
    function callDelete(id) {
        @this.call('SaleDelete', id);
    }

    $(document).ready(function () {

        var datatable = $('#SaleTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.sale_list')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Sale Date',
                    data: 'sale_date',
                    name:'sale_date'
                },
                {
                    title: 'Sale Code',
                    data: 'code',
                    name:'code'
                },
                {
                    title: 'Order Code',
                    data: 'order_code',
                    name:'order_code'
                },
                {
                    title: 'Shop Name',
                    data: 'business_name',
                    name:'business_name'
                },
                {
                    title: 'Sub Total',
                    data: 'total_amount',
                    name:'total_amount'
                },
                {
                    title: 'Discount',
                    data: 'discount',
                    name:'discount'
                },
                {
                    title: 'Total',
                    data: 'payable_amount',
                    name:'payable_amount'
                },
                {
                    title: 'Paid Amount',
                    data: 'paid_amount',
                    name:'paid_amount'
                },
                {
                    title: 'Due Amount',
                    data: 'due_amount',
                    name:'due_amount'
                },
                {
                    title: 'Action',
                    data: 'action',
                    name:'action'
                },
            ]
        });

        window.livewire.on('success', message => {
            datatable.draw(true);
        });
    });
</script>

        <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

@endpush

