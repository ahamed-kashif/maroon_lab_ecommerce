@extends('layouts.app')
@section('css')
    @include('extras.product-add-css')
    @include('extras.select2css-extra')
    @include('extras.tagsinput-css')
@endsection
@section('content')
    <!-- Start col -->
    <form action="{{route('page.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Page</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form>
                    <div class="form-group" row>
                        <label class="col-sm-12 col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Body</label>
                        <div class="col-sm-12">
                            <textarea class="summernote short" name="body" placeholder="BOdy" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Footer</label>
                        <div class="col-sm-12">
                            <textarea class="summernote short" name="footer" placeholder="footer" required></textarea>
                        </div>
                    </div>
                    <div class="form-group" row>
                        <label class="col-sm-12 col-form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" required>
                    </div>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('js')
    @include('extras.product-add-js')
    @include('extras.select2js-extra')
    @include('extras.tagsinput-js')
@endsection
    <!-- End col -->

