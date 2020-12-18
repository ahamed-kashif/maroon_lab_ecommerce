@extends('layouts.app')
@section('css')
    @include('extras.dropzone-css')
@endsection
@section('content')
    <div class="card-header">
        <h5 class="card-title">Slider Upload</h5>
    </div>
    <div class="card-body">
        <form id="dropzone" action="{{route('admin.landing.slider.store')}}" class="dropzone" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="fallback">
                <input id="file" name="file" type="file">
            </div>
            <div class="dz-message needsclick">
                <div class="mb-3">
                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                </div>

                <h4>Drop files here or click to upload.</h4>
            </div>
        </form>
    </div>
@endsection
@section('js')
    @include('extras.dropzone-js')
    <script type="text/javascript" src="{{asset('js/restapi.js')}}"></script>
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            addRemoveLinks: false,
            removedfile: function(file) {
                let url = '{{route('admin.dropzone.media.delete')}}';
                let file_name = file.name;
                $.ajax({
                    dataType: 'json',
                    type: 'post',
                    data: {api_token: $api_token, file: file_name},
                    url: url,
                    success: function (data){
                        console.log(data);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                let fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
                return false;
            }
        }
    </script>
@endsection
