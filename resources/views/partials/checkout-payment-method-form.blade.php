<h3>Pay</h3>
<section>
    <h4 class="text-center font-22 mb-5">Make Payment</h4>
    @if($payment_methods->count() > 0)
        @foreach($payment_methods as $method)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="payment_method{{$method->id}}" value="{{$method->id}}"
                    {{$method->default ? 'checked' : ''}}>
                <label class="form-check-label" for="payment_method">
                    {{$method->title}}
                </label>
            </div>
        @endforeach
    @else
        <h6>No active shipping method available!</h6>
        <span>
            @can('index payment_method')<small>Active existing or create <a href="{{route('payment_method.index')}}">shipping method</a></small>@endcan.
        </span>
    @endif
</section>
