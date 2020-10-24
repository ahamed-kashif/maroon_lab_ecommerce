@extends('layouts.app')
@section('css')
    @include('extras.select2css-extra')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Edit <a href="{{route('page.show',$pages->id)}}" class="h5">{{$pages->title}}</a></h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('page.update',$pages->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$pages->title}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="body">Body</label>
                            <input type="text" class="form-control" id="body" name="body" placeholder="Body" value="{{$pages->body}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="footer">Footer</label>
                        <input type="text" class="form-control" id="footer" name="footer" placeholder="Footer" value="{{$pages->footer}}">
                    </div>
                    <div class="form-group">
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
    @include('extras.select2js-extra')
@endsection
