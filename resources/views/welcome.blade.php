@extends('layout')

@section('css')
    @parent
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
@endsection
@section('body')
    <div class="d-flex flex-column justify-content-center align-items-center py-4 bg-body-tertiary h-100">
        <p class="display-4">Contact System</p>
        <div>
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/register" class="btn btn-secondary">Register</a>
        </div>
    </div>
@endsection
