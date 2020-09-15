@extends('layouts.app')
@section('css')
    @include('extras.datatable-css')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <h5 class="card-title">Categories</h5>
                    </div>
                    <div class="col-md-4 col-md-4">
                        <a href="{{route('category.create')}}" class="btn btn-primary-rgba mr-1"><i class="feather icon-plus mr-2"></i>{{__('Add New Category')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle">Categories are displayed here. Click the title to show category</h6>
                @include('partials.alert')
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Tile</th>
                            <th>short_code</th>
                            <th>status</th>
                            <th>featured</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{route('category.show',$category->id)}}">
                                        {{__($category->title)}}
                                    </a>
                                </td>
                                <td>{{$category->short_code}}</td>
                                <td>
                                    {{$category->is_active ? 'active' : 'inactive'}}
                                </td>
                                <td>
                                    {{$category->is_featured ? 'featured' : 'not featured'}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" id="CustomdropdownMenuButton8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton8">
                                            <a class="dropdown-item" href="#"><i class="fa fa-edit"></i><span class="text-alias"> edit</span></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tile</th>
                            <th>short_code</th>
                            <th>status</th>
                            <th>featured</th>
                            <th>action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
@section('js')
   @include('extras.datatable-js')
@endsection
