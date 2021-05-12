@extends('layouts.app')
@section('content')
    <table class="table table-striped table-bordered" border="4px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ime i prezime</th>
            <th>Broj pasosa</th>
            <th>Drzava</th>
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

            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->roj_pasosa}}</td>
                <td>{{$user->country()->naziv}}</td>
                <td><a href="/users/{{$user->id}}/edit">edit</a></td>
                <td><a href="/users/{{$user->id}}">detalji</a></td>
                {{-- <td>{{$city->population > 10000 ? "City"  : "Town" }}</td> --}}
                <td>
                    <form action="/users/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
    <div>

    </div>

@endsection
