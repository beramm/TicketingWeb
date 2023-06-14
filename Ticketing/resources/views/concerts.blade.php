@extends('layouts.main')

@section('container')
    {{-- @dd($concerts) --}}

    <link rel="stylesheet" href="/css/homeStyles.css">
    <div class="main mt-5" style="height: 350px; max-height: 350px">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/pictCarousel1.jpg" class="d-block w-100" style="border-radius: 30px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/pictCarousel2.jpg" class="d-block w-100" style="border-radius: 30px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/pictCarousel3.jpg" class="d-block w-100" style="border-radius: 30px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    @if ($concerts->count())
        <div class="container1 mb-3">
            <div class="row">
                <div class="container">
                    <h1 class="upcomming">Upcoming {{ $title }} Concerts</h1>
                    @foreach ($concerts as $concert)
                        <div class="item">
                            <div class="item-right">
                                <h2 class="num">{{ date('d', strtotime($concert->tanggal)) }}</h2>
                                <p class="day">{{ date('M', strtotime($concert->tanggal)) }}</p>
                                <span class="up-border"></span>
                                <span class="down-border"></span>
                            </div> <!-- end item-right -->

                            <div class="item-left">
                                <a class="text-decoration-none" href="/concerts?category={{ $concert->Categories->slug }}">
                                    <p class="event">{{ $concert->Categories->kategori }} Music</p>
                                </a>
                                <h2 class="title">{{ $concert->nama }}</h2>

                                <p class="card-text text-muted"><i class="fa fa-calendar"></i> {{ $concert->tanggal }}
                                    <br> <i class="fa fa-clock-o" style="margin-top: 7px"></i>
                                    {{ $concert->waktu }}
                                    <br><i class="fa fa-map-marker" style="margin-top: 7px"></i>
                                    {{ $concert->tempat }}
                                </p>

                                <div class="fix"></div>
                                <a href="/concerts/{{ $concert->slug }}" class="text-decoration-none text-dark">
                                    <button class="tickets">Tickets</button>
                                </a>
                            </div> <!-- end item-right -->
                        </div> <!-- end item -->
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
            <h5 class="text-center fs-4">No Post Found.</h5>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        {{ $concerts->links() }}
    </div>

@endsection
