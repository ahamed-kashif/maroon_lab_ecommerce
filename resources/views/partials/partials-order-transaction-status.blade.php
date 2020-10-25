<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-12">
                <span class="card-title mb-0 display-4">Payment status: <b class="text-info"> {{strtoupper($order->transaction->status)}}</b></span><br>
                <small>Transaction CODE: {{$order->transaction->code}}</small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            @switch($order->transaction->status)
                @case('pending')
                <button type="submit" class="btn btn-warning-rgba transaction-status float-right">Paid</button>
                @break
                @case('paid')
                <h6 class="text-success-gradient float-right">PAID!</h6>
                @break
            @endswitch
        </div>
    </div>
</div>
