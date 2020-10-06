@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('error_message'))
                        <p>{{ Session::get('error_message') }}</p>
                    @else
                        <p>{{ __('Home page for logined sub user') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
