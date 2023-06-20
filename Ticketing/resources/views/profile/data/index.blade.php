@extends('profile.layouts.main')

@section('container')
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #000000
        }

        .profile-button {
            background: rgb(0, 0, 0);
            box-shadow: none;
            border: none
        }


        .labels {
            font-size: 11px
        }
    </style>
    @if (session()->has('success'))
        <div class="alert alert-primary col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container rounded bg-white mb-2">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="/img/user.png"><span
                        class="font-weight-bold">{{ $user->name }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span>
                    </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <form action="/profile/{{ $user->id }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label class="labels" for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ $user->name }}" value="">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="labels" for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value=""
                                    placeholder="{{ $user->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mt-5 text-center "><button class="btn btn-primary profile-button"
                                    type="submit">Save
                                    Profile</button></div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
