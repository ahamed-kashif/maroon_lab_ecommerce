<div class="card m-b-30">
    <div class="card-header">
        <h5 class="card-title">Order Items</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Product</th>
                        <th scope="col">variants</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price(<small>৳</small>)</th>
                        <th scope="col" class="text-right">Total(<small>৳</small>)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>
                                @if($product->images->count() > 0)
                                    <img src="{{asset($product->images->first()->url) }}" class="img-fluid" width="35" alt="product">
                                @else
                                    <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" width="35" alt="product">
                                @endif
                            </td>
                            <td>{{$product->title}}</td>
                            <td>
                                @if(count($product->variants) > 0)
                                    @foreach($product->variants as $variant)
                                        <small>{{$variant->value}} {{$variant->unit}}</small>
                                    @endforeach
                                @else
                                    NILL
                                @endif
                            </td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td class="text-right">{{$product->price*$product->pivot->quantity}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row border-top pt-3">
            <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                @if($order->note != null)
                    <div class="order-note">
                        <h6>Note :</h6>
                        <p>{{$order->note}}</p>
                    </div>
                @endif
            </div>
            <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                <div class="order-total table-responsive ">
                    <table class="table table-borderless text-right">
                        <tbody>
                        <tr>
                            <td>Sub Total :</td>
                            <td><small>৳</small> {{$order->total}}</td>
                        </tr>
                        <tr>
                            <td>Discount :</td>
                            <td><small>৳</small>{{$order->discount}}</td>
                        </tr>
                        <tr>
                            <td class="text-black f-w-7 font-18">Amount :</td>
                            <td class="text-black f-w-7 font-18"><small>৳</small>{{$order->transaction->total_payable_amount}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->has('roles'))
        @can('edit order')
            @if($order->status != 'completed' && $order->transaction != 'paid' && $order->status != 'cancelled')
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-danger-rgba my-1 order-cancel"><i class="feather icon-trash mr-2"></i>Cancel</button>
                </div>
            @endif
        @endcan
    @endif
</div>
