<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-12">
                <span class="card-title mb-0 display-4">Shipping status: <b class="text-info"> {{strtoupper($order->order_tracking->status)}}</b></span><br>
                <small>Tracking ID: {{$order->order_tracking->id}}</small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            @switch($order->order_tracking->status)
                @case('pending')
                <button type="submit" class="btn btn-warning-rgba tracking-status float-right">start processing</button>
                @break
                @case('processing')
                <button type="submit" class="btn btn-warning-rgba tracking-status float-right">start shipping</button>
                @break
                @case('shipping')
                <button type="submit" class="btn btn-warning-rgba tracking-status float-right">complete delivery</button>
                @break
                @case('delivered')
                    <h6 class="text-success-gradient">Delivered!</h6>
                @break
            @endswitch
        </div>
    </div>
</div>
