@extends('layouts.app')
@section('content')
    <table class="table table-hover" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Datum od</th>
            <th>Datum do</th>
            <th>Lokacija preuzimanja</th>
            <th>Lokacija vracanja</th>
            <th>Automobil</th>
            <th>Dodatna oprema</th>
            <th>Cijena</th>
            <th>Detalji</th>
            <th>Otkazi</th>
        </tr>
        </thead>

        <tbody>

            <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->datum_preuzimanja}}</td>
                <td>{{$reservation->datum_vracanja}}</td>
                <td>{{$reservation->lokacija_preuzimanja}}</td>
                <td>{{$reservation->lokacija_vracanja}}</td>
                <td>{{$reservation->car_id}}</td>
                <td>{{$reservation->dodatna_oprema}}</td>
                <td>{{$reservation->cijena}}</td>
                <td><a href="/reservations/{{$reservation->id}}/">detalji</a></td>
                <td>
                    <form action="/reservations/{{$reservation->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Otkazi rezervaciju</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
    <div>
        {{$reservations->links()}}
    </div>
@endsection
