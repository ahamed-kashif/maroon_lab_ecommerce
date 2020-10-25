@extends('layouts.app')
@yield('css')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                        @include('partials.alert')
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @yield('dashboard-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@yield('js')
