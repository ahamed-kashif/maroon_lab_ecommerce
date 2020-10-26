@extends('layouts.app')
@section('css')
    @include('extras.product-add-css')
    @include('extras.select2css-extra')
    @include('extras.tagsinput-css')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('page.update',$pages->url)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{$pages->title}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Body>
                            <div class="col-sm-12">
                                <textarea class="summernote short" name="body" placeholder="Body" required>{{$pages->body}}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Footer>
                            <div class="col-sm-12">
                                <textarea class="summernote short" name="footer" placeholder="footer" required>{{$pages->footer}}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{$pages->url}}">
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
@section('js')
    @include('extras.product-add-js')
    @include('extras.select2js-extra')
    @include('extras.tagsinput-js')
@endsection
