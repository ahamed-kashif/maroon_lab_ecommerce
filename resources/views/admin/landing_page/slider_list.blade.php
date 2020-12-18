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
                        <h5 class="card-title">Products</h5>
                        @include('partials.alert')
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td><img srcset="{{$slider->getFirstMediaUrl('slider')}}" class="img-fluid" width="45"></td>
                                        <td>
                                            <div class="card-body img-fluid" style="width: 45%;height: 45%">
                                                {{$slider->getFirstMedia('slider')->name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="button-list">
                                                <form action="{{route('admin.landing.slider.delete',$slider->id)}}" method="POST">
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
