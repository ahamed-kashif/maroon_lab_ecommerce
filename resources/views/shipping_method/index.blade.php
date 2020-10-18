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
                        <h5 class="card-title">Shipping Methods</h5>
                    </div>
                    <div class="col-md-4 col-md-4">
                        <a href="{{route('shipping_method.create')}}" class="btn btn-primary-rgba mr-1"><i class="feather icon-plus mr-2"></i>{{__('Add New Shipping Method')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle">Shipping Methods are displayed here.</h6>
                @include('partials.alert')
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shipping_methods as $shipping_method)
                            <tr>
                                <td>
                                    <a href="{{route('shipping_method.show',$shipping_method->id)}}">
                                        {{__($shipping_method->title)}}
                                    </a>
                                </td>
                                <td>{{$shipping_method->phone_number}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" id="CustomdropdownMenuButton8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton8">
                                            <a class="dropdown-item" href="{{route('shipping_method.edit',$shipping_method->id)}}"><i class="fa fa-edit"></i><span class="text-alias"> edit</span></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tile</th>
                            <th>Phone Number</th>

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
