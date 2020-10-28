@extends('layouts.app')
@section('css')
    @include('extras.datatable-css')
@endsection
@section('content')
    <div class="contentbar">

        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Pages</h5>
                        @include('partials.alert')
                    </div>
                    <div class="card-body">
                        <div class="col-md-4 col-md-4">
                            <a href="{{route('page.create')}}" class="btn btn-primary-rgba mr-1"><i class="feather icon-plus mr-2"></i>{{__('Add New Page')}}</a>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>

                                        <td>
                                            <a href="{{route('page.show',$page->url)}}">
                                                {!! $page->title !!}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="button-list">
                                                <a href="{{route('page.edit',$page->url)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                                <form action="{{route('page.destroy',$page->url)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger-rgba" onclick="return confirm('Are you sure you want to Delete?')"><i class="feather icon-trash"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- End Contentbar -->
@endsection
@section('js')
    @include('extras.datatable-js')
@endsection
