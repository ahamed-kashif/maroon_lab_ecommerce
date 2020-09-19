@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Variant</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('variant.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Code" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
