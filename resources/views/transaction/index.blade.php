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
                        <h5 class="card-title">Transactions</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle">Transactions are displayed here.</h6>
                @include('partials.alert')
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Payment method</th>
                                <th>Payable amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>
                                    {{$transaction->code}}
                                </td>
                                <td>{{$transaction->payment_method->title}}</td>
                                <td>
                                    {{$transaction->total_payable_amount}}
                                </td>
                                <td>
                                    {{$transaction->status}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Code</th>
                                <th>Payment method</th>
                                <th>Payable amount</th>
                                <th>Status</th>
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
