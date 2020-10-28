@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="card-title">
                    {!! $pages->title !!}
                </h3>
            </div>
            <div class="card-body">
                {!! $pages->body !!}
            </div>
            <div class="card-footer">
                {!!$pages->footer  !!}
            </div>
        </div>
    </div>
@endsection
