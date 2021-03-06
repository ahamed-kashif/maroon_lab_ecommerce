@extends('layouts.app')
@section('css')
    @include('extras.select2css-extra')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Sub-Category</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('subcategory.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_code">short_code</label>
                            <input type="text" class="form-control" id="short_code" name="short_code" placeholder="Short Code" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Description" name="description"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
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
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
@section('js')
    @include('extras.select2js-extra')
@endsection
