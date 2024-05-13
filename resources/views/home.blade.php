@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark"><b class="text text-light">{{ __('Dashboard') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <b>{{ session('status') }}</b>
                        </div>
                    @endif

                    <b>{{ __('You are logged in!') }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
