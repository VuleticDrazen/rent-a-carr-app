@extends('layouts.app')
@section('content')
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
            <div class="card bg-light">
                <div class="card bg-light">
                    <h3 class="card-header">Editovanje korisnika</h3>
                    <div class="card-body">
                        <form action="/users" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">Ime i prezime</label>
                                <input type="text" name="name" class="form-control" placeholder="Ime i prezime" value="{{ $user->name }}" class="form-control" value="{{old('name')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="">Drzava*</label>
                                <select name="drzava_id" id="" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Broj pasosa*</label>
                                <input type="text" name="broj_pasosa" class="form-control" placeholder="Broj pasosa"  value="{{ $user->broj_pasosa }}"class="form-control" value="{{old('broj_pasosa')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Email*</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email" class="form-control " value="{{old('email')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Broj telefona*</label>
                                <input type="text" name="broj_telefona" class="form-control" value="{{$user->broj_telefona}}" placeholder="Broj_sjedista" class="form-control" value="{{old('broj_telefona')}}" />

                            </div>


                            <div class="form-group">
                                <label for="">Dodatne napomene*</label>
                                <input type="text" name="dodatne_napomene" class="form-control" value="{{$user->dodatne_napomene}}" placeholder="Model" class="form-control" value="{{old('dodatne_napomene')}}" />

                            </div>


                            <button type="submit" class="bt btn-primary"> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


