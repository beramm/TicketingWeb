@extends('layouts.main')

@section('container')
    <form action="/postPayment" method="post">
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
                                    <input type="text" class="form-control" value="0" readonly>
                                </fieldset>
                            @else
                                <input class="form-control" type="number" id="quantity-input-{{ $ticket->id }}"
                                    value="0" oninput="updateLabel({{ $ticket->id }}, this.value)"
                                    data-harga="{{ $ticket->harga }}" data-kuantitas="{{ $ticket->kuantitas }}"
                                    name="total-input-venue[{{ $ticket->id }}]">
                            @endif
                        </td>
                        <td>
                            <div id="demo-{{ $ticket->id }}">Rp.0</div>
                            <script>
                                function updateLabel(id, value) {
                                    var output = document.getElementById("demo-" + id);
                                    var harga = document.getElementById("quantity-input-" + id).dataset.harga;
                                    var kuantitas = document.getElementById("quantity-input-" + id).dataset.kuantitas;

                                    if (value === "0" || value === "") {
                                        output.textContent = "Rp.0";
                                    } else if (parseInt(value) > parseInt(kuantitas)) {
                                        output.textContent = "Tidak boleh melebihi kuantitas";
                                    } else if(parseInt(value) > 4){
                                        output.textContent = "Batas Per User 4";
                                    }
                                    else {
                                        var total = parseInt(value) * harga;
                                        output.textContent = "Rp." + total.toLocaleString();
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Accept</button>
    </form>
@endsection
