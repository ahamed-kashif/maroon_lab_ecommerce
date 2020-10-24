@extends('layouts.app')
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Create Page</h5>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form action="{{route('page.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="body">Body</label>
                            <input type="text" class="form-control" id="body" name="body" placeholder="Body" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="footer">Footer</label>
                        <input type="text" class="form-control" id="footer" name="footer" placeholder="Footer" required>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" required>
                    </div>


                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
