@extends('layouts.app')

@section('content')


    <table class="table table-striped table-bordered" border="4px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Kategorija</th>
            <th>Godina proizvodnje</th>
            <th>Registarski_broj</th>
            <th>Broj sjedista</th>
            <th>Cijena po danu</th>
            <th>Dodatne napomene</th>
            <th>Edit</th>
            <th>Detalji</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{$car->id}}</td>
                <td><img style="height: 160px; width: 200px" src="{{asset($car->fotografija)}}" alt="" class="img-fluid"></td>
                <td>{{$car->marka}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->category()->kategorija}}</td>
                <td>{{$car->godina_proizvodnje}}</td>
                <td>{{$car->registarski_broj}}</td>
                <td>{{$car->broj_sjedista}}</td>
                <td>{{$car->cijena_po_danu}}</td>
                <td>{{$car->dodatne_napomene}}</td>
                <td><a href="/cars/{{$car->id}}/edit">edit</a></td>
                <td><a href="/cars/{{$car->id}}">detalji</a></td>
                {{-- <td>{{$city->population > 10000 ? "City"  : "Town" }}</td> --}}
                <td>
                    <form action="/cars/{{$car->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection
