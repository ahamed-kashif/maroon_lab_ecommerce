
@extends('layouts.app')
@section('css')
    @include('extras.datatable-css')
@endsection
@section('content')

    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                     FAQ
                </h3>
            </div>
            <div class="card-body">
                1. How much do deliveries cost?
                <div class="card-body">
                    Ans:     Absolutely FREE! FREE! FREE!
                </div>



                2. How can I contact you?
                <div class="card-body">
                    Ans:     You can call us at any time. Number: 01738-598748
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    @include('extras.datatable-js')
@endsection
