@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Edit <a href="{{route('category.show',$category->id)}}" class="h5">{{$category->title}}</a></h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$category->title}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_code">short_code</label>
                            <input type="text" class="form-control" id="short_code" name="short_code" placeholder="Short Code" value="{{$category->short_code}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Description" name="description">{{$category->description}}</textarea>
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
                        <div class="card-footer">
                            <label>Only png formatted image is supported. Uploading new image will remove previous image!</label>
                            <input type="file" class="btn-lg btn-block image" name="image" accept="image/png" title="upload">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{$category->is_active ? 'checked' : ''}}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{$category->is_featured ? 'checked' : ''}}>
                                <label class="form-check-label" for="is_featured">
                                    Featured
                                </label>
                            </div>
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
