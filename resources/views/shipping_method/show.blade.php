@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                    {{$Shipping_Methods->title}}
                    <span class="badge {{$Shipping_Methods->is_active ? 'badge-success' : 'badge-secondary'}}">
                        {{$Shipping_Methods->is_active ? 'active' : 'inactive'}}
                    </span>
                </h3>
                <span><small>Short Code: {{$Shipping_Methods->short_code}}</small></span>
                <br><br>
                <span><small><b>Phone Number:</b>{{$Shipping_Methods->phone_number}}</small></span><br>
            </div>
            <div class="card-body">
                <div class="col-md-6 col-lg-6">
                    <div class="btn-group">
                        <a class="btn btn-primary-rgba" href="{{route('shipping_method.edit',$Shipping_Methods->id)}}">
                            <i class="fa fa-edit  mr-2"></i>
                            <span class="text-alias">Edit</span>
                        </a>
                        <form action="{{route('shipping_method.destroy',$Shipping_Methods->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger-rgba" type="submit" onclick="return confirm('Are you sure you want to Delete?')">
                                <i class="feather icon-trash-2 mr-2"></i>
                                <span class="text-alias">Delete</span>
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
