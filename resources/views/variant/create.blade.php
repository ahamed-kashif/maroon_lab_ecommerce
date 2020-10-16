@extends('layouts.app')
@section('css')
    @include('extras.select2css-extra')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Variant</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('variant.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="type">Select Variant Type</label>
                        <select class="select2-single-dynamic form-control " name="type" id="type" required>
                            <option>Select any variant type or create one</option>
                            @foreach($variants->unique('type') as $variant)
                                <option value="{{$variant->type}}">{{$variant->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" placeholder="Value" name="value" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit">Select Variant unit</label>
                        <select class="select2-single-dynamic form-control" name="unit" id="unit" required>
                            <option>Select any unit or create one</option>
                            @foreach($variants->unique('unit') as $variant)
                                <option value="{{$variant->unit}}">{{$variant->unit}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
@section('js')
    @include('extras.select2js-extra')
@endsection
