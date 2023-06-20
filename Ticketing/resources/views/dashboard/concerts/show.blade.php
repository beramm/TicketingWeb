@extends('dashboard.layouts.main')

@section('container')
    {{-- @dd($concert) --}}
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <a href="/dashboard/concerts" class="btn btn-success">
                    Back To Previous Page <span data-feather="arrow-left"></span>
                </a>

                <a href="/dashboard/concerts/{{ $concert->slug }}/edit" class="btn btn-warning">
                    Edit <span data-feather="edit">
                    </span>
                </a>

                <form action="/dashboard/concerts/{{ $concert->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Delete this Concert ?')">
                        Delete
                        <span data-feather="x-circle">
                        </span></button>
                </form>

            </div>
        </div>
    </div>
    <div class="row pb-5 mb-4">

        <div class="col-md-8">
            <img src="{{ asset('storage/' . $concert->pict) }}" class="img-fluid rounded" alt="Image"
                style="height: 270px;width: 850px;object-fit: cover">
        </div>

        <div class="col-md-4">
            <div class="card" style="width: 100%;background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4); ">
                <div class="card-body">
                    <h5 class="card-title">{{ $concert->nama }}</h5>
                    <h5 class="card-title">{{ $concert->categories->kategori }}</h5>
                    <p class="card-text text-muted"><i class="fa fa-calendar"></i> {{ $concert->tanggal }}</p>
                    <p class="card-text text-muted">
                        <i class="fa fa-clock-o"></i> {{ $concert->waktu }}
                    </p>
                    <p class="card-text text-muted"><i class="fa fa-map-marker"></i>
                        {{ $concert->tempat }}</p>
                    <p class="card-text"> Rp {{ number_format($concert->harga, 0, ',', '.') }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="card-text text-muted">Diselenggarakan oleh {{ $concert->vendors->nama }}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="py-3 px-3 mt-4 d-flex justify-content-center rounded"
                style="background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);">
                <a href="/concerts/buy/{{ $concert->id }}">
                    <button type="button" class="btn btn-dark " style="width: 100%;position: sticky; top: 0">Beli
                        Tiket</button>
                </a>
            </div>

        </div>
        <div class="terms col-md-8">
            <h2> Terms & Condition</h2>
            <hr>
            {!! $concert->terms !!}
        </div>
    </div>
@endsection
