@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Category</h1>
    </div>
    <div class="col-lg-8 mb-5">
        <form method="POST" action="/dashboard/categories">
            @csrf
            <div class="mb-3">
                <label for="kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                    name="kategori" required autofocus value="{{ old('kategori') }}">
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control " id="slug" name="slug" readonly required
                    value="{{ old('slug') }}">

            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>

    </div>
    <script>
        const kategori = document.querySelector('#kategori');
        const slugs = document.querySelector('#slug');


        kategori.addEventListener('change', function() {

            fetch('/dashboard/categories/checkSlug?kategori=' + kategori.value)
                .then(response => response.json())
                .then(data => slugs.value = data.slug)
        });
    </script>
@endsection
