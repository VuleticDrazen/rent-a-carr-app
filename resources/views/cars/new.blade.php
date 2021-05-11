@extends('layouts.app')
@section('content')
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
            <div class="card bg-light">
                <div class="card bg-light">
                    <h3 class="card-header">Dodavanje novog automobila</h3>
                    <div class="card-body">
                        <form action="/cars" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="">Marka*</label>
                                <input type="text" name="marka" class="form-control" placeholder="Marka" class="form-control @error('marka') is-invalid @enderror" value="{{old('marka')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="">Model*</label>
                                <input type="text" name="model" class="form-control" placeholder="Model" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />
                            </div>
                            <div class="form-group">
                                <label for="">Godina proizvodnje*</label>
                                <input type="text" name="godina_proizvodnje" class="form-control" placeholder="Godina proizodnje" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Broj sjedista*</label>
                                <input type="text" name="broj_sjedista" class="form-control" placeholder="Broj_sjedista" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>
                            <div class="form-group">
                                <label for="">Reg broj*</label>
                                <input type="text" name="registarski_broj" class="form-control" placeholder="Model" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

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
                                <input class="form-control" type="number" name="cijena_po_danu" placeholder="Cijena po danu"/>
                                <small></small>
                            </div>
                            <div class="form-group">
                                <label for="">Dodatne napomene*</label>
                                <input type="text" name="dodatne_napomene" class="form-control"  placeholder="Model" class="form-control @error('marka') is-invalid @enderror" value="{{old('model')}}" />

                            </div>

                            <div class="form-group">


                                <label for="">Photo*</label>
                                <input type="file" name="fotografija" class="form-control">

                            </div>
                            <button type="submit" class="bt btn-primary">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

