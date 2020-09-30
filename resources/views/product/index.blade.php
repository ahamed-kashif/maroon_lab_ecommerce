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
                                    <th>Name</th>
                                    <th>Active</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Orders</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->title}}</td>
                                        <td>
                                            @if($product->is_active)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->discounted_price != null ? $product->discounted_price: $product->price}}</td>
                                        <td>
                                            @if($product->categories()->count() != 0)
                                                @foreach($product->categories()->get() as $item)
                                                {{ $item->title.', ' }}
                                                @endforeach
                                            @else
                                                <blockquote class="text-warning">No category assigned!</blockquote>
                                            @endif
                                        </td>
                                        <td>yet tobe developed</td>
                                        <td>yet tobe developed</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                                <form action="{{route('product.destroy',$product->id)}}" method="POST">
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
