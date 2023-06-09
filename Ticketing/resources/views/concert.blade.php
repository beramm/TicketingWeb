@extends('layouts.main')

@section('container')
    <div class="row pb-5 mb-4">
        <div class="col-md-8">
            <img src="/img/{{ $concert->pict }}" class="img-fluid rounded" alt="Image"
                style="height: 270px;width: 850px;object-fit: cover">
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 100%;background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4); ">
                <div class="card-body">
                    <h5 class="card-title">{{ $concert->nama }}</h5>
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
