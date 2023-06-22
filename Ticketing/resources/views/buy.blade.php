@extends('layouts.main')

@section('container')
    <form action="{{ route('postPayment/buyed') }}" method="POST" id="myForm">
        {{-- @csrf
        <input type="hidden" value="{{ $jumlahBeli }}" name="jumlahBeli">
        <input type="hidden" value="{{ $hargaTotal }}" name="hargaTotal">
        <input type="hidden" value="{{ $barangVenue }}" name="barangVenue">
        <input type="hidden" value="{{ $totalId }}" name="totalId">
        <input type="hidden" value="{{ $totalJumlah }}" name="totalJumlah">

        <label for="visitors">Choose a visitor:</label>
        <select class="form-select mb-5" name="visitors" id="visitors">
            @foreach ($user->visitors as $data)
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
        </select>

        <hr>
        <p>Or Input Manually</p>


        <div class="row mt-3">
            <div class="col-md-6">
                <label class="labels" for="nama">Name</label>
                <input type="text" id="nama" name="nama"
                    class="form-control  @error('nama') is-invalid @enderror" required>
            </div>
            <div class="col-md-12">
                <label class="labels" for="nik">NIK</label>
                <input type="number" inputmode="numeric" class="form-control @error('nik') is-invalid @enderror"
                    id="nik" name="nik" required>
            </div>

            <div class="col-md-12">
                <label class="labels" for="telepon">No Telepon</label>
                <input type="telepon" inputmode="numeric" class="form-control @error('telepon') is-invalid @enderror"
                    id="telepon" name="telepon" required>
            </div>

            <div class="col-md-12">
                <label class="labels" for="kelahiran">Kelahiran</label>
                <input type="date" class="form-control @error('kelahiran') is-invalid @enderror" id="kelahiran"
                    name="kelahiran" required>
            </div>

            <div class="mt-5 text-center">
                <button class="btn btn-primary profile-button" type="submit">Continue</button>
            </div> --}}


            <input type="hidden" value="{{ $jumlahBeli }}" name="jumlahBeli">
        <input type="hidden" value="{{ $hargaTotal }}" name="hargaTotal">
        <input type="hidden" value="{{ $barangVenue }}" name="barangVenue">
        <input type="hidden" value="{{ $totalId }}" name="totalId">
        <input type="hidden" value="{{ $totalJumlah }}" name="totalJumlah">
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
            {{-- <script>
                const visitorsDropdown = document.querySelector("#visitors");
                const nama = document.getElementById("nama");
                const nik = document.getElementById("nik");
                const telp = document.getElementById("telepon");
                const kelahiran = document.getElementById("kelahiran");

                visitorsDropdown.addEventListener("click", function() {
                    const selectedOption = this.options[this.selectedIndex];

                    nama.value = selectedOption.text;
                    console.log(nama);

                    const id = selectedOption.value;

                    fetch('/profile/visitors/input?id=' + id)
                        .then(response => response.json())
                        .then(data => {
                            // Update the input fields with the retrieved data
                            console.log(data.nama);
                            nama.value = data.nama;
                            nik.value = data.nik;
                            telp.value = data.telepon;
                            kelahiran.value = data.kelahiran;
                        })
                });
            </script> --}}
            @csrf
    </form>
@endsection
