@extends('dashboard.layouts.main')

@section('container')
    <style>
        .pagination .page-link {
            color: #000000;
            /* Set your desired color */
        }

        .pagination .page-item.active .page-link {
            background-color: #929292;
            /* Set your desired background color */
            border-color: #ffffff;
            /* Set your desired border color */
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Concerts</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-primary col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-8">

        <div class="py-3 mt-4 px-3 mb-3 text-center rounded"
            style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
            <a href="/dashboard/concerts/create">
                <button type="button" class="btn btn-dark" style="width: 100%;">
                    Create New Concert
                </button>
            </a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = ($concerts->currentPage() - 1) * $concerts->perPage();
                @endphp
                @foreach ($concerts as $concert)
                    <tr>
                        <td>{{ ++$counter }}</td>
                        <td>{{ $concert->nama }}</td>
                        <td>{{ $concert->categories->kategori }}</td>
                        <td>
                            <a href="/dashboard/concerts/{{ $concert->slug }}" class="badge bg-info">
                                <span data-feather="eye">
                                </span>
                            </a>

                            <a href="/dashboard/concerts/{{ $concert->slug }}/edit" class="badge bg-warning">
                                <span data-feather="edit">
                                </span>
                            </a>

                            <form action="/dashboard/concerts/{{ $concert->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Delete this Concert ?')"><span data-feather="x-circle">
                                    </span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $concerts->links() }}
    </div>
@endsection
