@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                    {{$category->title}}
                    <span class="badge {{$category->is_active ? 'badge-success' : 'badge-secondary'}}">
                        {{$category->is_active ? 'active' : 'inactive'}}
                    </span>
                    @if($category->is_featured)
                        <span class="badge badge-warning">
                            featured
                        </span>
                    @endif
                </h3>
                <small>{{$category->short_code}}</small>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">category featured image</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($category->images()->count() > 0)
                            <span class="pull-right clickable close-icon cross" data-effect="fadeOut">
                                <img class="img-fluid rounded p-2" style="height:100px;width: 100px" src="{{asset($category->images()->first()->url)}}"/>
                            </span>
                        @else
                            <h5>No image uploaded yet!</h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>{{$category->description}}</p>
                <div class="col-md-6 col-lg-6">
                    <div class="btn-group">
                        <a class="btn btn-primary-rgba" href="{{route('category.edit',$category->id)}}">
                            <i class="fa fa-edit  mr-2"></i>
                            <span class="text-alias">Edit</span>
                        </a>
                        <form action="{{route('category.destroy',$category->id)}}" method="POST">
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
