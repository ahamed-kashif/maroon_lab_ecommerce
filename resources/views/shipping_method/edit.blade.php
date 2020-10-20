@extends('layouts.app')
@section('css')
    @include('extras.select2css-extra')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Edit <a href="{{route('shipping_method.show',$Shipping_Method->id)}}" class="h5">{{$Shipping_Method->title}}</a></h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('shipping_method.update',$Shipping_Method->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$Shipping_Method->title}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_code">Short Code</label>
                            <input type="text" class="form-control" id="phone_number" name="short_code" placeholder="short code" value="{{$Shipping_Method->short_code}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{$Shipping_Method->phone_number}}">
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="active" name="active" {{$Shipping_Method->is_active ? 'checked' : ''}}>
                            <label class="form-check-label" for="=active">
                                Active
                            </label>
                        </div>
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
