@extends('layouts.main')

@section('container')
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
                                    <input type="text" class="form-control" value="0" readonly name="totalInput{{$ticket->id}}">
                                </fieldset>
                            @else
                                <input class="form-control" type="number" id="quantity-input-{{ $ticket->id }}"
                                    value="0" oninput="updateLabel({{ $ticket->id }}, this.value)"
                                    data-index="{{ $index + 1}}" data-harga="{{ $ticket->harga }}"
                                    name="total-input-venue[{{ $ticket->id }}]" max="4">
                            @endif
                        </td>
                        <td>
                            <div id="demo-{{ $ticket->id }}">Rp.0</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" id="valueHarga" name="totalHarga" value="abcd">
        <input type="hidden" id="valueBeli" name="totalJumlahBeli">
        <button type="submit" class="btn btn-primary">Accept</button>
        <div id="status"></div>
        @csrf
    </form>

    <script>
        var myArray = [];
        var hargaValue = [];

        function updateLabel(id, value) {
            var output = document.getElementById("demo-" + id);
            var harga = document.getElementById("quantity-input-" + id).dataset.harga;
            var index = document.getElementById("quantity-input-" + id).dataset.index;

            if (value === "0" || value === "") {
                output.textContent = "Rp.0";
            } else {
                var total = parseInt(value) * harga;
                output.textContent = "Rp." + total.toLocaleString();
            }
            hargaValue[index] = total;
            myArray[index] = value;        
        }

        document.getElementById('myForm').addEventListener('submit', function(event) {
            var form = event.target;
            var outputHarga = document.getElementById("valueHarga");
            var outputBeli = document.getElementById("valueBeli");
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
            } else {
                outputHarga.value = sumHarga;
                outputBeli.value = sum;
            }
        });


    </script>
@endsection
