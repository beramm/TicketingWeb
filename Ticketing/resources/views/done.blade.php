@extends('layouts.main')

@section('container')
    @foreach ($tickets as $item)
        <p>{{$item->venue}} harganya {{$item->harga}}</p>
    @endforeach
    <p>totalnya {{$jumlahBeli}}</p>
    <p>harganya {{$hargaTotal}}</p>
@endsection