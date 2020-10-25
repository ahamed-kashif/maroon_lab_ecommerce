<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">Shipping Activity</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="activities-history">
            <div class="activities-history-list">
                <div class="activities-history-item">
                    <h6>Order Placed</h6>
                    <p class="mb-0">{{date_format(date_create($order->created_at),'d M, y')}}</p>
                </div>
            </div>
            @if($order->order_tracking->processing_started_at != null)
                <div class="activities-history-list">
                    <div class="activities-history-item">
                        <h6>Processing started</h6>
                        <p class="mb-0">{{date_format(date_create($order->order_tracking->processing_started_at),'h:i A')}} - {{date_format(date_create($order->order_tracking->processing_started_at),'d M, Y')}}</p>
                    </div>
                </div>
            @endif
            @if($order->order_tracking->shipping_started_at != null)
                <div class="activities-history-list">
                    <div class="activities-history-item">
                        <h6>Shipping started</h6>
                        <p class="mb-0">{{date_format(date_create($order->order_tracking->shipping_started_at),'h:i A')}} - {{date_format(date_create($order->order_tracking->shipping_started_at),'d m,Y')}}</p>
                    </div>
                </div>
            @endif
            @if($order->order_tracking->delivered_at != null)
                <div class="activities-history-list">
                    <div class="activities-history-item">
                        <h6>Delivered!</h6>
                        <p class="mb-0">{{date_format(date_create($order->order_tracking->delivered_at),'h:i A')}} - {{date_format(date_create($order->order_tracking->delivered_at),'d m,Y')}}</p>
                    </div>
                </div>
            @endif
            @if($order->status == 'cancelled')
                <div class="activities-history-list">
                    <div class="activities-history-item">
                        <h6>Cancelled!</h6>
                        <p class="mb-0">{{date_format(date_create($order->order_tracking->cancelled_at),'h:i A')}} - {{date_format(date_create($order->order_tracking->cancelled_at),'d m,Y')}}</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
