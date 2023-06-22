@extends('profile.layouts.main')

@section('container')
    {{-- @dd($visitors) --}}
    <link rel="stylesheet" href="/css/visitors.css">
    @if (session()->has('success'))
        <div class="alert alert-primary col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-3 mt-4 px-3 mb-3 text-center rounded"
        style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
        <a href="/profile/visitors/create">
            <button type="button" class="btn btn-dark" style="width: 100%;">
                Create New Visitor's Data
            </button>
        </a>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    @foreach ($visitors as $visitor)
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="/img/user.png" class="img-radius" style="width: 80px"
                                                alt="User-Profile-Image">
                                        </div>
                                        <p> Action</p>
                                        <a href="/profile/visitors/{{ $visitor->id }}/edit" class="badge bg-warning">
                                            <span data-feather="edit">
                                            </span>
                                        </a>

                                        <form action="/profile/visitors/{{ $visitor->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Delete this visitor ?')"><span
                                                    data-feather="x-circle">
                                                </span></button>
                                        </form>

                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Nama</p>
                                                <h6 class="text-muted f-w-400">{{ $visitor->nama }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">No Telepon</p>
                                                <h6 class="text-muted f-w-400">{{ $visitor->telepon }}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Nik</p>
                                                <h6 class="text-muted f-w-400">{{ $visitor->nik }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Kelahiran</p>
                                                <h6 class="text-muted f-w-400">{{ $visitor->kelahiran }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="table-responsive col-lg-8">

        <div class="py-3 mt-4 px-3 mb-3 text-center rounded"
            style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
            <a href="/profile/visitors/create">
                <button type="button" class="btn btn-dark" style="width: 100%;">
                    Create New Visitor's Data
                </button>
            </a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIK</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $visitor->nama }}</td>
                        <td>{{ $visitor->nik }}</td>
                        <td>{{ $visitor->telepon }}</td>
                        <td>{{ $visitor->kelahiran }}</td>
                        <td>
                            <a href="/profile/visitors/{{ $visitor->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit">
                                </span>
                            </a>

                            <form action="/profile/visitors/{{ $visitor->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Delete this visitor ?')"><span data-feather="x-circle">
                                    </span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@endsection
