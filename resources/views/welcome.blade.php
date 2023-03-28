@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center align-item-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body text-center">
                       <h3>Welcome To Laravel App</h3>
                       <h4 class="text-success">Login Signup With API</h4>
                       <a href="/register" class="btn btn-primary">Register</a>
                       <a href="/login" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection