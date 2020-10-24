<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-12">
                <h6 class="card-title mb-0">Shipping status</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <select id="orderCategory" class="form-control">
                <option>Select Type</option>
                <option value="pending" {{$order->order_tracking->status == 'pending' ? 'selected':''}}>Pending</option>
                <option value="processing" {{$order->order_tracking->status == 'processing' ? 'selected':''}}>Processing</option>
                <option value="shipping" {{$order->order_tracking->status == 'shipping' ? 'selected':''}}>Delivered</option>
                <option value="delivered" {{$order->order_tracking->status == 'delivered' ? 'selected':''}}>Delivered</option>
            </select>
        </div>
    </div>
</div>
