@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 ">
            <h1>Visitor Credential Form</h1>
            <div class="mt-5">
                <form action="/postPayment/buyed" method="POST">
                    @csrf
                    <label for="visitors">Choose a visitor:</label>
                    <select class="form-select mb-5" name="visitors" id="visitors">
                        @foreach ($user->visitors as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>

                    <hr>
                    <p>Or Input Manually</p>
                    <input type="hidden" value="{{ $jumlahBeli }}" name="jumlahBeli">
                    <input type="hidden" value="{{ $hargaTotal }}" name="hargaTotal">
                    <input type="hidden" value="{{ $barangVenue }}" name="barangVenue">
                    <input type="hidden" value="{{ $totalId }}" name="totalId">
                    <input type="hidden" value="{{ $totalJumlah }}" name="totalJumlah">


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels" for="nama">Name</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control  @error('nama') is-invalid @enderror" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels" for="nik">NIK</label>
                            <input type="number" inputmode="numeric"
                                class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                required>
                        </div>

                        <div class="col-md-12">
                            <label class="labels" for="telepon">No Telepon</label>
                            <input type="telepon" inputmode="numeric"
                                class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon"
                                required>
                        </div>

                        <div class="col-md-12">
                            <label class="labels" for="kelahiran">Kelahiran</label>
                            <input type="date" class="form-control @error('kelahiran') is-invalid @enderror"
                                id="kelahiran" name="kelahiran" required>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                type="submit">Continue</button></div>
                </form>
            </div>

        </div>
    </div>
    <script>
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
                .catch(error => {
                    console.error("Error:", error);
                });
        });
    </script>
@endsection
