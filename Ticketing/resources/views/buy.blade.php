@extends('layouts.main')

@section('container')
    <form action="{{ route('postPayment/buyed') }}" method="POST" id="myForm">
        <p>Total Jumlah Beli : {{ $jumlahBeli }}</p>
        <input type="hidden" value="{{ $jumlahBeli }}" name="jumlahBeli">
        <div>Total Harga: Rp.{{ $hargaTotal }}</div>
        <input type="hidden" value="{{ $hargaTotal }}" name="hargaTotal">

        @php
            $barangArray = explode(',', $barangVenue);
            $totalArray = explode(',', $totalId);
        @endphp
        <input type="hidden" value="{{ $barangVenue }}" name="barangVenue">
        <input type="hidden" value="{{$totalId}}" name="totalArray">
        @foreach ($totalArray as $item)
            @if ($item !== '')
                <li>{{ $item }}</li>
            @endif
        @endforeach
        @foreach ($barangArray as $item)
            @if ($item !== '')
                <li>{{ $item }}</li>
            @endif
        @endforeach
        <h1>Simpan data Pengunjung</h1>
        <p>Untuk dipilih saat memesan nanti supaya proses pemesananmu jadi lebih cepat dan simpel.</p>

        <div class="text-center">
            <h3>Insert data</h3>
            @csrf
            <input type="text" class="form-control mb-2" id="inputNama" placeholder="Nama" name="nama">
            <input type="number" class="form-control mb-2" id="inputNik" placeholder="NIK" name="nik">
            <input type="tel" class="form-control mb-2" id="inputTel" placeholder="Telephone" name="telepon">
            <input type="date" class="form-control mb-2" id="inputBirth" placeholder="Kelahiran" name="kelahiran">
            <div id="status"></div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            <h3>or already have</h3>
        </div>

        <input type="text" class="form-control mb-2" id="searchInput" placeholder="Search by visitor name">
        <div id="visitorList">
            @foreach ($user->visitors as $data)
                <div class="row justify-content-center align-items-center g-2">
                    <button type="submit" class="btn btn-primary mb-2"
                        onclick="selectButton({{ $data->id }})">{{ $data->nama }}</button>
                </div>
            @endforeach
        </div>
        <input type="hidden" name="idVisitor" id="savedId">
        <script>
            function selectButton(id) {
                var outputId = document.getElementById('savedId');
                outputId.value = id;
            }

            document.getElementById('myForm').addEventListener('submit', function(event) {
                var inputNama = document.getElementById('inputNama').value.toLowerCase();
                var status = document.getElementById('status');

                @foreach ($user->visitors as $data)
                    var visitorName = "{{ strtolower($data->nama) }}";
                    if (inputNama === visitorName) {
                        status.textContent = "Already have the data!";
                        event.preventDefault();
                        return;
                    }
                @endforeach
            });

            document.getElementById('searchInput').addEventListener('input', function(event) {
                var searchQuery = event.target.value.toLowerCase();
                var visitorList = document.getElementById('visitorList');
                var visitors = visitorList.getElementsByClassName('visitor-button');

                for (var i = 0; i < visitors.length; i++) {
                    var visitorName = visitors[i].textContent.toLowerCase();
                    if (visitorName.includes(searchQuery)) {
                        visitors[i].style.display = 'inline-block';
                    } else {
                        visitors[i].style.display = 'none';
                    }
                }
            });
        </script>
    </form>
@endsection
