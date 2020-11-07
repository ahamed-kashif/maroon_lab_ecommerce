@if(session()->has('cart'))
    <a href="{{route('cart.index')}}" class="scroll-top py-2"><span class="live-icon">
        <span class="badge badge-pill badge-warning" style="z-index: 500000; position: absolute;right: 5px;bottom: 15px;">{{count(session()->get('cart')->items())}}</span></span></a>
@else
    <a href="{{route('cart.index')}}" class="scroll-top py-2">
@endif

