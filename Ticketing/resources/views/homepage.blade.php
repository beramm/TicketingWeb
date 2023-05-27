@extends('layouts.main')

@section('container')
    <h1>Home Page</h1>

    @php
        $data = session()->all();
    @endphp

    @if (!empty(Auth::user()->name))
        <h2>Session Data:</h2>
        <ul>
            @foreach ($data as $key => $value)
                <li>{{ $key }}: {{ is_array($value) ? print_r($value, true) : htmlspecialchars($value) }}</li>
                <li>User Name: {{ Auth::user()->name }}</li>
            @endforeach
        </ul>
        <a href="{{route('logout')}}" class="btn btn-link">logout</a>
    @else
        <p>No session data available.</p>
    @endif
@endsection
