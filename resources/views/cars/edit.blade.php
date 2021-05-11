@extends('layouts.app')
@section('content')
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
            <div class="card bg-light">
                <div class="card bg-light">
                    <h3 class="card-header">Editovanje automobila</h3>
                    <div class="card-body">
                        <form action="/cars/{{$car->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">Marka*</label>
                                <input type="text" name="marka" class="form-control" placeholder="Marka" value="{{ $car->marka }}" class="form-control @error('marka') is-invalid @enderror" value="{{old('marka')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="">Model*</label>
                                <input type="text" name="model" class="form-control" placeholder="Model"  value="{{ $car->model }}"class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Godina proizvodnje*</label>
                                <input type="text" name="godina_proizvodnje" value="{{$car->godina_proizvodnje}}" class="form-control" placeholder="Godina proizodnje" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Broj sjedista*</label>
                                <input type="text" name="broj_sjedista" class="form-control" value="{{$car->broj_sjedista}}" placeholder="Broj_sjedista" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Reg broj*</label>
                                <input type="text" name="registarski_broj" class="form-control" value="{{$car->registarski_broj}}" placeholder="Model" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Kategorija*</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->kategorija}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Cijena po danu*</label>
                                <input class="form-control" type="number" name="cijena_po_danu" placeholder="Cijena po danu"
                                       value="{{ $car->cijena_po_danu }}" aria-describedby="helpId" />
                                <small></small>
                            </div>
                            <div class="form-group">
                                <label for="">Dodatne napomene*</label>
                                <input type="text" name="dodatne_napomene" class="form-control" value="{{$car->dodatne_napomene}}" placeholder="Model" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>


                            <div class="form-group">
                                <div class="form-group">
                                    <img src='storage/{{ $car->fotografija }}' width="100" height="100" alt=""
                                         class="img-fluid rounded">
                                </div>

                                <label for="">Photo*</label>
                                <input type="file" name="fotografija" value='storage/{{ $car->fotografija }}' class="form-control">

                            </div>
                            <button type="submit" class="bt btn-primary"> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


