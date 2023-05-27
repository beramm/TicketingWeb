@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="formHeader">
                        Login
                    </div>
                    <div class="card-body" id="formBody">
                        <form id="loginForm" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="/register" class="btn btn-link">Switch to Registration</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
