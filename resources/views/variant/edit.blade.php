@extends('layouts.app')
@section('css')
    @include('extras.select2css-extra')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Edit <a href="{{route('variant.show',$variant->id)}}" class="h5">{{$variant->title}}</a></h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('variant.update',$variant->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="type">Select Variant Type</label>
                        <select class="select2-single-dynamic form-control" name="type" id="type" required>
                            <option>Select any variant</option>
                            @foreach($variants->unique('type') as $variantT)
                                <option value="{{$variantT->type}}" {{$variantT->type == $variant->type ? 'selected' : ''}}>{{$variantT->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="value">value</label>
                            <input type="text" class="form-control" id="value" placeholder="Value" name="value" value="{{$variant->value}}">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="unit">Select Variant Unit</label>
                        <select class="select2-single-dynamic form-control" name="unit" id="unit" required>
                            <option>Select any variant unit</option>
                            @foreach($variants->unique('unit') as $variantT)
                                <option value="{{$variantT->unit}}" {{$variantT->unit == $variant->unit ? 'selected' : ''}}>{{$variantT->unit}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning-rgba">
                        <i class="feather icon-upload mr-2"></i>
                        <span class="text-alias">Update</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
@section('js')
    @include('extras.select2js-extra')
@endsection
