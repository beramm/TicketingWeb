@extends('profile.layouts.main')

@section('container')
    <style>
        input[type="number"]::-webkit-inner-spin-button {
            display: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #000000
        }

        .profile-button {
            background: rgb(0, 0, 0);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #5f5f5f
        }

        .labels {
            font-size: 11px
        }
    </style>
    <div class="container rounded bg-white mt-0 mb-2">
        <div class="row">

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Create New Visitor Data</h4>
                    </div>
                    <form action="/profile/visitors/{{ $visitor->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels" for="nama">Name</label>
                                <input type="text" id="nama" name="nama"
                                    class="form-control  @error('nama') is-invalid @enderror" required
                                    value="{{ old('nama',$visitor->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="labels" for="nik">NIK</label>
                                <input type="number" inputmode="numeric"
                                    class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                    required value="{{ old('nik',$visitor->nik) }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels" for="telepon">No Telepon</label>
                                <input type="telepon" inputmode="numeric"
                                    class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                    name="telepon" required value="{{ old('telepon',$visitor->telepon) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="labels" for="kelahiran">Kelahiran</label>
                                <input type="date" class="form-control @error('kelahiran') is-invalid @enderror"
                                    id="kelahiran" name="kelahiran" required value="{{ old('kelahiran',$visitor->kelahiran) }}">
                                @error('kelahiran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                    Data</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
