@extends('layouts.app')

@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Variant Type</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('variant_type.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="title" name="title" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" placeholder="ex: kg, Hex" name="unit" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection

