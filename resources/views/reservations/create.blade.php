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
            <th>Izaberi</th>
        </tr>
        </thead>

        <tbody>
        @foreach($cars as $car)
            @if($car->id == $car_cat_id)
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

            </tr>
 @endif
        @endforeach
        </tbody>
    </table>

    <form action="/reservations" method="post" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="">Odaberite automobil*</label>
            <select name="car_id" id="" class="form-control">
                @foreach($cars as $car)
                    @if($car->id == $car_cat_id)
                    <option value="{{$car->id}}">{{$car->marka}} {{$car->model}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Lokacija preuzimanja*</label>
            <select name="lokacija_preuzimanja" id="" class="form-control">
                @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->naziv}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Lokacija vracanja*</label>
            <select name="lokacija_vracanja" id="" class="form-control">
                @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->naziv}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Dodatna oprema*</label>
            <select name="dodatna_oprema" id="" class="form-control">
                @foreach($equipments as $equipment)
                    <option value="{{$equipment->id}}">{{$equipment->naziv}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="length" value="{{$length}}">
        <input type="hidden" name="dateTake" value="{{$dateTake}}">
        <input type="hidden" name="dateBack" value="{{$dateBack}}">
        <button type="submit" class="bt btn-primary">Rezervisi</button>
    </form>
@endsection
