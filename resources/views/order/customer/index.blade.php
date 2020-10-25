@extends('layouts.app')
@section('content')
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title mb-0">My Orders</h5>
        </div>
        <div class="card-body">
            <div class="order-box">
                <div class="card border m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h5>ID : #26598</h5>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-0">Total : <strong>$500</strong></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Apple Watch</td>
                                    <td>1</td>
                                    <td>$100</td>
                                    <td class="text-right">$100</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Apple iPhone</td>
                                    <td>2</td>
                                    <td>$200</td>
                                    <td class="text-right">$400</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h5>Status : <span class="badge badge-info-inverse font-14">Shipped</span></h5>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-0"><button class="btn btn-success-rgba font-16"><i class="feather icon-file mr-2"></i>Invoice</button></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="card border m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h5>ID : #26597</h5>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-0">Total : <strong>$100</strong></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Apple iPad</td>
                                    <td>1</td>
                                    <td>$100</td>
                                    <td class="text-right">$100</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h5>Status : <span class="badge badge-primary-inverse font-14">Delivered</span></h5>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-0"><button class="btn btn-success-rgba font-16"><i class="feather icon-file mr-2"></i>Invoice</button></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
