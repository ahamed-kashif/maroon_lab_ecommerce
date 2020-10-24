<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-12">
                <h6 class="card-title mb-0">Payment Status</h6>
                <small>Transaction code: {{strtoupper($order->transaction->code)}}</small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <h5 class="text-info-gradient float-right"><b>{{strtoupper($order->transaction->status)}}</b></h5>
    </div>
</div>
