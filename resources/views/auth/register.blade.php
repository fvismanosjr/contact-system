@extends('layout')

@section('css')
    @parent
    <style>
        html,
        body {
            height: 100%;
        }

        .form-register {
            /* max-width: 330px;
            padding: 1rem; */
        }

        /* .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        } */
    </style>
@endsection
@section('body')
    <div class="d-flex align-items-center py-4 bg-body-tertiary h-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <h1 class="h3 mb-3 fw-normal">Register</h1>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="registerName" class="col-sm-4 col-form-label">Full Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="registerName" name="name" placeholder="John Doe">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="registerName" class="col-sm-4 col-form-label">Email Address</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="registerName" name="email" placeholder="email@address.com">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="registerName" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="registerName" name="password" placeholder="type your password">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="registerName" class="col-sm-4 col-form-label">Confirm Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="registerName" name="password_confirmation" placeholder="retype your password">
                                    </div>
                                </div>
                                <button class="btn btn-primary py-2" type="submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
