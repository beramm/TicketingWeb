@extends('layouts.main')

@section('container')
    <style>
        input[type="number"]::-webkit-inner-spin-button {
            display: none;
        }
    </style>
    <form id="myForm" action="{{ route('postPayment') }}" method="POST">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Ticket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $index => $ticket)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $ticket->venue }}</td>
                        <td>Rp.{{ $ticket->harga }},-</td>
                        <td>
                            @if ($ticket->kuantitas === 0)
                                Sold Out
                            @else
                                {{ $ticket->kuantitas }}
                            @endif
                        </td>
                        <td>
                            @if ($ticket->kuantitas === 0)
                                <fieldset disabled>
                                    <input type="text" class="form-control" value="0" readonly
                                        name="totalInput{{ $ticket->id }}">
                                </fieldset>
                            @else
                                <input class="form-control" type="number" id="quantity-input-{{ $ticket->id }}"
                                    value="0" oninput="updateLabel({{ $ticket->id }}, this.value)"
                                    data-index="{{ $index + 1 }}" data-harga="{{ $ticket->harga }}"
                                    data-venue="{{ $ticket->venue }}" name="total-input-venue[{{ $ticket->id }}]"
                                    max="4" min="0">
                            @endif
                        </td>
                        <td>
                            <div id="demo-{{ $ticket->id }}">Rp.0</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" id="valueHarga" name="totalHarga">
        <input type="hidden" id="valueBeli" name="totalJumlahBeli">
        <input type="hidden" id="valueVenue" name="totalVenue">
        <input type="hidden" id="valueId" name="totalId">
        <input type="hidden" id="valueJumlah" name="totalJumlah">
        <button type="submit" class="btn btn-primary">Accept</button>
        <div id="status"></div>
        @csrf
    </form>

    <script>
        var myArray = [];
        var hargaValue = [];
        var totalVenue = [];
        var totalId = [];

        function updateLabel(id, value) {
            var output = document.getElementById("demo-" + id);
            var harga = document.getElementById("quantity-input-" + id).dataset.harga;
            var index = document.getElementById("quantity-input-" + id).dataset.index;
            var venue = document.getElementById("quantity-input-" + id).dataset.venue;

            if (value === "0" || value === "") {
                output.textContent = "Rp.0";
            } else {
                var total = parseInt(value) * harga;
                output.textContent = "Rp." + total.toLocaleString();
            }
            hargaValue[index] = total;
            myArray[index] = value;
            totalVenue[index] = venue;
            totalId[index] = id;
        }

        document.getElementById('myForm').addEventListener('submit', function(event) {
            var form = event.target;
            var outputHarga = document.getElementById("valueHarga");
            var outputBeli = document.getElementById("valueBeli");
            var outputVenue = document.getElementById("valueVenue");
            var outputId = document.getElementById("valueId");
            var outputJumlah = document.getElementById("valueJumlah");
            var staus = document.getElementById("status");
            var sum = 0;
            var sumHarga = 0;

            for (var i = 1; i < myArray.length; i++) {
                if (!isNaN(myArray[i])) {
                    sum += parseInt(myArray[i]);
                    sumHarga += parseInt(hargaValue[i]);
                }
            }

            if (sum > 4) {
                staus.textContent = "Can't be higher than 4";
                outputBeli.value = "";
                event.preventDefault();
            }
            if (sum <= 0) {
                staus.textContent = "Need More than 0";
                outputBeli.value = "";
                event.preventDefault()
            } else {
                outputHarga.value = sumHarga;
                outputBeli.value = sum;
                outputVenue.value = totalVenue;
                outputId.value = totalId;
                outputJumlah.value = myArray;
            }
        });
    </script>
@endsection
