@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                {{$Payment_Methods->title}}
                <span class="badge {{$Payment_Methods->is_active ? 'badge-success' : 'badge-secondary'}}">
                        {{$Payment_Methods->is_active ? 'active' : 'inactive'}}
                    </span>
                    @if($Payment_Methods->default)
                        <span class="badge badge-warning">Default</span>
                    @endif
                </h3>
                <small>Short Code:  {{$Payment_Methods->short_code}}</small><br>
            </div>
            <div class="card-body">
                <div class="col-md-6 col-lg-6">
                    <div class="btn-group">
                        <a class="btn btn-primary-rgba" href="{{route('payment_method.edit',$Payment_Methods->id)}}">
                            <i class="fa fa-edit  mr-2"></i>
                            <span class="text-alias">Edit</span>
                        </a>
                        <form action="{{route('payment_method.destroy',$Payment_Methods->id)}}" method="POST">
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
