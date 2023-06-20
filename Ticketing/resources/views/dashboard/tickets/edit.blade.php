@extends('dashboard.layouts.main')

@section('container')
    <style>
        input[type="number"]::-webkit-inner-spin-button {
            display: none;
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Ticket</h1>
    </div>
    <div class="col-lg-8 mb-5">
        <form method="POST" action="/dashboard/tickets/{{ $ticket->id }}">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="concerts_id" class="form-label">Concerts</label>
                <select class="form-select" name="concerts_id" required>
                    @foreach ($concerts as $concert)
                        @if (old('concerts_id', $ticket->concerts_id) == $concert->id)
                            <option value="{{ $concert->id }}" selected>{{ $concert->nama }}</option>
                        @else
                            <option value="{{ $concert->id }}">{{ $concert->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue"
                    name="venue" required autofocus value="{{ old('venue', $ticket->venue) }}">
                @error('venue')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga">Harga</label>
                <input type="number" inputmode="numeric" class="form-control @error('harga') is-invalid @enderror"
                    id="harga" name="harga" required value="{{ old('harga', $ticket->harga) }}" min=0>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kuantitas">kuantitas</label>
                <input type="number" inputmode="numeric" class="form-control @error('kuantitas') is-invalid @enderror"
                    id="kuantitas" name="kuantitas" required value="{{ old('kuantitas', $ticket->kuantitas) }}">
                @error('kuantitas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Edit Ticket</button>

        </form>

    </div>
@endsection
