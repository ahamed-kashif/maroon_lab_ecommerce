@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                    {{$subcategory->title}}
                    <span class="badge {{$subcategory->is_active ? 'badge-success' : 'badge-secondary'}}">
                        {{$subcategory->is_active ? 'active' : 'inactive'}}
                    </span>

                </h3>
                <small>Short Code:  {{$subcategory->short_code}}</small><br>
                <small class="form-group">Category: <span>{{$subcategory->category->title}}</span></small>
            </div>
            <div class="card-body">
                <p>{{$subcategory->description}}</p>
                <div class="col-md-6 col-lg-6">
                    <div class="btn-group">
                        <a class="btn btn-primary-rgba" href="{{route('subcategory.edit',$subcategory->id)}}">
                            <i class="fa fa-edit  mr-2"></i>
                            <span class="text-alias">Edit</span>
                        </a>
                        <form action="{{route('subcategory.destroy',$subcategory->id)}}" method="POST">
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
