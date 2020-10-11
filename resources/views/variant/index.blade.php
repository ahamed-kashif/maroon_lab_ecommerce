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
                        <h5 class="card-title">Variants</h5>
                    </div>
                    <div class="col-md-4 col-md-4">
                        <a href="{{route('variant.create')}}" class="btn btn-primary-rgba mr-1"><i class="feather icon-plus mr-2"></i>{{__('Add New Category')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle">Variants are displayed here</h6>
                @include('partials.alert')
                <div class="table-responsive">
                    @if($variants->count()!= 0)
                        <table id="variant-datatable" class="display table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Variant Type</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($variants as $variant)
                                        <tr>
                                            <td>
                                                <a href="{{route('variant.show',$variant->id)}}">
                                                    {{$variant->varianttype->title}}
                                                </a>
                                            </td>
                                            <td>
                                                {{$variant->value.' '.$variant->varianttype->unit}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-link" type="button" id="CustomdropdownMenuButton8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton8">
                                                        <a class="dropdown-item" href="{{route('variant.edit',$variant->id)}}"><i class="fa fa-edit"></i><span class="text-alias"> edit</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    @else
                        <h4>No variants</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
@section('js')
    @include('extras.datatable-js')
@endsection
