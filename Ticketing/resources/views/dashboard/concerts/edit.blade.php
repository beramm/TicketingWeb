@extends('dashboard.layouts.main')

@section('container')
    <style>
        input[type="number"]::-webkit-inner-spin-button {
            display: none;
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Concert</h1>
    </div>
    <div class="col-lg-8 mb-5">
        <form method="POST" action="/dashboard/concerts/{{ $concert->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama', $concert->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control " id="slug" name="slug" readonly required
                    value="{{ old('slug', $concert->slug) }}">

            </div>

            <div class="mb-3">
                <label for="pict" class="form-label">Picture</label>
                <input type="hidden" name="oldPict" value="{{ $concert->pict }}">

                <input class="form-control @error('pict') is-invalid @enderror" type="file" id="pict" name="pict"
                    onchange="previewImage()">
                <img class="preview img-fluid mt-3 mb-3 col-sm-5" src="{{ asset('storage/' . $concert->pict) }}">
                @error('pict')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat"
                    name="tempat" required value="{{ old('tempat', $concert->tempat) }}">
                @error('tempat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" required value="{{ old('tanggal', $concert->tanggal) }}">
                @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="waktu">Waktu</label>
                <input type="time" class="form-control @error('waktu') is-invalid @enderror" id="waktu"
                    name="waktu" required value="{{ old('waktu', $concert->waktu) }}">
                @error('waktu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga">Display Harga (termurah)</label>
                <input type="number" inputmode="numeric" class="form-control @error('harga') is-invalid @enderror"
                    id="harga" name="harga" required value="{{ old('harga', $concert->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categories_id" class="form-label">Category</label>
                <select class="form-select" name="categories_id" required>
                    @foreach ($categories as $category)
                        @if (old('categories_id', $concert->categories_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->kategori }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="vendors_id" class="form-label">Vendor</label>
                <select class="form-select" name="vendors_id" required>
                    @foreach ($vendors as $vendor)
                        @if (old('vendors_id', $concert->vendors_id) == $vendor->id)
                            <option value="{{ $vendor->id }}" selected>{{ $vendor->nama }}</option>
                        @else
                            <option value="{{ $vendor->id }}">{{ $vendor->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="terms" class="form-label">Terms</label>
                <input type="hidden" id="terms" name="terms" class="@error('terms') is-invalid @enderror"
                    value="{{ old('terms', $concert->terms) }}">
                <trix-editor input="terms">

                </trix-editor>
                @error('terms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Concert</button>

        </form>

    </div>
    <script>
        const nama = document.querySelector('#nama');
        const slugs = document.querySelector('#slug');


        nama.addEventListener('change', function() {

            fetch('/dashboard/concerts/checkSlug?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slugs.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        });

        function previewImage() {
            const pict = document.querySelector('#pict');
            const preview = document.querySelector('.preview');

            preview.style.display = 'block';
            const oFReader = new FileReader();

            oFReader.readAsDataURL(pict.files[0]);

            oFReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
