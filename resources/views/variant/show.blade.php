@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                    {{$variant->value}}</h3>
                <small>{{$variant->varianttype->title}}</small>

            </div>
            <div class="card-body">
                <div class="col-md-6 col-lg-6">
                    <div class="btn-group">
                        <a class="btn btn-primary-rgba" href="{{route('variant.edit',$variant->id)}}">
                            <i class="fa fa-edit  mr-2"></i>
                            <span class="text-alias">Edit</span>
                        </a>
                        <form action="{{route('variant.destroy',$variant->id)}}" method="POST">
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
