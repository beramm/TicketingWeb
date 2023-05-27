@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="formHeader">
                        Register
                    </div>
                    <div class="card-body" id="formBody">
                        <form id="registrationForm" method="post" action="/postRegister">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="/login" class="btn btn-link">Switch to Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
