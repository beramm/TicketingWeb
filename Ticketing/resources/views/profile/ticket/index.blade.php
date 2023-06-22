@extends('profile.layouts.main')

@section('container')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");



        .ticket {
            margin: auto;
            display: flex;
            background: white;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        .left {
            display: flex;
        }

        .image {
            height: 250px;
            width: 400px;
            background-size: contain;
            opacity: 0.85;
        }

        .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            display: flex;
            text-align: center;
            justify-content: space-around;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
        }

        .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }

        .left .ticket-number {
            height: 250px;
            width: 250px;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            padding: 5px;
        }

        .ticket-info {
            padding: 10px 30px;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }

        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .date span {
            width: 100px;
        }

        .date span:first-child {
            text-align: left;
        }

        .date span:last-child {
            text-align: right;
        }

        .date .june-29 {
            color: #d83565;
            font-size: 20px;
        }

        .show-name {
            font-size: 32px;
            font-family: "Nanum Pen Script", cursive;
            color: #000000;
        }

        .show-name h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #000000;
        }

        .time {
            padding: 10px 0;
            color: #000000;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-weight: 700;
        }

        .time span {
            font-weight: 400;
            color: rgb(0, 0, 0);
        }

        .left .time {
            font-size: 16px;
        }


        .location {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            padding-top: 8px;
            border-top: 1px solid gray;
        }

        .location .separator {
            font-size: 20px;
        }

        .right {
            width: 180px;
            border-left: 1px dashed #404040;
        }

        .right .admit-one {
            color: darkgray;
        }

        .right .admit-one span:nth-child(2) {
            color: gray;
        }

        .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .right .show-name h1 {
            font-size: 18px;
        }

        .barcode {
            height: 100px;
        }

        .barcode img {
            height: 100%;
        }

        .right .ticket-number {
            color: gray;
        }
    </style>
    @foreach ($boughts as $bought)
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <div class="ticket mb-5">
            <div class="left">
                <div class="image"
                    style="background-image: url('{{ asset('storage/' . $bought->Tickets->Concerts->pict) }}');background-size:cover">

                    <p class="admit-one">
                        <span>{{ $bought->Tickets->venue }}</span>
                        <span>{{ $bought->Tickets->venue }}</span>
                        <span>{{ $bought->Tickets->venue }}</span>
                    </p>
                    <div class="ticket-number">
                        <p>
                            #{{ $bought->id }}
                        </p>
                    </div>
                </div>
                <div class="ticket-info">
                    <p class="date">
                        <span>{{ date('l', strtotime($bought->Tickets->Concerts->tanggal)) }}</span>
                        <span class="june-29">{{ date('F jS', strtotime($bought->Tickets->Concerts->tanggal)) }}</span>
                        <span>{{ date('Y', strtotime($bought->Tickets->Concerts->tanggal)) }}</span>
                    </p>
                    <div class="show-name">
                        <h1>{{ $bought->Tickets->Concerts->nama }}</h1>

                    </div>
                    <div class="time">
                        <p>{{ $bought->Tickets->Concerts->waktu }} <span>TILL</span> Finish</p>

                    </div>
                    <p class="location"><span>{{ $bought->Tickets->Concerts->Vendors->nama }}</span>
                        <span class="separator"><i
                                class="far fa-smile"></i></span><span>{{ $bought->Tickets->Concerts->tempat }}</span>
                    </p>
                </div>
            </div>
            <div class="right">
                <p class="admit-one">
                    <span>{{ $bought->Tickets->venue }}</span>
                    <span>{{ $bought->Tickets->venue }}</span>
                    <span>{{ $bought->Tickets->venue }}</span>
                </p>
                <div class="right-info-container">
                    <div class="show-name">
                        <h1>{{ $bought->Tickets->Concerts->nama }}</h1>
                    </div>
                    <div class="time">
                        <p>{{ $bought->Tickets->Concerts->waktu }} <span>TILL</span> Finish</p>

                    </div>
                    <div class="barcode">
                        <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb"
                            alt="QR code">
                    </div>
                    <p class="ticket-number">
                        #{{ $bought->id }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
