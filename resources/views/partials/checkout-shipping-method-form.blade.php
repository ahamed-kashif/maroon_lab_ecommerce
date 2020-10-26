<h3>Shipping</h3>
<section>
    <h4 class="text-center font-22 mb-5">Shipping Method</h4>
    @if($shipping_methods->count() > 0)
        @foreach($shipping_methods as $method)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="shipping_method" id="shipping_method{{$method->id}}" value="{{$method->id}}"
                       {{$method->default ? 'checked' : ''}}>
                <label class="form-check-label" for="shipping_method">
                    {{$method->title}}
                </label>
            </div>
        @endforeach
    @else
        <h6>No active shipping method available!</h6>
        <span>
            @can('index shipping_method')<small>Active existing or create <a href="{{route('shipping_method.index')}}">shipping method</a></small>@endcan.
        </span>
    @endif
</section>
