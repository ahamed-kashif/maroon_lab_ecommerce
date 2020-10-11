@extends('layouts.app')
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
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="value">value</label>
                            <input type="text" class="form-control" id="value" placeholder="Value" name="value" value="{{$variant->value}}">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="category_id">Select Variant Type</label>
                        <select class="select2-single form-control" name="variant_type_id" id="variant_type_id" required>
                            <option>Select any variant</option>
                            @foreach($variantTypes as $variantT)
                                <option value="{{$variantT->id}}" {{$variantT->id == $variant->variant_type_id ? 'selected' : ''}}>{{$variantT->title}}</option>
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
