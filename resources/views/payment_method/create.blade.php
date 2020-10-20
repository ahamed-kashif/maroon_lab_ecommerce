@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Payment Method</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('payment_method.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="short_code">short_code</label>
                            <input type="text" class="form-control" id="short_code" name="short_code" placeholder="Short Code" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
