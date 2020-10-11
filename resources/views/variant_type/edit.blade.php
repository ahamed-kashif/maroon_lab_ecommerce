@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Edit <a href="{{route('variant_type.show',$variantTypes->id)}}" class="h5">{{$variantTypes->title}}</a></h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('variant_type.update',$variantTypes->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{$variantTypes->title}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="unit">unit</label>
                            <input type="text" class="form-control" id="unit" placeholder="unit" name="unit" value="{{$variantTypes->unit}}">
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
