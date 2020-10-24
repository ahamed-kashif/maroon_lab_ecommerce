<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">Invoice PDF Details</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="order-primary-detail">
            <div class="text-right">
                <a href="{{route('customer.order.invoice', $order->id)}}" class="btn btn-success py-1 float-right"><i class="feather icon-file mr-2"></i>Invoice</a>
            </div>
        </div>
    </div>
</div>
