@push('css')

<!-- Sweet Alert -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        Purchase List
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Purchase List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{route('inventory.purchase')}}"><button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">New
                                        Purchase</button></a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="PurchaseListTable"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Start Delete Modal --}}
    <div class="modal fade" id="DeletePopup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this records?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" wire:click="ConfirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Delete Modal --}}
</div>
@push('scripts')
<script>
    function callDelete(id) {
        @this.call('DeleteModal', id);
    }

    $(document).ready(function () {

        var datatable = $('#PurchaseListTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.purchase_list')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Purchase Code',
                    data: 'code',
                    name:'code'
                },
                {
                    title: 'Purchase Date',
                    data: 'purchase_date',
                    name:'purchase_date'
                },
                {
                    title: 'Supplier',
                    data: 'contact_id',
                    name:'contact_id'
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
