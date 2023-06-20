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
        <h1 class="h2">Tickets</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-primary col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-10">

        <div class="py-3 mt-4 px-3 mb-3 text-center rounded"
            style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
            <a href="/dashboard/tickets/create">
                <button type="button" class="btn btn-dark" style="width: 100%;">
                    Create New Ticket Batch
                </button>
            </a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Concert</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = ($tickets->currentPage() - 1) * $tickets->perPage();
                @endphp
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ ++$counter }}</td>
                        <td>{{ $ticket->venue }}</td>
                        <td>{{ $ticket->harga }}</td>
                        <td>{{ $ticket->kuantitas }}</td>
                        <td>{{ $ticket->concerts->nama }}

                        <td>

                            <a href="/dashboard/tickets/{{ $ticket->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit">
                                </span>
                            </a>
                            
                            <form action="/dashboard/tickets/{{ $ticket->id }}" method="POST" class="d-inline">
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
        {{ $tickets->links() }}
    </div>
@endsection
