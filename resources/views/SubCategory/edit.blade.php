@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Edit <a href="{{route('subcategory.show',$subcategory->id)}}" class="h5">{{$subcategory->title}}</a></h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$subcategory->title}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_code">short_code</label>
                            <input type="text" class="form-control" id="short_code" name="short_code" placeholder="Short Code" value="{{$subcategory->short_code}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Description" name="description">{{$subcategory->description}}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{$subcategory->is_active ? 'checked' : ''}}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Select category</label>
                        <select class="select2-single form-control" name="category_id" id="category_id" required>
                            <option>Select any category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected':''}}>{{$category->title}}</option>
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
