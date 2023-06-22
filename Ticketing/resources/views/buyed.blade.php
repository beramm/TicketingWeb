@extends('layouts.main')

@section('container')
    <h1>Invoice</h1>
    <p>Invoice Total : </p>
    <h3>Rp.  {{ number_format($hargaTotal, 0, ',', '.') }}</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Venue</th>
                <th scope="col">Unit Cost</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bought as $index => $data)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $data->tickets->venue }}</td>
                    <td>Rp.{{ $data->tickets->harga }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td class="jumlah">Rp.</td>
                    <script>
                        var output = document.getElementsByClassName('jumlah')[{{ $index }}];
                        output.textContent = "Rp."+{{ $data->tickets->harga }} * {{ $data->jumlah }};
                    </script>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
