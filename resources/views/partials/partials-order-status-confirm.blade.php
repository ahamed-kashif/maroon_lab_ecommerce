<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-12">
                <h6 class="card-title mb-0">Order Status</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        @switch($order->status)
            @case('pending')
            <button type="submit" class="btn btn-warning-rgba order-status float-right">confirm!</button>
            @break
            @case('confirmed')
            <button type="submit" class="btn btn-success-rgba order-status float-right">complete!</button>
            @break
            @case('completed')
            <h6 class="text-success-gradient float-right">Completed!</h6>
            @break
        @endswitch
    </div>
</div>
