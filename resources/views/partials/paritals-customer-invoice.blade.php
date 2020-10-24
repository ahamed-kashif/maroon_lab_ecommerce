<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">Invoice PDF Details</h5>
            </div>
            <div class="col-5 text-right">
                <a href="{{route('customer.order.invoice', $order->id)}}" class="btn btn-success py-1"><i class="feather icon-file mr-2"></i>Invoice</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="order-primary-detail">
            <h6>Current PDF Details</h6>
            <p class="mb-0">Order Code : #{{strtoupper($order->code)}}</p>
            <p class="mb-0">Transaction Code : {{strtoupper($order->transaction->code)}}</p>
            <p class="mb-0">Tracking : {{strtoupper($order->order_tracking->id)}}</p>
        </div>
    </div>
</div>
