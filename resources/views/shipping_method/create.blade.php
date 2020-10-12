@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Shipping Method</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('shipping_method.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone_number" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
